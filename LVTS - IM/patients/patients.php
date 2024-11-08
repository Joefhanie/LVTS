<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
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
            header("Location: /patientLogin.php");
        }

        $_SESSION['table'] = "patients";
        $currUser = $_SESSION['user'];
        $users = include "../fetch_data.php";
    ?>

    <div id="dashboardMainContainer">
        <?php include '../partials/sidebar.php'; ?>
        <div class="dashboard_content_container", id="dashboard_content_container">
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div id="userAddFormContainer">
                        <div class="patientsTableContainer appTableContainer">
                            <table class="patients_table appTable">
                                <thead>
                                    <tr>
                                        <th id="col1">Patient ID</th>
                                        <th id="col2">Date Created</th>
                                        <th id="col3">Guardian's Name</th>
                                        <th id="col4">Guardian's Age</th>
                                        <th id="col5">Address</th>
                                        <th id="col6">Contact Number</th>
                                        <th id="col7">Email</th>
                                        <th id="col8">Relationship</th>
                                        <th id="col9">Child's Name</th>
                                        <th id="col10">Child's Age</th>
                                        <th id="col11">Gender</th>
                                        <th id="col12">Birthdate</th>
                                        <th id="col13">Place of Birth</th>
                                        <th id="col14">Height</th>
                                        <th id="col15">Weight</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user) { 
                                    ?>
                                    <tr>
                                        <td id="col1"><?= $user['Patient_ID'] ?></td>
                                        <td id="col2"><?= $user['Date_Created'] ?></td>
                                        <td id="col3"><?= $user['Guardian_First_Name'].' '.$user['Guardian_Last_Name']?></td>
                                        <td id="col4"><?= $user['Guardian_Age'] ?></td>
                                        <td id="col5"><?= $user['Address'] ?></td>
                                        <td id="col6"><?= $user['Contact_Number'] ?></td>
                                        <td id="col7"><?= $user['Email'] ?></td>
                                        <td id="col8"><?= $user['Relationship'] ?></td>
                                        <td id="col9"><?= $user['Child_First_Name'].' '.$user['Child_Last_Name']?></td>
                                        <td id="col10"><?= $user['Child_Age'] ?></td>
                                        <td id="col11"><?= $user['Gender'] ?></td>
                                        <td id="col12"><?= $user['Birthdate'] ?></td>
                                        <td id="col13"><?= $user['Place_of_Birth'] ?></td>
                                        <td id="col14"><?= $user['Height'] ?></td>
                                        <td id="col15"><?= $user['Weight'] ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="btnContainer">
                            <button id="addBtn" class="buttons"><i><img src="\img\add.png" alt="Add New Transaction"></i>ADD</button>
                            <button id="deleteBtn" class="buttons"><i><img src="\img\delete.png" alt="Delete Transaction"></i>DELETE</button>
                            <button id="updateBtn" class="buttons"><i><img src="\img\update.png" alt="Update Transaction"></i>UPDATE</button>
                        </div>
                                    
                                    <?php include '../patients/patient_form.php'; 
                                          include '../patients/delete_patient.php';
                                          include '../patients/update_form1.php';
                                            if($_POST) {
                                                include '../patients/update_form2.php'; ?>
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
