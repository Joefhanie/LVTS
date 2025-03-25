<div class="appFormContainer" id="appFormContainer">
    <form action="../healthcare-workers/addHW.php" method="POST" class="appForm", id="appForm">
        <span class="closeBtn" id="closeBtn">&times;</span><br>
        <h3>ADD</h3>
        <div class="appFormFields userInfo" id="firstName">
            <label for="firstName">First Name</label>
            <input type="text" class="appFormInput" name="firstName" required>
        </div>
        <div class="appFormFields userInfo" id="lastName">
            <label for="lastName">Last Name</label>
            <input type="text" class="appFormInput" name="lastName" required>
        </div>
        <div class="appFormFields userInfo" id="age">
            <label for="age">Age</label>
            <input type="number" class="appFormInput" name="age" required>
        </div>
        <div class="appFormFields"  id="address">
            <label for="address">Address</label>
            <input type="text" class="appFormInput" name="address" required>
        </div>
        <div class="appFormFields userContacts" id="email">
            <label for="email">E-mail</label>
            <input type="email" class="appFormInput" name="email" required>
        </div>
        <div class="appFormFields userContacts" id="contactNumber">
            <label for="contactNumber">Contact Number</label>
            <input type="number" class="appFormInput" name="contactNumber" required>
        </div>
        <div class="appFormFields passAndRole" id="password">
            <label for="password">Password</label>
            <input type="password" class="appFormInput" name="password" required>
        </div>
        <div class="appFormFields passAndRole" id="role">
            <label for="role">Role</label><br>
            <select name="role" class="appFormInput" required>
                <option value="" selected disabled hidden></option>
                <option value="Volunteer">Volunteer</option>
                <option value="Doctor">Doctor</option>
                <option value="Nurse">Nurse</option>
            </select>
        </div>
        <button type="submit" id="confirmBtn">CONFIRM</button>
    </form>
</div>


<script>
    document.body.addEventListener('click', function(event) {
        if (event.target.id === 'closeBtn') {
            appFormContainer.style.display = "none";
        }
    })
</script>

