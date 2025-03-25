<div class="appFormContainer patientFormContainer" id="appFormContainer">
    <form action="../patients/addPatient.php" method="POST" class="appForm patientForm", id="appForm">
        <span class="closeBtn" id="closeBtn">&times;</span><br>
        <h3>ADD</h3>
        <div id="guardianInfo">
            <h3 id="guardianLbl">GUARDIAN</h3>
            <div class="appFormFields userInfo" id="guardianFirstName">
                <label for="First Name">First Name</label>
                <input type="text" class="appFormInput" name="guardianFirstName" required>
            </div>
            <div class="appFormFields userInfo" id="guardianLastName">
                <label for="Last Name">Last Name</label>
                <input type="text" class="appFormInput" name="guardianLastName" required>
            </div>
            <div class="appFormFields userInfo" id="guardianAge">
                <label for="Age">Age</label>
                <input type="number" class="appFormInput" name="guardianAge" required>
            </div>
            <div class="appFormFields"  id="address">
                <label for="Address">Address</label>
                <input type="text" class="appFormInput" name="address" required>
            </div>
            <div class="appFormFields row" id="email">
                <label for="E-mail">E-mail</label>
                <input type="email" class="appFormInput" name="email" required>
            </div>
            <div class="appFormFields row" id="contactNumber">
                <label for="Contact Number">Contact Number</label>
                <input type="number" class="appFormInput" name="contactNumber" required>
            </div>
            <div class="appFormFields row" id="relationship">
                <label for="Relationship">Relationship</label>
                <input type="text" class="appFormInput" name="relationship" required>
            </div>
        </div>
        <div id="childInfo">
            <h3 id="childLbl">CHILD</h3>
            <div class="appFormFields userInfo" id="childFirstName">
                <label for="First Name">First Name</label>
                <input type="text" class="appFormInput" name="childFirstName" required>
            </div>
            <div class="appFormFields userInfo" id="childLastName">
                <label for="Last Name">Last Name</label>
                <input type="text" class="appFormInput" name="childLastName" required>
            </div>
            <div class="appFormFields userInfo" id="childAge">
                <label for="Age">Age</label>
                <input type="number" class="appFormInput" name="childAge" required>
            </div>
            <div class="appFormFields row" id="gender">
                <label for="Gender">Gender</label>
                <input type="text" class="appFormInput" name="gender" required>
            </div>
            <div class="appFormFields row"  id="birthdate">
                <label for="Birthdate">Birthdate</label>
                <input type="date" class="appFormInput" name="birthdate" required>
            </div>
            <div class="appFormFields row" id="placeOfBirth">
                <label for="Place of Birth">Place of Birth</label>
                <input type="text" class="appFormInput" name="placeOfBirth" required>
            </div>
            <div class="appFormFields row" id="height">
                <label for="Height">Height</label>
                <input type="number" class="appFormInput" name="height" required>
            </div>
            <div class="appFormFields row" id="weight">
                <label for="Weight">Weight</label>
                <input type="number" class="appFormInput" name="weight" required>
            </div>
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
