<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Workers</title>
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

        $_SESSION['table'] = "healthworkers";
        $currUser = $_SESSION['user'];
        $users = include "../fetch_data.php";
    ?>

    <div id="dashboardMainContainer">
        <?php include '../partials/sidebar.php'; ?>
        <div class="dashboard_content_container", id="dashboard_content_container">
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div id="userAddFormContainer">
                        <div class="hwTableContainer appTableContainer">
                            <table class="hw_table appTable">
                                <thead>
                                    <tr>
                                        <th>Worker ID</th>
                                        <th>Date Added</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user) { 
                                        if($user['Role'] != 'Admin') {
                                    ?>
                                    <tr>
                                        <td><?= $user['Worker_ID'] ?></td>
                                        <td><?= $user['Date_Added'] ?></td>
                                        <td><?= $user['First_Name'].' '.$user['Last_Name']?></td>
                                        <td><?= $user['Age'] ?></td>
                                        <td><?= $user['Address'] ?></td>
                                        <td><?= $user['Email'] ?></td>
                                        <td><?= $user['Contact_Number'] ?></td>
                                        <td><?= $user['Role'] ?></td>
                                    </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                                    <?php
                                        if($currUser['Role'] == 'Admin') {
                                    ?>
                                        <div class="btnContainer">
                                            <button id="addBtn" class="buttons"><i><img src="\img\add.png" alt="Add New Transaction"></i>ADD</button>
                                            <button id="deleteBtn" class="buttons"><i><img src="\img\delete.png" alt="Delete Transaction"></i>DELETE</button>
                                            <button id="updateBtn" class="buttons"><i><img src="\img\update.png" alt="Update Transaction"></i>UPDATE</button>
                                        </div>
                                    <?php } ?>
                                    
                                    <?php include '../healthcare-workers/hw_form.php';
                                          include '../healthcare-workers/delete_hw.php';
                                          include '../healthcare-workers/update_form1.php';
                                            if($_POST) {
                                                include '../healthcare-workers/update_form2.php'; ?>
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
