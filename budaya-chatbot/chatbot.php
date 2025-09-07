<?php
$API_KEY = "AIzaSyA6_KjzbdP1WhywX0suGPFpS4zn91CqCxc"; 
$model = "gemini-2.5-pro"; 
$url = "https://generativelanguage.googleapis.com/v1beta/models/$model:generateContent?key=$API_KEY";

$userMessage = trim($_POST['message'] ?? '');

if ($userMessage === '') {
    header("Content-Type: application/json");
    echo json_encode(["reply" => "Silakan ketik pertanyaan tentang budaya Jawa Timur."], JSON_PRETTY_PRINT);
    exit;
}

$data = [
    "systemInstruction" => [
        "role" => "system",
        "parts" => [
            ["text" => "Anda adalah chatbot khusus budaya Jawa Timur.
            Aturan:
            - Jawab hanya jika pertanyaan berhubungan dengan budaya, tradisi, kuliner, pakaian adat, kesenian, ritual, atau sejarah Jawa Timur.
            - Jika tidak relevan dengan budaya Jawa Timur, jawab: 'Maaf, saya hanya bisa menjawab tentang budaya Jawa Timur.'
            - Jawaban maksimal 3 kalimat, singkat, jelas, mudah dipahami, dan tanpa bullet point."]
        ]
    ],
    "contents" => [
        [
            "role" => "user",
            "parts" => [
                ["text" => $userMessage]
            ]
        ]
    ]
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("cURL Error: " . curl_error($ch));
}

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200) {
    die("Request gagal. HTTP Code: $httpCode\n\nResponse: $response");
}

$result = json_decode($response, true);
$reply = $result['candidates'][0]['content']['parts'][0]['text'] ?? "Maaf, tidak ada jawaban.";

$reply = preg_replace('/\*\*(.*?)\*\*/', '$1', $reply);
$reply = preg_replace('/\*(.*?)\*/', '$1', $reply);
$reply = preg_replace('/\#\#\#?\s?/', '', $reply);
$reply = nl2br(trim($reply));

header("Content-Type: application/json");
echo json_encode(["reply" => $reply], JSON_PRETTY_PRINT);