<?php
    $transactions = include "../fetch_data.php";
?>

<div class="appFormContainer" id="deleteFormContainer">
    <form action="../transactions/deleteTrans.php" method="POST" class="appForm deleteForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>DELETE</h3>
        <div class="appFormFields" id="trans-id">
            <label for="trans-id">Transaction</label><br>
            <select name="trans-id" class="deleteFormInput" required>
                <option value="" selected disabled hidden></option>
                <?php foreach($transactions as $transaction) { ?>
                    <option value=<?= $transaction['Transaction_ID'] ?>><?= $transaction['Transaction_ID'].' - '.$transaction['Patient_Name'] ?></option>
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