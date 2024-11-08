<?php
    $patients = include "../fetch_data.php";
?>

<div class="appFormContainer" id="deleteFormContainer">
    <form action="../patients/deletePatient.php" method="POST" class="appForm deleteForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>DELETE</h3>
        <div class="appFormFields" id="patient-id">
            <label for="patient-id">Patient</label><br>
            <select name="patient-id" class="deleteFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($patients as $patient) { ?>
                    <option value=<?= $patient['Patient_ID'] ?>><?= $patient['Child_First_Name'].' '.$patient['Child_Last_Name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="confirmDelete" id="confirmBtn">CONFIRM</button>
    </form>
</div>

<script>
    document.body.addEventListener('click', function(event) {
        if (event.target.id === 'closeBtn') {
            deleteFormContainer.style.display = "none";
        }
})
</script>