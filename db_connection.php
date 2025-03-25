<?php
$dsn = "mysql:host=localhost;dbname=lvts;charset=utf8mb4";
$username = 'root';
$password = 'admin';

try {
    try {
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Connection failed: ". $e->getMessage());
    }

    $tables = ['administrators', 'patients', 'healthworkers', 'vaccines', 'transactions'];
    $errorMsg = "Error creating table: ";

    foreach ($tables as $table) {
        $sql = "SHOW TABLES LIKE '$table'";
        $result = $conn->query($sql);

        if (!$result || !$result->rowCount()) {
            if($table === 'administrators'){
                $createTableSQL = "
                    CREATE TABLE $table (
                        `Admin_ID` INT NOT NULL AUTO_INCREMENT,
                        PRIMARY KEY(`Admin_ID`),
                        `Date_Created` DATETIME NOT NULL,
                        `Username` VARCHAR(255) NOT NULL,
                        `Password` VARCHAR(255) NOT NULL,
                        `First_Name` VARCHAR(255) NOT NULL,
                        `Last_Name` VARCHAR(255) NOT NULL,
                        `Age` INT NOT NULL,
                        `Email` VARCHAR(255) NOT NULL,
                        `Role` VARCHAR(255) NOT NULL DEFAULT 'Admin'
                        )";
                    }

            if($table === 'patients'){
                $createTableSQL = "
                    CREATE TABLE $table (
                        `Patient_ID` INT NOT NULL AUTO_INCREMENT,
                        PRIMARY KEY(`Patient_ID`),
                        `Date_Created` DATETIME NOT NULL,
                        `Guardian_First_Name` VARCHAR(255) NOT NULL,
                        `Guardian_Last_Name` VARCHAR(255) NOT NULL,
                        `Guardian_Age` INT NOT NULL,
                        `Address` VARCHAR(255) NOT NULL,    
                        `Contact_Number` VARCHAR(255) NOT NULL,
                        `Email` VARCHAR(255) NOT NULL,
                        `Relationship` VARCHAR(255) NOT NULL,
                        `Child_First_Name` VARCHAR(255) NOT NULL,
                        `Child_Last_Name` VARCHAR(255) NOT NULL,
                        `Child_Age` INT NOT NULL,
                        `Gender` VARCHAR(255) NOT NULL,
                        `Birthdate` DATE NOT NULL,
                        `Place_of_Birth` VARCHAR(255) NOT NULL,
                        `Height` FLOAT NOT NULL,
                        `Weight` FLOAT NOT NULL
                    )";
            }
                
            if($table == 'healthworkers'){
                $createTableSQL = "
                    CREATE TABLE $table (
                        `Worker_ID` INT AUTO_INCREMENT,
                        PRIMARY KEY(`Worker_ID`),
                        `Date_Added` DATETIME NOT NULL,
                        `First_Name` VARCHAR(255) NOT NULL,
                        `Last_Name` VARCHAR(255) NOT NULL,
                        `Password` VARCHAR(255) NOT NULL,
                        `Age` INT NOT NULL,
                        `Address` VARCHAR(255) NOT NULL,
                        `Email` VARCHAR(255) NOT NULL,
                        `Contact_Number` VARCHAR(255) NOT NULL,
                        `Role` VARCHAR(255) NOT NULL
                    )";
            }
                
            if($table === 'vaccines'){
                $createTableSQL = "
                    CREATE TABLE $table (
                            `Vaccine_ID` INT NOT NULL AUTO_INCREMENT,
                            PRIMARY KEY(`Vaccine_ID`),
                            `Date_Added` DATETIME NOT NULL,
                            `Type` VARCHAR(255) NOT NULL,
                            `Dosage` INT NOT NULL,
                            `Brand` VARCHAR(255) NOT NULL,
                            `Expiration` DATE NOT NULL
                    )";
            }
            
            if($table === 'transactions'){
                $createTableSQL = "
                    CREATE TABLE $table (
                            `Transaction_ID` INT NOT NULL AUTO_INCREMENT,
                            `Patient_ID` INT NOT NULL,
                            `Vaccine_ID` INT NOT NULL,
                            `Worker_ID` INT NOT NULL,
                            `Date_Administered` DATETIME NOT NULL,
                            `Patient_Name` VARCHAR(255) NOT NULL,
                            `Vaccine_Administered` VARCHAR(255) NOT NULL,
                            `Worker_In_Charge` VARCHAR(255) NOT NULL,
                            PRIMARY KEY(`Transaction_ID`)
                    )";
            }

            if ($conn->query($createTableSQL) === false) {
                echo $errorMsg;
            }
        }
    }
} catch (\Exception $e) {
    $error_message = $e->getMessage();
}
