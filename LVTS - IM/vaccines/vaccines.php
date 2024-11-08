<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaccines</title>
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

        $_SESSION['table'] = "vaccines";
        $currUser = $_SESSION['user'];
        $users = include "../fetch_data.php";
    ?>

    <div id="dashboardMainContainer">
        <?php include '../partials/sidebar.php'; ?>
        <div class="dashboard_content_container", id="dashboard_content_container">
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div id="userAddFormContainer">
                        <div class="vaxTableContainer appTableContainer">
                            <table class="vax_table appTable">
                                <thead>
                                    <tr>
                                        <th>Vaccine ID</th>
                                        <th>Date Added</th>
                                        <th>Brand</th>
                                        <th>Type</th>
                                        <th>Dosage</th>
                                        <th>Expiration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user) { ?>
                                    <tr>
                                        <td><?= $user['Vaccine_ID'] ?></td>
                                        <td><?= $user['Date_Added'] ?></td>
                                        <td><?= $user['Brand'] ?></td>
                                        <td><?= $user['Type'] ?></td>
                                        <td><?= $user['Dosage'] ?> mL</td>
                                        <td><?= $user['Expiration'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                                    <?php
                                    if($currUser['Role'] == 'Admin' || $currUser['Role'] == 'Doctor') {
                                    ?>
                                        <div class="btnContainer">
                                            <button id="addBtn" class="buttons"><i><img src="\img\add.png" alt="Add New Transaction"></i>ADD</button>
                                            <button id="deleteBtn" class="buttons"><i><img src="\img\delete.png" alt="Delete Transaction"></i>DELETE</button>
                                            <button id="updateBtn" class="buttons"><i><img src="\img\update.png" alt="Update Transaction"></i>UPDATE</button>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php include '../vaccines/vax_form.php';
                                          include '../vaccines/delete_vax.php';
                                          include '../vaccines/update_form1.php';
                                            if($_POST) {
                                                include '../vaccines/update_form2.php'; ?>
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
