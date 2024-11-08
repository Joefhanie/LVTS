<?php
// session_start();
include "db_connection.php";

$table = $_SESSION['table'];
$query = $conn->prepare(" SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'$table' ORDER BY EXTRA DESC");
$query->execute();
$columns = $query->fetchAll(PDO::FETCH_ASSOC);

$id = $columns[0]['COLUMN_NAME'];

$stmt = $conn->prepare("SELECT * FROM $table ORDER BY $id ASC");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

return $stmt->fetchAll();
