<?php
include '..\db_connection.php';

session_start();

$table_name = $_SESSION['table'];
$id = $_POST['hw-id'];

try {
    $query = "DELETE FROM `healthworkers` WHERE $id = `Worker_ID`";

    include "db_connection.php";
    
    $conn->exec($query);
    $response = [
        'success' => true, 
        'message' => 'Healthcare Worker Record successfully removed from the system.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: ../healthcare-workers/healthworkers.php");


