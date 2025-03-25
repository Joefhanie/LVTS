<?php
include '..\db_connection.php';

session_start();

$table_name = $_SESSION['table'];
$id = $_POST['trans-id'];

var_dump($id);

try {
    $query = "DELETE FROM `transactions` WHERE $id = `Transaction_ID`";

    include "db_connection.php";
    
    $conn->exec($query);
    $response = [
        'success' => true, 
        'message' => 'Transaction successfully removed from the system.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: ../transactions/transactions.php");


