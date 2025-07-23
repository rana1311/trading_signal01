<?php
$token = "7552220818:AAHdQ1F7zgaOs0BIsuf3z-vw2ZNIA4D10BY";
$apiURL = "https://api.telegram.org/bot$token/";

$update = json_decode(file_get_contents("php://input"), TRUE);
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

if ($message == "/start") {
    file_get_contents($apiURL . "sendMessage?chat_id=" . $chatId . "&text=📈 Welcome to Trading Signal 01 Bot!");
} else {
    file_put_contents("users.json", json_encode($update, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    file_get_contents($apiURL . "sendMessage?chat_id=" . $chatId . "&text=📊 Signal received: $message");
}
?>