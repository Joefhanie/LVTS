<?php
    $workers = include "../fetch_data.php";
?>

<div class="appFormContainer" id="updateFormContainer1">
    <form action="../healthcare-workers/healthworkers.php" method="POST" class="appForm updateForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>UPDATE</h3>
        <div class="appFormFields" id="hwID">
            <label for="hwID">Healthcare Worker</label><br>
            <select name="hwID" class="updateFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($workers as $worker) {
                    if($worker['Role'] != 'Admin') {
                ?>
                    <option value=<?= $worker['Worker_ID'] ?>><?= $worker['First_Name'].' '.$worker['Last_Name'].' - '.$worker['Role'] ?></option>
                <?php } 
                }?>
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
