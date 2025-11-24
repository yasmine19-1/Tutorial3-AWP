<?php
require_once 'config.php';

function getConnection() {
    try {
        // dsn = Data Source Name
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $options = [
            //If there’s an error, throw an exception
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            //when we get results from the database, return them as associative arrays (like ['name' => 'Alice', 'age' => 20])
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        /*Creates a new PDO object, which is the actual database connection.
            Parameters:
            $dsn → where the database is
            DB_USER → username
            DB_PASS → password
            $options → extra settings
            $pdo is now a connection object used to run queries.*/

        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        // Return the PDO connection object so other files can use it
        return $pdo;
    } catch (PDOException $e) {
        //Saves the error message in a file called db_errors.log.
        file_put_contents('db_errors.log', $e->getMessage() . PHP_EOL, FILE_APPEND);
        //Prints the error message on the browser
        echo "Connection failed: " . $e->getMessage();
        exit;
    }
}
?>
