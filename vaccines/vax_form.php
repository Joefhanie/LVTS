<div class="appFormContainer" id="appFormContainer">
    <form action="../vaccines/addVax.php" method="POST" class="appForm", id="appForm">
        <span class="closeBtn" id="closeBtn">&times;</span><br>
        <h3>ADD</h3>
        <div class="appFormFields row1" id="brand">
            <label for="Brand">Brand</label>
            <input type="text" class="appFormInput" name="brand" required>
        </div>
        <div class="appFormFields row2" id="vaxType">
            <label for="Type">Type</label>
            <input type="text" class="appFormInput" name="vaxType" required>
        </div>
        <div class="appFormFields row2" id="dosage">
            <label for="Dosage">Dosage</label>
            <input type="number" class="appFormInput" name="dosage" required>
        </div>
            <div class="appFormFields row1" id="expiration">
                <label for="Expiration">Expiration</label>
            <input type="date" class="appFormInput" name="expiration" required>
        </div>
        <button type="submit" class="confirmUpdate" id="confirmBtn">CONFIRM</button>
    </form>
</div>

<script>
    document.body.addEventListener('click', function(event) {
        if (event.target.id === 'closeBtn') {
            appFormContainer.style.display = "none";
        }
    })
</script>
