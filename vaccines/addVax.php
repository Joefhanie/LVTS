<?php
session_start();

$table_name = $_SESSION['table'];
$brand = $_POST['brand'];
$vaxType = $_POST['vaxType'];
$dosage = $_POST['dosage'];
$expiration = $_POST['expiration'];
$users = include "../fetch_data.php";

try {
    foreach($users as $user) {
        if($user['Brand'] == $brand && $user['Type'] == $vaxType) {
            $response = [
                'success' => false,
                'message' => $brand.' for '. $vaxType.' already exists.'
            ];
            
            $_SESSION['response'] = $response;
            header("Location: /entities/vaccines.php");
            return;
        }
    }

    $insert = "INSERT INTO
                    $table_name(Date_Added, Brand, Type, Dosage, Expiration)
                VALUES 
                    (NOW(),'".$brand."', '".$vaxType."','".$dosage."', '".$expiration."')";
                    var_dump($insert);
    
    include "db_connection.php";
    
    $conn->exec($insert);
    $response = [
        'success' => true, 
        'message' => $brand.' for '. $vaxType .' successfully added to the system.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: /vaccines/vaccines.php");


