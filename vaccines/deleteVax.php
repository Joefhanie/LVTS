<?php
include '..\db_connection.php';

session_start();

$table_name = $_SESSION['table'];
$id = $_POST['vax-id'];

try {
    $query = "DELETE FROM `vaccines` WHERE $id = `Vaccine_ID`";

    include "db_connection.php";
    
    $conn->exec($query);
    $response = [
        'success' => true, 
        'message' => 'Vaccine Record successfully removed from the system.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: ../vaccines/vaccines.php");


