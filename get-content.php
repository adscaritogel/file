<?php
// URL of the webpage you want to fetch content from
$url = 'https://pub-5798563d8df34904a8136616f850c989.r2.dev/guidelines.panelfit.eu.html';

// Initialize a cURL session
$curl = curl_init();

// Set the cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

// Execute the cURL session
$response = curl_exec($curl);

// Check if the request was successful
if ($response === false) {
    echo 'Error: ' . curl_error($curl);
} else {
    // Print the content of the webpage
    echo $response;
}

// Close the cURL session
curl_close($curl);
?>