<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LVTS</title>
    <link rel="icon" href="/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/clientStyle.css">

    <!-- Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        session_start();
        include "./db_connection.php";
 
        $currUser = $_SESSION['user'];
        $id = $currUser['Patient_ID'];

        $query = "SELECT * FROM `transactions` WHERE $id = `Patient_ID`";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $transactions = $stmt->fetchAll();
    ?>

    <div id="dashboardMainContainer">
        <div class="dashboard_content_container", id="dashboard_content_container">
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="childInfo">
                        <div class="childImage">
                            <img src="img/user.png" alt="user">
                        </div>
                        <div class="childInfo1">
                            <h1 id="childName"><?= $currUser['Child_Last_Name'] .', '.$currUser['Child_First_Name'] ?></h1>
                            <h3 id="childAge">Age: <?= $currUser['Child_Age'] ?></h3>
                            <h3 id="childGender">Gender: <?= $currUser['Gender'] ?></h3>
                            <h3 id="childBirthdate">Birthdate: <?= $currUser['Birthdate'] ?></h3>
                        </div>
                        <div class="childInfo2">
                            <h3 id="childPlaceOfBirth">Place of Birth: <?= $currUser['Place_of_Birth'] ?></h3>
                            <h3 id="childHeight">Height: <?= $currUser['Height'] ?> CM</h3>
                            <h3 id="childWeight">Weight: <?= $currUser['Weight'] ?> KG</h3>
                        </div>
                    </div>
                    <div class="guardianInfo">
                        <h3 id="guardian">GUARDIAN</h3>
                        <h4 id="guardianName">Name: <?= $currUser['Guardian_Last_Name'] .', '.$currUser['Guardian_First_Name'] ?></h4>
                        <h4 id="guardianAge">Age: <?= $currUser['Guardian_Age'] ?></h4>
                        <h4 id="address">Address: <?= $currUser['Address'] ?></h4>
                        <h4 id="email">Email: <?= $currUser['Email'] ?></h4>
                        <h4 id="relationship">Relationship: <?= $currUser['Relationship'] ?></h4>
                        <h4 id="contactNumber">Contact Number: <?= $currUser['Contact_Number'] ?></h4>
                    </div>
                </div>
                <div class="dashboard_content_table">
                    <div class="table_container">
                        <table class="transactionHistory">
                            <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Date Administered</th>
                                    <th>Vaccine Administered</th>
                                    <th>Worker-in-Charge</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($transactions as $transaction) { ?>
                                <tr>
                                    <td><?= $transaction['Transaction_ID'] ?></td>
                                    <td><?= $transaction['Date_Administered'] ?></td>
                                    <td><?= $transaction['Vaccine_Administered'] ?></td>
                                    <td><?= $transaction['Worker_In_Charge'] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <button class="logoutBtn" id="logoutBtn">LOG OUT</button>
            </div>
        </div>
    </div>
    <script src="/script.js"></script>
</body>
</html>
