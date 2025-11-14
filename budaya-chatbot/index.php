<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot Budaya Indonesia - Swara Jatim</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    /* ============================
   GLOBAL STYLE (NO GRADIENT)
============================ */
:root {
  --cream-bg: #f4ede3;
  --card: #e7d7c3;
  --brown-text: #3f2f27;
  --brown-dark: #2a1c14;
  --orange: #c87437;
  --orange-dark: #a65f2e;
  --border: #c1b09b;
  --radius: 1rem;
}

body {
  background: var(--cream-bg);
  margin: 0;
  padding: 1.5rem;
  font-family: "DM Sans", sans-serif;
  color: var(--brown-text);
}

/* ============================
   BACK BUTTON
============================ */
.back-button {
  text-decoration: none;
  background: #C78A3B;
  color: white;
  padding: 0.8rem 1.4rem;
  border-radius: var(--radius);
  font-weight: 600;
  box-shadow: 0 3px 12px rgba(0,0,0,0.25);
  position: fixed;
  top: 1.5rem;
  left: 1.5rem;
}

/* ============================
   HEADER
============================ */
.header h1 {
  text-align: center;
  font-family: "Playfair Display", serif;
  font-size: 2.8rem;
  margin-top: 5rem;
  font-weight: 700;
  color: var(--brown-dark);
}

.header p {
  text-align: center;
  margin-top: 0.4rem;
  font-size: 1.1rem;
  color: #6b5a4a;
}

/* ============================
   CHATBOX CONTAINER
============================ */
.chat-container {
  background: var(--card);
  border-radius: var(--radius);
  width: 100%;
  max-width: 760px;
  margin: 2rem auto 0;
  padding: 0;
  box-shadow: 0 6px 28px rgba(0,0,0,0.18);
  border: 3px solid var(--border);
}

/* HEADER BOX */
.chat-header {
  background: #C78A3B;
  color: white;
  padding: 1rem;
  text-align: center;
  font-family: "Playfair Display", serif;
  font-size: 1.3rem;
  font-weight: 700;
  border-radius: var(--radius) var(--radius) 0 0;
}

/* ============================
       CHAT AREA
============================ */
#chatbox {
  height: 450px;
  padding: 1.5rem;
  overflow-y: auto;
}

/* HIDE FUTURISTIC FEEL → NATURAL STYLE */
.msg {
  max-width: 80%;
  padding: 1rem 1.4rem;
  border-radius: 0.6rem;
  margin-bottom: 1rem;
  line-height: 1.5;
  font-size: 0.95rem;
  border: 1px solid var(--border);
}

/* USER MESSAGE → NOTE STYLE */
.msg.user {
  background: #fce9d2;
  margin-top: 30px;
  margin-left: auto;
  color: var(--brown-dark);
  border-left: 5px solid var(--orange);
}

/* BOT MESSAGE → BROWNISH SOFT */
.msg.bot {
  background: #fffaf4;
  color: var(--brown-text);
  display: flex;
  gap: 12px;
  border-left: 5px solid var(--brown-text);
}

/* BOT ICON (NO AI STYLE) → NATURAL PHOTO */
.bot-icon {
  width: 50px;
  height: 50px;
  border-radius: 10px;
  object-fit: cover;
}

/* ============================
      INPUT SECTION
============================ */
.input-container {
  display: flex;
  gap: 10px;
  padding: 1rem;
  background: #f7eee3;
  border-top: 2px solid var(--border);
}

input {
  flex: 1;
  padding: 0.9rem;
  border-radius: var(--radius);
  border: 2px solid var(--border);
  background: var(--cream-bg);
  font-size: 1rem;
}

button {
  background: var(--orange);
  color: white;
  padding: 0 1.5rem;
  border: none;
  border-radius: var(--radius);
  font-weight: 700;
  cursor: pointer;
}

button:hover {
  background: var(--orange-dark);
  transform: translateY(-2px);
}

/* TYPING INDICATOR */
.typing-dot {
  width: 6px;
  height: 6px;
  background: #a89a8f;
  border-radius: 50%;
  animation: blink 1.4s infinite;
}
  </style>
</head>
<body>
  <a href="../index.php" class="back-button">
    Kembali
  </a>

  <div class="header">
    <h1>🤖 AI Budaya Indonesia</h1>
    <p>Eksplorasi kekayaan budaya Jawa Timur dengan teknologi AI</p>
  </div>

  <div class="chat-container">
    <div class="chat-header">
      Assistant Budaya Jawa Timur
    </div>
    
    <div id="chatbox">
      <div class="welcome-message">
        👋 Selamat datang! Saya siap membantu Anda menjelajahi kekayaan budaya, tradisi, kuliner, dan kesenian Jawa Timur. Silakan tanyakan apa saja!
      </div>
    </div>
    
    <div class="input-container">
      <input type="text" id="message" placeholder="Tanya tentang seputar Jawa Timur...">
      <button onclick="sendMessage()">Kirim</button>
    </div>
  </div>

 <script>
    function sendMessage() {
      let msg = document.getElementById("message").value.trim();
      if (!msg) return;
      
      let chatbox = document.getElementById("chatbox");

      // Pesan user
      chatbox.innerHTML += `
        <div class='msg user'>
          <strong>Anda:</strong> ${msg}
        </div>
      `;

      // Typing indicator pakai gambar bot
      chatbox.innerHTML += `
        <div class='msg bot' id='typing'>
          <img src="AI bot.png" class="bot-icon">
          <span class="typing-indicator">
            <span class="typing-dot"></span>
            <span class="typing-dot"></span>
            <span class="typing-dot"></span>
          </span> Sedang mengetik...
        </div>
      `;
      chatbox.scrollTop = chatbox.scrollHeight;

      // Fetch ke chatbot.php
      fetch("chatbot.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "message=" + encodeURIComponent(msg)
      })
      .then(res => res.json())
      .then(data => {

        document.getElementById('typing').remove();

        // Balasan bot pakai gambar bot
        chatbox.innerHTML += `
          <div class='msg bot'>
            <img src="AI bot.png" class="bot-icon">
            ${data.reply}
          </div>
        `;

        chatbox.scrollTop = chatbox.scrollHeight;
      })
      .catch(error => {

        document.getElementById('typing').remove();

        // Error message bot pakai gambar bot
        chatbox.innerHTML += `
          <div class='msg bot'>
            <img src="AI bot.png" class="bot-icon">
            Maaf, terjadi kesalahan. Silakan coba lagi.
          </div>
        `;

        chatbox.scrollTop = chatbox.scrollHeight;
      });

      document.getElementById("message").value = "";
    }

    document.getElementById("message").addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        sendMessage();
      }
    });
</script>
</body>
</html>