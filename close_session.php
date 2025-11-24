<?php
require_once "db_connect.php";
$conn = getConnection(); 
if (!isset($_GET["id"])) {
    die("Session ID missing.");
}
//Reads the session ID from the URL and stores it in $session_id
$session_id = $_GET["id"];

$sql = "UPDATE attendance_sessions SET status='closed' WHERE id=?";
$stmt = $conn->prepare($sql);

if ($stmt->execute([$session_id])) {
    echo "✔ Session closed successfully!";
} else {
    echo "❌ Failed to close session.";
}
?>
