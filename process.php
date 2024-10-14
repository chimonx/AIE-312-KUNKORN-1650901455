<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the POST data and sanitize it
    $username = filter_input(INPUT_POST, 'Username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);

    // Initialize cURL session
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, 'https://assessment.bu.ac.th/App_AJAX/Login/CheckLogin.aspx');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'Username' => $username,
        'Password' => $password
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // Verify SSL certificate

    // Execute cURL request
    $response = curl_exec($ch);

    // Check for errors
    if(curl_errno($ch)){
        echo 'Request Error: ' . curl_error($ch);
    } else {
        // Output the response from the server
        echo $response;
    }

    // Close cURL session
    curl_close($ch);
} else {
    echo 'Invalid request method.';
}
?>
