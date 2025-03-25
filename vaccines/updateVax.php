<?php
session_start();
include '../db_connection.php';

$table_name = $_SESSION['table'];
$id = $_SESSION['vax-id'];
$brand = $_POST['brand'];
$type = $_POST['vaxType'];
$dosage = $_POST['dosage'];
$expiration = $_POST['expiration'];
$dateQuery = "SELECT `Date_Added` FROM `vaccines` WHERE $id = `Vaccine_ID`";

$stmt = $conn->prepare($dateQuery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$d = $stmt->fetchAll();
$date = $d[0]['Date_Added'];

try {
    $query = "UPDATE `vaccines` SET `Date_Added` = '$date', `Brand` = '$brand', `Type` = '$type', `Dosage` = '$dosage', `Expiration` = '$expiration' WHERE $id = `Vaccine_ID`";

    include "db_connection.php";
    
    $conn->exec($query);
    $response = [
        'success' => true,
        'message' => 'Vaccine successfully updated.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: ../vaccines/vaccines.php");
