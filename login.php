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

            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = 'SELECT * FROM healthworkers WHERE healthworkers.Email= "'. $email .'" AND healthworkers.Password="'. $password.'"';
            $stmt = $conn->prepare($query);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $user = $stmt->fetchAll()[0];
                $_SESSION['user'] = $user;
                
                header("Location: ./dashboard.php");
            } else {
                $error_message = 'Incorrect Credentials!';
            }
        }
    ?>

    <div class="loginMainContainer">
        <?php include ".\partials\loginLeftContainer.php"; ?>
        <div class="loginBodyContainer">
            <h1>LOG IN</h1>
            <img src="/img/logo.png" alt="Logo">
            <div class="loginBody">
                <form action="/login.php" method="POST">
                    <div class="errorHeader">
                        <?php if(!empty($error_message)) { ?>
                            <div id="errorMessage">
                                <p>Error: <?= $error_message ?> </p>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="email">
                        <label for="email">E-Mail:</label>
                        <input placeholder="E-mail" name="email" type="email" />
                    </div>
                    <div id="password">
                        <label for="password">Password:</label>
                        <input placeholder="Password" name="password" type="password" />
                    </div>
                    <a href="./hwForgotPass.php" id="forgotPassword">Forgot Password</a><br>
                    <div class="buttons">
                        <button type="submit" id="loginBtn">LOG IN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
