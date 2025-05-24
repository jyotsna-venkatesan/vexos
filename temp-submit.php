<?php
// Simple PHP script to forward email subscriptions
// Place this file on your server to handle form submissions

// Allow CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only allow POST method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
    exit();
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);
$email = $data['email'] ?? '';
$target = $data['target'] ?? 'venkatesanjyotsna@gmail.com';

// Basic validation
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid email address']);
    exit();
}

// Log the submission (useful for debugging)
$log_entry = date('Y-m-d H:i:s') . " - New subscription: " . $email . "\n";
file_put_contents('subscriptions.log', $log_entry, FILE_APPEND);

// Prepare email
$subject = "New Vexos Email Subscriber";
$message = "
<html>
<head>
  <title>New Vexos Subscriber</title>
</head>
<body>
  <h1>New Vexos Subscriber</h1>
  <p>Someone has subscribed to Vexos updates with the email:</p>
  <p><strong>{$email}</strong></p>
  <p>Timestamp: " . date('Y-m-d H:i:s') . "</p>
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: noreply@' . $_SERVER['HTTP_HOST'],
    'Reply-To: ' . $email
];

// Try to send email
$email_sent = mail($target, $subject, $message, implode("\r\n", $headers));

// Return response
if ($email_sent) {
    http_response_code(200);
    echo json_encode([
        'message' => 'Subscription successful',
        'email' => $email
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'message' => 'Failed to send email notification',
        'email' => $email,
        'saved' => true // At least it's logged in subscriptions.log
    ]);
}