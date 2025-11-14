<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Mini Game - Swara Jatim</title>
<link rel="icon" type="image/png" href="petajatim2 1.png">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
body {
    background-color: #FFEAC5;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 20px;
    min-height: 100vh;
}

.back-button {
    background: #8b4513;
    color: white;
    border: none;
    padding: 12px 24px;
    border-radius: 8px;
    cursor: pointer;
    font-family: 'Poppins', sans-serif;
    font-size: 1rem;
    transition: .3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 3px 10px rgba(0,0,0,.2);
    margin-bottom: 2rem;
}

.back-button:hover {
    background: #5e3a1f;
    transform: translateX(-5px);
}

.back-button::before {
    font-size: 1.3rem;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

.title {
    text-align: center;
    margin-bottom: 3rem;
    font-size: 2.5rem;
    color: #5e3a1f;
}

.game-list {
    display: flex;
    justify-content: center;
    gap: 2rem;
}

.card {
    background: white;
    border-radius: 15px;
    padding: 3rem 2.5rem;
    width: 320px;
    cursor: pointer;
    transition: .3s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,.15);
}

.card:hover {
    transform: translateY(-8px);
    background: #fff2db;
    box-shadow: 0 8px 30px rgba(0,0,0,.25);
}

.card h3 {
    color: #8b4513;
    margin-bottom: 1rem;
    font-size: 1.5rem;
}

.card p {
    font-size: 1rem;
    color: #666;
    margin: 0;
    line-height: 1.6;
}

@media (max-width: 768px) {
    .game-list {
        flex-direction: column;
        align-items: center;
    }
    
    .card {
        width: 100%;
        max-width: 400px;
    }
    
    .title {
        font-size: 2rem;
    }
}
</style>
</head>
<body>

<button class="back-button" onclick="location.href='index.php'">Kembali</button>

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