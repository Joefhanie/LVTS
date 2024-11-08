<?php
session_start();
include '../db_connection.php';

$table_name = $_SESSION['table'];
$id = $_SESSION['patient-id'];
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
$dateQuery = "SELECT `Date_Created` FROM `patients` WHERE $id = `Patient_ID`";

var_dump($birthdate);

$stmt = $conn->prepare($dateQuery);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

$d = $stmt->fetchAll();
$date = $d[0]['Date_Created'];

try {
    $query = "UPDATE `patients` SET `Date_Created` = '$date', `Guardian_First_Name` = '$guardianFirstName', `Guardian_Last_Name` = '$guardianLastName', `Guardian_Age` = $guardianAge, `Address` = '$address', `Email` = '$email', `Contact_Number` = '$contactNumber', `Relationship` = '$relationship', `Child_First_Name` = '$childFirstName', `Child_Last_Name` = '$childLastName', `Child_Age` = $childAge, `Gender` = '$gender', `Birthdate` = '$birthdate', `Place_of_Birth` = '$placeOfBirth', `Height` = $height, `Weight` = $weight  WHERE $id = `Patient_ID`";

    include "db_connection.php";
    
    $conn->exec($query);
    $response = [
        'success' => true,
        'message' => 'Patient Record successfully updated.'
    ];
} catch(PDOException $e) {
    $response = [
        'success' => false,
        'message' => $e->getMessage()
    ];
}

$_SESSION['response'] = $response;
header("Location: ../patients/patients.php");
