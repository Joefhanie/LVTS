<?php
    $vaccines = include "../fetch_data.php";
?>

<div class="appFormContainer" id="updateFormContainer1">
    <form action="../vaccines/vaccines.php" method="POST" class="appForm updateForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>UPDATE</h3>
        <div class="appFormFields" id="vaxID">
            <label for="vaxID">Vaccine</label><br>
            <select name="vaxID" class="updateFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($vaccines as $vaccine) { ?>
                    <option value=<?= $vaccine['Vaccine_ID'] ?>><?= $vaccine['Brand'].' - '.$vaccine['Type'] ?></option>
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
