<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="logIn-signUp-style.css">

    <!-- Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php
        session_start();

        if(isset($_SESSION['user'])) {
            header("Location: ./dashboard.php");
        }

        if ($_POST) {
            include "./db_connection.php";

            $_SESSION['table'] = 'administrators';
            $userName = $_POST['username'];
            $Pass = $_POST['password'];
            $users = include "./fetch_data.php";
            
            foreach($users as $user) {
                if($user['Username'] == $userName) {
                    $query = "UPDATE `administrators` SET `Password` = '$Pass' WHERE `Username` = '$userName'";
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
        
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $error_message = 'Password updated successfully.';
                    
                    header("Location: ./adminLogin.php");
                } else {
                    $error_message = 'Username does not match any records.';
                    $_POST = '';
                }
            }
        }
    ?>

    <div class="loginMainContainer">
        <?php include ".\partials\loginLeftContainer.php"; ?>
        <div class="loginBodyContainer">
            <h1>FORGOT</h1>
            <img src="/img/logo.png" alt="Logo">
            <div class="loginBody">
                <form action="/adminForgotPass.php" method="POST">
                    <div class="errorHeader">
                        <?php if(!empty($error_message)) { ?>
                            <div id="errorMessage">
                                <p>Error: <?= $error_message ?> </p>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="username">
                        <label for="username">Username:</label>
                        <input placeholder="Username" name="username" type="text" />
                    </div>
                    <div id="password">
                        <label for="password">Password:</label>
                        <input placeholder="Password" name="password" type="password" />
                    </div>
                    <div class="buttons">
                        <a href="./adminLogin.php" id="signupBtn">LOG IN</a>
                        <button type="submit" id="loginBtn">CONFIRM</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>