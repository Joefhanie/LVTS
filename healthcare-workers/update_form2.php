<?php
    include '../db_connection.php';
    $workers = include "../fetch_data.php";

    $id= $_POST['hwID'];
    $_SESSION['hw-id'] = $id;
    $query = "SELECT * FROM `healthworkers` WHERE `Worker_ID` = $id";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $worker = $stmt->fetchAll();

?>

<div class="appFormContainer hwUpdateFormContainer" id="updateFormContainer2">
    <form action="../healthcare-workers/updateHW.php" method="POST" class="appForm hwForm", id="appForm">
    <span id="closeBtn">&times;</span><br>
        <h3>UPDATE</h3>
        <div class="appFormFields userInfo" id="firstName">
            <label for="firstName">First Name</label>
            <input type="text" class="appFormInput" name="firstName" value="<?= $worker[0]['First_Name'] ?>" required>
        </div>
        <div class="appFormFields userInfo" id="lastName">
            <label for="lastName">Last Name</label>
            <input type="text" class="appFormInput" name="lastName"  value="<?= $worker[0]['Last_Name'] ?>" required>
        </div>
        <div class="appFormFields userInfo" id="age">
            <label for="age">Age</label>
            <input type="number" class="appFormInput" name="age"  value="<?= $worker[0]['Age'] ?>" required>
        </div>
        <div class="appFormFields"  id="address">
            <label for="address">Address</label>
            <input type="text" class="appFormInput" name="address"  value="<?= $worker[0]['Address'] ?>" required>
        </div>
        <div class="appFormFields userContacts" id="email">
            <label for="email">E-mail</label>
            <input type="email" class="appFormInput" name="email"  value="<?= $worker[0]['Email'] ?>" required>
        </div>
        <div class="appFormFields userContacts" id="contactNumber">
            <label for="contactNumber">Contact Number</label>
            <input type="number" class="appFormInput" name="contactNumber"  value="<?= $worker[0]['Contact_Number'] ?>" required>
        </div>
        <div class="appFormFields passAndRole" id="password">
            <label for="password">Password</label>
            <input type="password" class="appFormInput" name="password"  value="<?= $worker[0]['Password'] ?>" required>
        </div>
        <div class="appFormFields passAndRole" id="role">
            <label for="role">Role</label><br>
            <select name="role" class="appFormInput" required>
                <option value="<?= $worker[0]['Role'] ?>" selected><?= $worker[0]['Role'] ?></option>
                <option value="Volunteer">Volunteer</option>
                <option value="Doctor">Doctor</option>
                <option value="Nurse">Nurse</option>
            </select>
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
