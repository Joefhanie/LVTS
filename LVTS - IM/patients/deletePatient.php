<?php
include '..\db_connection.php';

session_start();

$table_name = $_SESSION['table'];
$id = $_POST['patient-id'];

try {
    $query = "DELETE FROM `patients` WHERE $id = `Patient_ID`";

    include "db_connection.php";
    
    $conn->exec($query);
    $response = [
        'success' => true, 
        'message' => 'Patient Record successfully removed from the system.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: ../patients/patients.php");


