<?php
require_once "db_connect.php";
$conn = getConnection();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $course_id = $_POST["course_id"];
    $group_id = $_POST["group_id"];
    $opened_by = $_POST["opened_by"];
    $today = date("Y-m-d");

    $sql = "INSERT INTO attendance_sessions (course_id, group_id, date, opened_by, status)
            VALUES (?, ?, ?, ?, 'open')";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$course_id, $group_id, $today, $opened_by])) {
        $session_id = $conn->lastInsertId();
        echo "✔ Session created! SESSION ID = " . $session_id;
    } else {
        echo "❌ Error creating session.";
    }
}
?>

<form method="POST">
    Course ID: <input type="text" name="course_id" required><br>
    Group ID: <input type="text" name="group_id" required><br>
    Professor ID: <input type="text" name="opened_by" required><br>
    <button type="submit">Create Session</button>
</form>
