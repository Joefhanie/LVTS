<div class="dashboard_sidebar", id="dashboard_sidebar">
    <h3 class="dashboard_logo dashboard_sidebar_top" ><div id="userRole"><?=$currUser['Role']?></div></h3>
    <div class="dashboard_sidebar_user", id="dashboard_sidebar_user">
        <img src="/img/user.png" alt="User" id="dashboard_sidebar_user_img" />
        <span class="userName" id="dashboard_sidebar_user_name"><?= $currUser['Last_Name'].', '.$currUser['First_Name'].'<br><div id="name">NAME</div>' ?></span>
    </div>
    <div class="dashboard_sidebar_menus">
        <ul class="dashboard_menu_lists">
            <li><a href="/dashboard.php" class="menuActive"><i><img src="/img/dashboard.png" alt="Dashboard" class="menuIcons"></i><span class="menuText">Dashboard</span></a></li>
            <li><a href="../transactions\transactions.php"><i><img src="/img/transactions.png" alt="" class="menuIcons"></i><span class="menuText">Transactions</span></a></li>
            <li><a href="../patients\patients.php"><i><img src="/img/patients.png" alt="" class="menuIcons"></i><span class="menuText">Patients</span></a></li>
            <li><a href="../healthcare-workers\healthworkers.php"><i><img src="/img/healthworkers.png" alt="" class="menuIcons"></i><span class="menuText">Healthcare Workers</span></a></li>
            <li><a href="../vaccines\vaccines.php"><i><img src="/img/vax.png" alt="" class="menuIcons"></i><span class="menuText">Vaccines</span></a></li>
        </ul>
        <button href="logout.php" id="logoutBtn">Log Out</button>
    </div>
</div>
<div class="toggleBtnContainer" id="toggleBtnContainer">
    <a href="javascript:void(0);" id="toggleBtn" class="dashboard_sidebar_top"><img src="/img/menu_white.png" alt=""></a>
</div>
