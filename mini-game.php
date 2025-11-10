<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Mini Game - Swara Jatim</title>

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
    width: 900px;
}

.title {
    text-align: center;
    margin-bottom: 2rem;
    font-size: 2rem;
    color: #5e3a1f;
}

.game-list {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
}

.card {
    background: white;
    border-radius: 15px;
    padding: 1.8rem;
    width: 30%;
    cursor: pointer;
    transition: .3s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,.15);
}

.card:hover {
    transform: translateY(-8px);
    background: #fff2db;
}

.card h3 {
    color: #8b4513;
}

.card p {
    font-size: .9rem;
}
</style>
</head>
<body>

<div class="container">
    <h1 class="title">🎮 Pilih Mini Game</h1>

    <div class="game-list">
        <div class="card" onclick="window.location.href='quiz.php?mode=truefalse'">
            <h3>True / False</h3>
            <p>Jawab cepat dan sederhana: Benar atau Salah.</p>
        </div>

        <div class="card" onclick="window.location.href='quiz.php?mode=multiplechoice'">
            <h3>Pilihan Ganda</h3>
            <p>Satu jawaban benar dari beberapa pilihan.</p>
        </div>

        <div class="card" onclick="window.location.href='quiz.php?mode=multipleresponse'">
            <h3>Multiple Response</h3>
            <p>Bisa pilih lebih dari satu jawaban yang benar.</p>
        </div>
    </div>
</div>

</body>
</html>
