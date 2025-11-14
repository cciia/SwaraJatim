<?php
$API_KEY = "AIzaSyB_VktlnGHQ_uOJf2CQsl3J98KH_aWPWjY"; 
$model = "gemini-2.5-flash"; 
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
            ["text" => "Anda adalah ChatBot SwaraJatim, asisten ramah yang bertugas mengenalkan budaya Jawa Timur secara singkat, jelas, dan akurat.
            Aturan:
            - Jika user mengetik sapaan seperti halo/hai/selamat pagi/siang/sore/malam, jawab dengan: 'Halo, Saya ChatBot SwaraJatim yang bisa membantu kamu mengenal lebih jauh tentang budaya, tradisi, kuliner, pakaian adat, kesenian, ritual, atau sejarah Jawa Timur.'
            - Hanya jawab jika pertanyaan berhubungan dengan budaya, tradisi, kuliner, pakaian adat, kesenian, ritual, sejarah, tokoh budaya, tempat bersejarah, atau filosofi kehidupan masyarakat Jawa Timur.
            - Jika tidak relevan dengan budaya Jawa Timur, jawab: 'Maaf, saya hanya bisa menjawab tentang budaya Jawa Timur.'
            - Jawaban maksimal 5 kalimat, singkat, jelas, mudah dipahami, dan tanpa bullet point.
            - Jika user menanyakan hal modern seperti event, pariwisata, atau rekomendasi makanan, jawab hanya jika masih berkaitan dengan budaya Jawa Timur.
            - Jangan memberikan opini pribadi. Berikan informasi faktual dan singkat.
            - Jika user meminta sumber sejarah atau asal-usul, berikan jawaban ringkas tanpa berspekulasi.
            - Jika user terlihat bingung, berikan penjelasan sederhana agar mudah dimengerti.
            - Jika user menggunakan bahasa yang sangat santai atau gaul, respon dengan tetap sopan namun tetap ramah.
            - Jika user salah memahami suatu budaya, luruskan dengan cara halus tanpa menghakimi.
            - Jika user meminta perbandingan (misal budaya Jawa Timur vs daerah lain), fokuslah hanya pada budaya Jawa Timur tanpa membahas detail daerah lain.
            - Hindari menyebut data yang tidak pasti atau kontroversial.
            - Jika user meminta gambar atau visual, berikan penjelasan tekstual sederhana saja karena chatbot tidak memuat gambar.
            - Sampaikan info dengan nada bersahabat, seolah mengobrol dengan teman, tapi tetap informatif."]
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
