<?php
    include '../db_connection.php';
    $vaccines = include "../fetch_data.php";

    $id = $_POST['vaxID'];
    $_SESSION['vax-id'] = $id;
    $query = "SELECT * FROM `vaccines` WHERE `Vaccine_ID` = $id";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $vaccine = $stmt->fetchAll();
    $date = strtotime($vaccine[0]['Expiration']);
    $expiration = date('Y-m-d', $date);
?>

<div class="appFormContainer" id="updateFormContainer2">
    <form action="../vaccines/updateVax.php" method="POST" class="appForm vaxForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>UPDATE</h3>
        <div class="appFormFields row1" id="brand">
            <label for="Brand">Brand</label>
            <input type="text" class="appFormInput" name="brand" value="<?= $vaccine[0]['Brand'] ?>" required>
        </div>
        <div class="appFormFields row2" id="vaxType">
            <label for="Type">Type</label>
            <input type="text" class="appFormInput" name="vaxType" value="<?= $vaccine[0]['Type'] ?>" required>
        </div>
        <div class="appFormFields row2" id="dosage">
            <label for="Dosage">Dosage</label>
            <input type="number" class="appFormInput" name="dosage" value="<?= $vaccine[0]['Dosage'] ?>" required>
        </div>
            <div class="appFormFields row1" id="expiration">
                <label for="Expiration">Expiration</label>
                <input type="date" class="appFormInput" name="expiration"  value="<?= $expiration ?>" required>
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
