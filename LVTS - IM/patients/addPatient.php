<?php
session_start();

$table_name = $_SESSION['table'];
$guardianFirstName = $_POST['guardianFirstName'];
$guardianLastName = $_POST['guardianLastName'];
$guardianAge = $_POST['guardianAge'];
$address = $_POST['address'];
$email = $_POST['email'];
$contactNumber = $_POST['contactNumber'];
$relationship = $_POST['relationship'];
$childFirstName = $_POST['childFirstName'];
$childLastName = $_POST['childLastName'];
$childAge = $_POST['childAge'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$placeOfBirth = $_POST['placeOfBirth'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$users = include "../fetch_data.php";

try {
    foreach($users as $user) {
        if($user['Child_First_Name'] == $childFirstName && $user['Child_Last_Name'] == $childLastName) {
            $response = [
                'success' => false,
                'message' => 'Patient '.$childFirstName.' '.$childLastName.' already exists.'
            ];
            
            $_SESSION['response'] = $response;
            header("Location: ../entities/patients.php");
            return;
        }
    }

    $insert = "INSERT INTO
                    $table_name(Date_Created, Guardian_First_Name, Guardian_Last_Name, Guardian_Age, Address, Email, Contact_Number, Relationship, Child_First_Name, Child_Last_Name, Child_Age, Gender, Birthdate, Place_of_Birth, Height, Weight)
                VALUES 
                    (NOW(),'".$guardianFirstName."', '".$guardianLastName."','".$guardianAge."', '".$address."', '".$email."', '".$contactNumber."', '".$relationship."','".$childFirstName."', '".$childLastName."','".$childAge."','".$gender."','".$birthdate."','".$placeOfBirth."','".$height."', '".$weight."')";
                    var_dump($insert);
    
    include "db_connection.php";
    
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
header("Location: /patients/patients.php");


