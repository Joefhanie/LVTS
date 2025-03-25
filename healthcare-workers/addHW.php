<?php
session_start();

$table_name = $_SESSION['table'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$pass = $_POST['password'];
$age = $_POST['age'];
$address = $_POST['address'];
$contactNumber = $_POST['contactNumber'];
$email = $_POST['email'];
$role = $_POST['role'];
$users = include "../fetch_data.php";

try {
    foreach($users as $user) {
        if($user['Email'] == $email) {
            $response = [
                'success' => false,
                'message' => $email.' already exists.'
            ];
            
            $_SESSION['response'] = $response;
            header("Location: /healthcare-workers/healthworkers.php");
            return;
        }
    }

    $insert = "INSERT INTO
                    $table_name(Date_Added, First_Name, Last_Name, Password, Age, Contact_Number, Email, Address, Role)
                VALUES 
                    (NOW(),'".$firstName."', '".$lastName."','".$pass."', '".$age."', '".$contactNumber."', '".$email."', '".$address."', '".$role."')";
                    var_dump($insert);
    
    include "../db_connection.php";
    
    $conn->exec($insert);
    $response = [
        'success' => true, 
        'message' => $firstName.' '. $lastName .' successfully added to the system.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: /healthcare-workers/healthworkers.php");


