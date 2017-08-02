<?php

$longUrl = $_GET["url"];

$apiUrl = "https://www.googleapis.com/urlshortener/v1/url?key=";
$apiKey = "GOOGLE_API_KEY";
$contentType = "Content-Type: application/json";

$curlSession = curl_init();

curl_setopt($curlSession, CURLOPT_URL, $apiUrl . $apiKey);
curl_setopt($curlSession, CURLOPT_POST, 1);
curl_setopt($curlSession, CURLOPT_POSTFIELDS, json_encode(array("longUrl" => $longUrl)));
curl_setopt($curlSession, CURLOPT_HTTPHEADER, array($contentType));
curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($curlSession);

curl_close($curlSession);

header('Content-type: application/json');

echo $result;
