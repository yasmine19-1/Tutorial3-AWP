<?php
require_once "db_connect.php";

$id = $_GET["id"];
// stmt=statment
$stmt = $conn->prepare("DELETE FROM students WHERE id=?");
$stmt->execute([$id]);

// echo "✔ Student deleted!"; this couse a problem with header redirection
header("Location: list_students.php");
exit;
?>
