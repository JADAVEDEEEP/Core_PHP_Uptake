<?PHP
$mysqli = require '../includes/Connection.php';


$token = $_POST["token"] ?? '';

if (empty($token)) {
    die("Invalid token.");
}

$token_hash = hash("sha256", $token);

$stmt = $mysqli->prepare("SELECT * FROM users WHERE reset_token_hash = ?");

if (!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("Token not found.");
}

if (strtotime($user["reset_token_expires_at"]) <= time()) {
    die("Token has expired.");
}

echo "Token is valid.";
?>THIS 