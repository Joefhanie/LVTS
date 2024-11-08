<?php
    $patients = include "../fetch_data.php";
?>

<div class="appFormContainer" id="updateFormContainer1">
    <form action="../patients/patients.php" method="POST" class="appForm updateForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>UPDATE</h3>
        <div class="appFormFields" id="patientID">
            <label for="patientID">Patient</label><br>
            <select name="patientID" class="updateFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($patients as $patient) { ?>
                    <option value=<?= $patient['Patient_ID'] ?>><?= $patient['Child_First_Name'].' '.$patient['Child_Last_Name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="confirmUpdate" id="confirmBtn">CONFIRM</button>
    </form>
</div>

<script>
    document.body.addEventListener('click', function(event) {
        if (event.target.id === 'closeBtn') {
            updateFormContainer1.style.display = "none";
        }
    })
</script>
