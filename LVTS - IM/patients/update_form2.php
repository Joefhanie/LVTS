<?php
    include '../db_connection.php';
    $patients = include "../fetch_data.php";

    $id= $_POST['patientID'];
    $_SESSION['patient-id'] = $id;
    $query = "SELECT * FROM `patients` WHERE `Patient_ID` = $id";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $patient = $stmt->fetchAll();
    $date = strtotime($patient[0]['Birthdate']);
    $birthdate = date('Y-m-d', $date);
?>

<div class="appFormContainer" id="updateFormContainer2">
    <form action="../patients/updatePatient.php" method="POST" class="appForm patientForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>UPDATE</h3>
        <div id="guardianInfo">
            <h4 id="guardianLbl">GUARDIAN</h4>
            <div class="appFormFields userInfo" id="guardianFirstName">
                <label for="First Name">First Name</label>
                <input type="text" class="appFormInput" name="guardianFirstName" value="<?= $patient[0]['Guardian_First_Name']?>" required>
                        </div>
            <div class="appFormFields userInfo" id="guardianLastName">
                <label for="Last Name">Last Name</label>
                <input type="text" class="appFormInput" name="guardianLastName" value="<?= $patient[0]['Guardian_Last_Name']?>" required>
            </div>
            <div class="appFormFields userInfo" id="guardianAge">
                <label for="Age">Age</label>
                <input type="number" class="appFormInput" name="guardianAge" value="<?= $patient[0]['Guardian_Age']?>" required>
            </div>
            <div class="appFormFields"  id="address">
                <label for="Address">Address</label>
                <input type="text" class="appFormInput" name="address" value="<?= $patient[0]['Address']?>" required>
            </div>
            <div class="appFormFields row" id="email">
                <label for="E-mail">E-mail</label>
                <input type="email" class="appFormInput" name="email" value="<?= $patient[0]['Email']?>" required>
            </div>
            <div class="appFormFields row" id="contactNumber">
                <label for="Contact Number">Contact Number</label>
                <input type="number" class="appFormInput" name="contactNumber" value="<?= $patient[0]['Contact_Number']?>" required>
            </div>
            <div class="appFormFields row" id="relationship">
                <label for="Relationship">Relationship</label>
                <input type="text" class="appFormInput" name="relationship" value="<?= $patient[0]['Relationship']?>" required>
            </div>
        </div>
        <div id="childInfo">
            <h4 id="childLbl">CHILD</h4>
            <div class="appFormFields userInfo" id="childFirstName">
                <label for="First Name">First Name</label>
                <input type="text" class="appFormInput" name="childFirstName" value="<?= $patient[0]['Child_First_Name']?>" required>
            </div>
            <div class="appFormFields userInfo" id="childLastName">
                <label for="Last Name">Last Name</label>
                <input type="text" class="appFormInput" name="childLastName"  value="<?= $patient[0]['Child_Last_Name']?>" required>
            </div>
            <div class="appFormFields userInfo" id="childAge">
                <label for="Age">Age</label>
                <input type="number" class="appFormInput" name="childAge"  value="<?= $patient[0]['Child_Age']?>" required>
            </div>
            <div class="appFormFields row" id="gender">
                <label for="Gender">Gender</label>
                <input type="text" class="appFormInput" name="gender"  value="<?= $patient[0]['Gender']?>" required>
            </div>
            <div class="appFormFields row"  id="birthdate">
                <label for="Birthdate">Birthdate</label>
                <input type="date" class="appFormInput" name="birthdate"  value="<?= $birthdate?>">
            </div>
            <div class="appFormFields row" id="placeOfBirth">
                <label for="Place of Birth">Place of Birth</label>
                <input type="text" class="appFormInput" name="placeOfBirth"  value="<?= $patient[0]['Place_of_Birth']?>" required>
            </div>
            <div class="appFormFields row" id="height">
                <label for="Height">Height</label>
                <input type="number" class="appFormInput" name="height"  value="<?= $patient[0]['Height']?>" required>
            </div>
            <div class="appFormFields row" id="weight">
                <label for="Weight">Weight</label>
                <input type="number" class="appFormInput" name="weight"  value="<?= $patient[0]['Weight']?>" required>
            </div>
        </div>
        <button type="submit" class="confirmUpdate" id="confirmBtn">CONFIRM</button>
    </form>
</div>

<script>
    document.body.addEventListener('click', function(event) {
        if (event.target.id === 'closeBtn') {
            updateFormContainer.style.display = "none";
        }
    })
</script>
