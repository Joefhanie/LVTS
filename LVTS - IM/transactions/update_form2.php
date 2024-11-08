<?php
    include '../db_connection.php';
    $transactions = include "../fetch_data.php";

    $id= $_POST['transID'];
    $_SESSION['trans-id'] = $id;
    $query = "SELECT * FROM `transactions` WHERE `Transaction_ID` = $id";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $trans = $stmt->fetchAll();

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

<div class="appFormContainer" id="updateFormContainer2">
    <form action="../transactions/updateTrans.php" method="POST" class="appForm updateForm updateForm2", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>UPDATE</h3>
        <div class="appFormFields" id="patientName">
            <label for="patientName">Patient Name</label><br>
            <select name="patientName" class="appFormInput" required>
                <option value="<?= $trans[0]['Patient_ID'] ?>" class="appFormInput" selected><?= $trans[0]['Patient_Name']?></option>
                <?php foreach($transactions as $transaction) {
                    if ($trans[0]['Patient_ID'] != $transaction['Patient_ID']) { ?>
                    <?php foreach($patients as $patient) {
                        if ($trans[0]['Patient_ID'] != $patient['Patient_ID']) { ?>
                      <option value="<?= $patient['Patient_ID'] ?>" class="appFormInput"><?= $patient['Child_First_Name'].' '.$patient['Child_Last_Name'] ?></option>
                <?php }
                    }
                    break;
                }
                break;
            } ?>
            </select>
        </div>
        <div class="appFormFields" id="vaxAdministered">
            <label for="vaxAdministered">Vaccine Administered</label><br>
            <select name="vaxAdministered" class="appFormInput" required>
                <option value="<?= $trans[0]['Vaccine_ID'] ?>" class="appFormInput" selected><?= $trans[0]['Vaccine_Administered']?></option>
                <?php foreach($transactions as $transaction) {
                    if ($trans[0]['Vaccine_ID'] != $transaction['Vaccine_ID']) { ?>
                    <?php foreach($vaccines as $vaccine) {
                        if ($trans[0]['Vaccine_ID'] != $vaccine['Vaccine_ID']) { ?>
                      <option value="<?= $vaccine['Vaccine_ID'] ?>" class="appFormInput"><?= $vaccine['Brand'].' - '.$vaccine['Type'] ?></option>
                <?php }
                    }
                    break;
                }
                break;
            } ?>
            </select>
        </div>
        <div class="appFormFields" id="workerInCharge">
            <label for="workerInCharge">Worker-In-Charge</label><br>
            <select name="workerInCharge" class="appFormInput" required>
            <option value="<?= $trans[0]['Worker_ID'] ?>" class="appFormInput" selected><?= $trans[0]['Worker_In_Charge']?></option>
                <?php foreach($transactions as $transaction) {
                    if ($trans[0]['Worker_ID'] == $transaction['Worker_ID']) { ?>
                    <?php foreach($workers as $worker) {
                        if ($trans[0]['Worker_ID'] != $worker['Worker_ID']) { ?>
                      <option value="<?= $worker['Worker_ID'] ?>" class="appFormInput"><?= $worker['First_Name'].' '.$worker['Last_Name'] ?></option>
                <?php }
                    }
                    break;
                }
                break;
            } ?>
            </select>
        </div>
        <button type="submit" class="confirmUpdate" id="confirmBtn">CONFIRM</button>
    </form>
</div>

<script>
    document.body.addEventListener('click', function(event) {
        if (event.target.id === 'closeBtn') {
            updateFormContainer2.style.display = "none";
        }
    })
</script>
