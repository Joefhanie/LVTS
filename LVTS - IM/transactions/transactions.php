<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="icon" href="/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/style.css">

    <!-- Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php
        session_start();
        
        if(!isset($_SESSION['user'])) {
            header("Location: /login.php");
        }
        $currUser = $_SESSION['user'];
        $_SESSION['table'] = "transactions";
        
        $users = include "../fetch_data.php";
    ?>

    <div id="dashboardMainContainer">
        <?php include '../partials/sidebar.php'; ?>
        <div class="dashboard_content_container", id="dashboard_content_container">
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div id="userAddFormContainer">
                        <div class="transactionsTableContainer appTableContainer">
                            <table class="transactions_table appTable">
                                <thead>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <th>Patient ID</th>
                                        <th>Vaccine ID</th>
                                        <th>Worker ID</th>
                                        <th>Date Administered</th>
                                        <th>Patient Name</th>
                                        <th>Vaccine Administered</th>
                                        <th>Worker-In-Charge</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user) { ?>
                                    <tr>
                                        <td><?= $user['Transaction_ID'] ?></td>
                                        <td><?= $user['Patient_ID'] ?></td>
                                        <td><?= $user['Vaccine_ID'] ?></td>
                                        <td><?= $user['Worker_ID'] ?></td>
                                        <td><?= $user['Date_Administered'] ?></td>
                                        <td><?= $user['Patient_Name']?></td>
                                        <td><?= $user['Vaccine_Administered'] ?></td>
                                        <td><?= $user['Worker_In_Charge'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                            <?php
                                    if($currUser['Role'] == 'Admin' || $currUser['Role'] == 'Doctor' || $currUser['Role'] == 'Nurse') {
                            ?>
                                    <div class="btnContainer">
                                        <button id="addBtn" class="buttons"><i><img src="\img\add.png" alt="Add New Transaction"></i>ADD</button>
                                        <?php if($currUser['Role'] == 'Admin') { ?>
                                            <button id="deleteBtn" class="buttons"><i><img src="\img\delete.png" alt="Delete Transaction"></i>DELETE</button>
                                            <button id="updateBtn" class="buttons"><i><img src="\img\update.png" alt="Update Transaction"></i>UPDATE</button>
                                    </div>
                            <?php } 
                            }?>

                                    <?php include '../transactions/transactions_form.php';
                                          include '../transactions/delete_transaction.php';
                                          include '../transactions/update_form1.php';
                                          if($_POST) {
                                              include '../transactions/update_form2.php'; ?>
                                              <script>
                                                  updateFormContainer1.style.display = "none";
                                                  updateFormContainer2.style.display = "block";
                                                </script>
                                            <?php } ?>
                                    
                                    <?php
                                if(isset($_SESSION['response'])) {
                                    $response_message =  $_SESSION['response']['message'];
                                    $is_success =  $_SESSION['response']['success'];
                                    ?>
                            <div class="responseMessage">
                                <p class="<?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>">
                                    <?= $response_message ?>
                                </p>
                            </div>
                            <?php unset($_SESSION['response']); } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/script.js"></script>
</body>
</html>
