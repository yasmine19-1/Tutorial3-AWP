<?php
require_once 'db_connect.php';

$conn = getConnection();

if ($conn) {
    echo "Connection successful!";
}
?>
