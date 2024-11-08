<?php
    include '../db_connection.php';

    $patientQuery = "SELECT `Patient_ID`, `Child_First_Name`, `Child_Last_Name` FROM `patients`";
    $vaxQuery = "SELECT `Vaccine_ID`, `Brand`, `Type` FROM `vaccines`";
    $hwQuery = "SELECT `Worker_ID`, `First_Name`, `Last_Name` FROM `healthworkers` WHERE `Role` = 'Doctor' OR `Role` = 'Nurse' ";

    $stmt = $conn->prepare($patientQuery);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $patients = $stmt->fetchAll();
    
    $stmt = $conn->prepare($vaxQuery);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $vaccines = $stmt->fetchAll();
    
    $stmt = $conn->prepare($hwQuery);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $workers = $stmt->fetchAll();
?>

<div class="appFormContainer transFormContainer" id="appFormContainer">
    <form action="../transactions/addTrans.php" method="POST" class="appForm", id="appForm">
        <span class="closeBtn" id="closeBtn">&times;</span><br>
        <h3>ADD</h3>
        <div class="appFormFields" id="patientName">
            <label for="Patient Name">Patient Name</label><br>
            <select name="patientName" class="appFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($patients as $patient) { ?>
                    <option value=<?= $patient['Patient_ID'] ?>><?= $patient['Child_First_Name'].' '.$patient['Child_Last_Name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="appFormFields" id="vaxAdministered">
            <label for="Vaccine Administered">Vaccine Administered</label><br>
            <select name="vaxAdministered" class="appFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($vaccines as $vaccine) { ?>
                    <option value=<?= $vaccine['Vaccine_ID'] ?>><?= $vaccine['Brand'].' - '.$vaccine['Type'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="appFormFields" id="workerInCharge">
            <label for="Worker-In-Charge">Worker-In-Charge</label><br>
            <select name="workerInCharge" class="appFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($workers as $worker) { ?>
                    <option value=<?= $worker['Worker_ID'] ?>><?= $worker['First_Name'].' '.$worker['Last_Name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" id="confirmBtn">CONFIRM</button>
    </form>
</div>

<script>
    document.body.addEventListener('click', function(event) {
        if (event.target.id === 'closeBtn') {
            appFormContainer.style.display = "none";
        }
    })
</script>
