<?php
    $vaccines = include "../fetch_data.php";
?>

<div class="appFormContainer" id="deleteFormContainer">
    <form action="../vaccines/deleteVax.php" method="POST" class="appForm deleteForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>DELETE</h3>
        <div class="appFormFields" id="vax-id">
            <label for="vax-id">Vaccine</label><br>
            <select name="vax-id" class="deleteFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($vaccines as $vaccine) { ?>
                    <option value=<?= $vaccine['Vaccine_ID'] ?>><?= $vaccine['Brand'].' - '.$vaccine['Type'] ?></option>
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