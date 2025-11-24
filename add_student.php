<?php
require_once "db_connect.php";
// If the user just opened the page → GET request
// If the user submitted the form → POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $matricule = $_POST["matricule"];
    $group_id = $_POST["group_id"];

    $sql = "INSERT INTO students(fullname, matricule, group_id) VALUES (?, ?, ?)";
    //prepare() = prepare the SQL statement with placeholders
    $stmt = $conn->prepare($sql);
    //If the insertion works → execute() returns TRUE
    if ($stmt->execute([$fullname, $matricule, $group_id])) {
        //echo "✔ Student added successfully!"; NO ECHO with redirect
        header("Location: list_students.php");
        exit;
    } else {
        echo "❌ Error adding student.";
    }
}
?>

<form method="POST">
    Full name: <input type="text" name="fullname"><br>
    Matricule: <input type="text" name="matricule"><br>
    Group: <input type="text" name="group_id"><br>
    <button type="submit">Add Student</button>
</form>
