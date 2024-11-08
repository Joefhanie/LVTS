<?php
    $transactions = include "../fetch_data.php";

?>

<div class="appFormContainer" id="updateFormContainer1">
    <form action="../transactions/transactions.php" method="POST" class="appForm updateForm1", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>UPDATE</h3>
        <div class="appFormFields" id="transID">
            <label for="transID">Transaction</label><br>
            <select name="transID" class="updateFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($transactions as $transaction) { ?>
                    <option value=<?= $transaction['Transaction_ID'] ?>><?= $transaction['Transaction_ID'].' - '.$transaction['Patient_Name'] ?></option>
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
