<?php
$apiKey = "y_g3B8OP2UOInCTXAZmBDg42307";
$apiBaseUrl = "https://api.getAddress.io";

if (!empty($_GET['postcode'])) {
    $postcode = urlencode($_GET['postcode']);
    $url = "{$apiBaseUrl}/addresses?postcode={$postcode}&api_key={$apiKey}";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json'
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    if ($response) {
        echo $response;
    } else {
        echo json_encode(['error' => 'Failed to fetch addresses']);
    }
} else {
    echo json_encode(['error' => 'No postcode provided']);
}

