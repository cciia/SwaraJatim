<?php
// buat deteksi mode quiz dari URL
$mode = $_GET["mode"] ?? "truefalse"; // default true false
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quiz - Swara Jatim</title>

<style>
body {
    background-color: #FFEAC5;
    font-family: 'Georgia', serif;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    background: white;
    width: 700px;
    padding: 2rem;
    border-radius: 20px;
    box-shadow: 0 5px 25px rgba(0,0,0,.15);
}

#progress {
    width: 100%;
    height: 15px;
    background: #ddd;
    border-radius: 10px;
    overflow: hidden;
    margin-bottom: 1.5rem;
}

#progressFill {
    height: 100%;
    width: 0%;
    background: #8b4513;
    transition: width .3s ease;
}

button {
    margin-top: 15px;
    padding: 10px 20px;
    background: #8b4513;
    border: none;
    border-radius: 10px;
    color: white;
    cursor: pointer;
}

button:hover {
    opacity: .8;
}

.feedback {
    font-weight: bold;
    padding: 10px;
    border-radius: 10px;
    margin-top: 15px;
}
</style>
</head>
<body>

<div class="container">
    <h2 id="gameTitle">Mini Game</h2>

    <!-- progress bar -->
    <div id="progress">
        <div id="progressFill"></div>
    </div>

    <h3 id="questionText"></h3>
    <div id="answersBox"></div>

    <button id="submitBtn">Jawab</button>
    <div id="feedback"></div>
    <button id="nextBtn" style="display:none;">Soal Selanjutnya</button>

    <div id="endScreen" style="display:none; text-align:center;">
        <h2>✨ Quiz Selesai! ✨</h2>
        <h3 id="scoreText"></h3>
        <button onclick="window.location.href='minigame.php'">Kembali ke Menu</button>
    </div>
</div>


<script>
// ======================================================
// DATA QUIZ
// ======================================================
const quizTrueFalse = [
  { question: "Rawon adalah makanan khas Jawa Timur.", correctAnswer: true },
  { question: "Reog Ponorogo berasal dari Bali.", correctAnswer: false },
  { question: "Tari Gandrung berasal dari Banyuwangi.", correctAnswer: true }
];

const quizMultipleChoice = [
  { question: "Makanan khas Madura adalah...",
    choices: ["Rawon", "Sate", "Gudeg", "Pempek"],
    correctAnswer: "Sate"
  },
  { question: "Pakaian adat Jawa Timur adalah...",
    choices: ["Beskap", "Kebaya Encim", "Pesa'an", "Ulos"],
    correctAnswer: "Pesa'an"
  },
  { question: "Tradisi 'Karapan Sapi' berasal dari...",
    choices: ["Bali", "Jakarta", "Madura", "Papua"],
    correctAnswer: "Madura"
  }
];

const quizMultipleResponse = [
  { question: "Yang termasuk makanan khas Jawa Timur:",
    choices: ["Rawon", "Pizza", "Rujak Cingur", "Sushi"],
    correctAnswers: ["Rawon", "Rujak Cingur"]
  },
  { question: "Pakaian adat berikut berasal dari Jawa:",
    choices: ["Pesa'an", "Hanbok", "Ulos", "Lurik"],
    correctAnswers: ["Pesa'an", "Lurik"]
  },
  { question: "Tradisi Jawa Timur:",
    choices: ["Karapan Sapi", "Thanksgiving", "Reog Ponorogo", "Oktoberfest"],
    correctAnswers: ["Karapan Sapi", "Reog Ponorogo"]
  }
];

// ======================================================
// SETUP MODE
// ======================================================
let currentQuiz = [];
if ("<?php echo $mode; ?>" === "multiplechoice") currentQuiz = quizMultipleChoice;
else if ("<?php echo $mode; ?>" === "multipleresponse") currentQuiz = quizMultipleResponse;
else currentQuiz = quizTrueFalse; // default true/false

document.getElementById("gameTitle").innerText =
    "<?php echo $mode; ?>" === "multiplechoice" ? "Pilihan Ganda" :
    "<?php echo $mode; ?>" === "multipleresponse" ? "Multiple Response" :
    "True / False";

// ======================================================
// QUIZ LOGIC + SCORE + PROGRESS
// ======================================================
let index = 0;
let score = 0;

function loadQuestion() {
    const q = currentQuiz[index];
    document.getElementById("feedback").innerHTML = "";
    document.getElementById("nextBtn").style.display = "none";

    document.getElementById("questionText").innerText = q.question;
    document.getElementById("answersBox").innerHTML = "";

    let html = "";

    if (q.correctAnswer === true || q.correctAnswer === false) {
        html += `<label><input type="radio" name="ans" value="true"> True</label><br>`;
        html += `<label><input type="radio" name="ans" value="false"> False</label>`;
    } else if (q.correctAnswer) {
        q.choices.forEach(c => {
            html += `<label><input type="radio" name="ans" value="${c}"> ${c}</label><br>`;
        });
    } else {
        q.choices.forEach(c => {
            html += `<label><input type="checkbox" value="${c}"> ${c}</label><br>`;
        });
    }

    document.getElementById("answersBox").innerHTML = html;

    updateProgress();
}

function updateProgress() {
    const percent = ((index) / currentQuiz.length) * 100;
    document.getElementById("progressFill").style.width = percent + "%";
}

function checkAnswer() {
    const q = currentQuiz[index];
    let correct = false;

    if (q.correctAnswer === true || q.correctAnswer === false) {
        const selected = document.querySelector("input[name='ans']:checked");
        if (!selected) return alert("Pilih jawaban dulu!");
        correct = (selected.value === "true") === q.correctAnswer;
    }
    else if (q.correctAnswer) {
        const selected = document.querySelector("input[name='ans']:checked");
        if (!selected) return alert("Pilih jawaban dulu!");
        correct = selected.value === q.correctAnswer;
    }
    else {
        const selected = [...document.querySelectorAll("input[type='checkbox']:checked")].map(i => i.value);
        correct = JSON.stringify([...selected].sort()) === JSON.stringify([...q.correctAnswers].sort());
    }

    document.getElementById("feedback").innerHTML = correct
        ? `<div class="feedback" style="background:#b7ffb7">✅ Benar!</div>`
        : `<div class="feedback" style="background:#ffb7b7">❌ Salah...</div>`;

    if (correct) score++;

    document.getElementById("nextBtn").style.display = "block";
}

function nextQuestion() {
    index++;
    if (index >= currentQuiz.length) return showScore();

    loadQuestion();
}

function showScore() {
    document.getElementById("container");
    document.querySelector(".container").innerHTML = `
        <div style="text-align:center;">
            <h2>✨ Mantap! Kamu udah selesai! ✨</h2>
            <h3>Skor kamu: <b>${score} / ${currentQuiz.length}</b></h3>
            <button onclick="window.location.href='mini-game.php'">Main lagi</button>
        </div>
    `;
}

document.getElementById("submitBtn").addEventListener("click", checkAnswer);
document.getElementById("nextBtn").addEventListener("click", nextQuestion);

loadQuestion();
</script>

</body>
</html>
