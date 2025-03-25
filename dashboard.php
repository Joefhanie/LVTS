<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="/style.css">

    <!-- Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <?php
        session_start();

        if(!isset($_SESSION['user'])) {
            header("Location: /login.php");
        }

        $currUser = $_SESSION['user'];

        include './db_connection.php';
        $patientQuery = "SELECT COUNT(*) FROM `patients`";
        $vaxQuery = "SELECT COUNT(*) FROM `vaccines`";
        $hwQuery = "SELECT COUNT(*) FROM `healthworkers`";
        $transQuery = "SELECT COUNT(*) FROM `transactions`";
            
        $stmt = $conn->prepare($patientQuery);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $p = $stmt->fetchAll();
        $patients = $p[0]['COUNT(*)'];

        $stmt = $conn->prepare($vaxQuery);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $v = $stmt->fetchAll();
        $vaccines = $v[0]['COUNT(*)'];
        
        $stmt = $conn->prepare($hwQuery);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $w = $stmt->fetchAll();
        $workers = $w[0]['COUNT(*)'];
        
        $stmt = $conn->prepare($transQuery);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $t = $stmt->fetchAll();
        $transactions = $t[0]['COUNT(*)'];
    ?>

    <div id="dashboardMainContainer">
        <?php include 'partials\sidebar.php'; ?>
        <div class="dashboard_content_container", id="dashboard_content_container">
            <div class="dashboard_content">
                <div class="dashboard_content_main">
                    <div class="totals-container">
                        <div class="total">
                            <h4>TOTAL PATIENTS</h4>
                            <h1 class="patients-total total-content"><img src="img\patients.png" alt="Total Patients"> <?= $patients?></h1>
                        </div>
                        <div class="total">
                            <h4>TOTAL TRANSACTIONS</h4>
                            <h1 class="transactions-total total-content"><img src="img\transactions.png" alt="Total Transactions"> <?= $transactions?></h1>
                        </div>
                        <div class="total">
                            <h4>TOTAL HEALTHCARE WORKERS</h4>
                            <h1 class="hw-total total-content"><img src="img\healthworkers.png" alt="Total Healthcare Workers"><?= $workers?></h1>
                        </div>
                        <div class="total">
                            <h4>TOTAL VACCINES</h4>
                            <h1 class="vaccines-total total-content"><img src="img\vax.png" alt="Total Vaccines"><?= $vaccines?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/script.js"></script>
</body>
</html>
