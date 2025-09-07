<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot Budaya Indonesia - Swara Jatim</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --background: #ffffff;
      --foreground: #0f172a;
      --card: #f8fafc;
      --card-foreground: #334155;
      --primary: #06b6d4;
      --primary-foreground: #ffffff;
      --secondary: #8b5cf6;
      --muted: #f1f5f9;
      --muted-foreground: #64748b;
      --border: #e2e8f0;
      --input: #ffffff;
      --radius: 0.75rem;
      --gradient-primary: linear-gradient(135deg, #06b6d4 0%, #8b5cf6 100%);
      --gradient-secondary: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    }

    body { 
      font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, sans-serif;
      background: var(--gradient-secondary);
      color: var(--foreground);
      line-height: 1.6;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 1rem;
    }

    .back-button {
      position: fixed;
      top: 1.5rem;
      left: 1.5rem;
      background: var(--gradient-primary);
      color: var(--primary-foreground);
      border: none;
      padding: 0.75rem 1.25rem;
      border-radius: var(--radius);
      cursor: pointer;
      font-family: 'DM Sans', sans-serif;
      font-weight: 500;
      font-size: 0.875rem;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      z-index: 1000;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 4px 20px rgba(6, 182, 212, 0.15);
    }

    .back-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 30px rgba(6, 182, 212, 0.25);
    }

    .header {
      text-align: center;
      margin: 4rem 0 2rem 0;
      max-width: 600px;
    }

    .header h1 {
      font-size: 2.75rem;
      font-weight: 700;
      margin-bottom: 0.75rem;
      background: var(--gradient-primary);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: -0.025em;
    }

    .header p {
      color: var(--muted-foreground);
      font-size: 1.125rem;
      font-weight: 400;
    }

    .chat-container {
      background: var(--background);
      border-radius: 1.5rem;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 700px;
      overflow: hidden;
      border: 1px solid var(--border);
      backdrop-filter: blur(20px);
    }

    .chat-header {
      background: var(--gradient-primary);
      color: var(--primary-foreground);
      padding: 1.5rem;
      text-align: center;
      font-size: 1.125rem;
      font-weight: 600;
      position: relative;
    }

    .chat-header::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    }

    #chatbox { 
      background: var(--muted);
      padding: 1.5rem; 
      height: 500px; 
      overflow-y: auto; 
      border: none;
      scroll-behavior: smooth;
    }

    #chatbox::-webkit-scrollbar {
      width: 6px;
    }

    #chatbox::-webkit-scrollbar-track {
      background: transparent;
    }

    #chatbox::-webkit-scrollbar-thumb {
      background: var(--border);
      border-radius: 3px;
    }

    .msg { 
      margin: 1rem 0; 
      padding: 1rem 1.25rem;
      border-radius: 1.25rem;
      max-width: 85%;
      font-size: 0.95rem;
      line-height: 1.5;
      animation: slideIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(15px) scale(0.95);
      }
      to {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    .user { 
      background: var(--gradient-primary);
      color: var(--primary-foreground);
      margin-left: auto;
      text-align: right;
      box-shadow: 0 4px 20px rgba(6, 182, 212, 0.15);
    }

    .bot { 
      background: var(--background);
      color: var(--card-foreground);
      border: 1px solid var(--border);
      box-shadow: 0 2px 15px rgba(0,0,0,0.05);
    }

    .welcome-message {
      background: linear-gradient(135deg, var(--card), var(--background));
      color: var(--foreground);
      padding: 1.25rem;
      border-radius: 1rem;
      margin-bottom: 1rem;
      text-align: center;
      border: 1px solid var(--border);
      font-weight: 500;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .input-container {
      padding: 1.5rem;
      background: var(--background);
      border-top: 1px solid var(--border);
      display: flex;
      gap: 0.75rem;
      align-items: center;
    }

    input { 
      flex: 1;
      padding: 1rem 1.25rem;
      border: 2px solid var(--border);
      border-radius: 2rem;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.95rem;
      outline: none;
      background: var(--input);
      color: var(--foreground);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(6, 182, 212, 0.1);
    }

    input::placeholder {
      color: var(--muted-foreground);
    }

    button { 
      background: var(--gradient-primary);
      color: var(--primary-foreground);
      border: none;
      padding: 1rem 1.5rem;
      border-radius: 2rem;
      cursor: pointer;
      font-family: 'DM Sans', sans-serif;
      font-weight: 600;
      font-size: 0.95rem;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 4px 20px rgba(6, 182, 212, 0.15);
      min-width: 80px;
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 30px rgba(6, 182, 212, 0.25);
    }

    button:active {
      transform: translateY(0);
    }

    .typing-indicator {
      display: inline-flex;
      align-items: center;
      gap: 4px;
    }

    .typing-dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--muted-foreground);
      animation: typing 1.4s infinite ease-in-out;
    }

    .typing-dot:nth-child(1) { animation-delay: -0.32s; }
    .typing-dot:nth-child(2) { animation-delay: -0.16s; }

    @keyframes typing {
      0%, 80%, 100% {
        transform: scale(0.8);
        opacity: 0.5;
      }
      40% {
        transform: scale(1);
        opacity: 1;
      }
    }

    @media (max-width: 768px) {
      body {
        padding: 0.5rem;
      }
      
      .header {
        margin: 3rem 0 1.5rem 0;
      }
      
      .header h1 {
        font-size: 2.25rem;
      }
      
      .chat-container {
        max-width: 100%;
        border-radius: 1rem;
      }
      
      .msg {
        max-width: 90%;
      }

      .back-button {
        top: 1rem;
        left: 1rem;
        padding: 0.625rem 1rem;
        font-size: 0.8rem;
      }

      #chatbox {
        height: 400px;
        padding: 1rem;
      }

      .input-container {
        padding: 1rem;
      }
    }
  </style>
</head>
<body>
  <a href="../index.php" class="back-button">
    ← Kembali
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
      <input type="text" id="message" placeholder="Tanya tentang budaya Jawa Timur...">
      <button onclick="sendMessage()">Kirim</button>
    </div>
  </div>

  <script>
    function sendMessage() {
      let msg = document.getElementById("message").value.trim();
      if (!msg) return;
      
      let chatbox = document.getElementById("chatbox");

      chatbox.innerHTML += `<div class='msg user'><strong>Anda:</strong> ${msg}</div>`;

      chatbox.innerHTML += `<div class='msg bot' id='typing'><strong>Bot:</strong> <span class="typing-indicator"><span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span></span> Sedang mengetik...</div>`;
      chatbox.scrollTop = chatbox.scrollHeight;

      fetch("chatbot.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "message=" + encodeURIComponent(msg)
      })
      .then(res => res.json())
      .then(data => {
        document.getElementById('typing').remove();
        chatbox.innerHTML += `<div class='msg bot'><strong>Bot:</strong> ${data.reply}</div>`;
        chatbox.scrollTop = chatbox.scrollHeight;
      })
      .catch(error => {
        document.getElementById('typing').remove();
        chatbox.innerHTML += `<div class='msg bot'><strong>Bot:</strong> Maaf, terjadi kesalahan. Silakan coba lagi.</div>`;
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