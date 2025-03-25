<?php
    $workers = include "../fetch_data.php";
?>

<div class="appFormContainer" id="deleteFormContainer">
    <form action="../healthcare-workers/deleteHW.php" method="POST" class="appForm deleteForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>DELETE</h3>
        <div class="appFormFields" id="hw-id">
            <label for="hw-id">Healthcare Worker</label><br>
            <select name="hw-id" class="deleteFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($workers as $worker) {
                    if($worker['Role'] != 'Admin') {
                ?>
                    <option value=<?= $worker['Worker_ID'] ?>><?= $worker['First_Name'].' '.$worker['Last_Name'].' - '.$worker['Role'] ?></option>
                <?php }
                }?>
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