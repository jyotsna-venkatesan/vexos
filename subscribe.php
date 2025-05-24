<?php
/**
 * Email Subscription Handler for Vexos
 * Place this file in the root of your vexos.space domain
 */

// Allow cross-origin requests (if needed)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
    exit();
}

// Get input data
$data = json_decode(file_get_contents('php://input'), true);

// Validate input
if (empty($data) || !isset($data['email'])) {
    http_response_code(400);
    echo json_encode(['message' => 'Missing required fields']);
    exit();
}

// Get and sanitize email
$email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['message' => 'Invalid email address']);
    exit();
}

// Get target email (where to send notification)
$target = isset($data['target']) ? filter_var($data['target'], FILTER_SANITIZE_EMAIL) : 'venkatesanjyotsna@gmail.com';

// Store subscription in a file
$subscriptions_file = 'subscribers.txt';
$current_time = date('Y-m-d H:i:s');
$entry = $current_time . ' - ' . $email . PHP_EOL;

if (file_put_contents($subscriptions_file, $entry, FILE_APPEND | LOCK_EX)) {
    $file_saved = true;
} else {
    $file_saved = false;
}

// Send email notification
$subject = 'New Vexos Email Subscription';
$message = "
<html>
<head>
    <title>New Vexos Subscription</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        h1 { color: #E2145C; }
        .email { font-weight: bold; font-size: 18px; margin: 15px 0; }
        .footer { margin-top: 30px; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>New Subscription to Vexos Updates</h1>
        <p>You have received a new subscription from:</p>
        <p class='email'>" . htmlspecialchars($email) . "</p>
        <p>Time: " . $current_time . "</p>
        <p>This email has been added to your subscription list.</p>
        <div class='footer'>
            <p>Sent from your Vexos website at vexos.space</p>
        </div>
    </div>
</body>
</html>
";

// Set headers for HTML email
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: noreply@vexos.space',
    'Reply-To: ' . $email
];

// Try to send email
$email_sent = mail($target, $subject, $message, implode("\r\n", $headers));

// Prepare response
$response = [
    'success' => true,
    'message' => 'Thank you for subscribing!',
    'email' => $email
];

// Check if anything failed
if (!$file_saved && !$email_sent) {
    http_response_code(500);
    $response = [
        'success' => false,
        'message' => 'Failed to process your subscription. Please try again later.'
    ];
} else if (!$file_saved) {
    // At least the email was sent
    $response['warning'] = 'Your subscription was received, but there was an issue saving it to our database. We\'ll add you manually.';
} else if (!$email_sent) {
    // At least it was saved to file
    $response['warning'] = 'Your subscription was saved, but there was an issue sending the notification. No action needed from you.';
}

// Send response
header('Content-Type: application/json');
echo json_encode($response);