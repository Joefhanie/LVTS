<div class="loginLeftContainer">
    <div class="sysName">
        <h3><i><img src="/img/img.png" alt="LVTS"></i> Local Vaccination Tracking System</h>
    </div>
    <div class="userSelectBtn">
        <div class="userBtn">
            <button href="/adminLogin.php" id="adminBtn">Admin<img src=".\img\admin.png" alt="Admin" id="adminBtnImage"></button>
        </div>
        <div class="userBtn">
            <button href="/login.php" id="hwBtn">H.Worker<img src=".\img\healthworkers.png" alt="Healthcare Worker" id="hwBtnImage"></button>
        </div>
        <div class="userBtn">
            <button href="/patientLogin.php" id="patientBtn">Patient<img src=".\img\patients.png" alt="Patient" id="patientBtnImage"></button>
        </div>
    </div>
</div>

<script>
    let currentPath = window.location.pathname;

    if(currentPath === "/login.php" || currentPath === "/hwForgotPass.php") {
        hwBtnImage.style.display = "block";
    } else if(currentPath === "/adminLogin.php" || currentPath === "/adminSignup.php" || currentPath === "/adminForgotPass.php") {
        adminBtnImage.style.display = "block";
    } else if(currentPath === "/patientLogin.php") {
        patientBtnImage.style.display = "block";
    }

    adminBtn.addEventListener( 'click', (event) => {
        window.location.href = "./adminLogin.php"
    });

    hwBtn.addEventListener( 'click', (event) => {
        window.location.href = "./login.php"
    });

    patientBtn.addEventListener( 'click', (event) => {
        window.location.href = "./patientLogin.php"
    });
</script>
