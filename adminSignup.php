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
        $_SESSION['table'] = 'administrators';
        $users = include "./fetch_data.php";
        
        if(isset($_SESSION['user'])) {
            header("Location: ./dashboard.php");
        }
        
        if ($_POST) {
            var_dump($_POST);
            $table_name = 'administrators';
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $userName = $_POST['username'];
            $pass = $_POST['password'];
            $exist = 0;
            var_dump($users[5]['Username'] == $userName);

            foreach($users as $user) {
                if($user['Username'] == $userName) {
                    $error_message = 'Username already exists.';
                    $exist = 1;
                    header("Location: ./adminSignup.php");
                }
                
                if($user['Email'] == $email) {
                    $error_message = 'Email already exists.';
                    $exist = 1;
                    header("Location: ./adminSignup.php");
                }
            }
            
            if($exist == 0) {
                    $insert = "INSERT INTO
                                    $table_name(Date_Created, First_Name, Last_Name, Age, Email, Username, Password)
                                VALUES 
                                    (NOW(),'".$firstName."', '".$lastName."', '".$age."', '".$email."', '".$userName."','".$pass."')";
                                    var_dump($insert);
                                    
                    include "./db_connection.php";
                    
                    $conn->exec($insert);
                    $error_message = 'Sign Up Successful!';
                    header("Location: /adminLogin.php");
            }
        }
    ?>

    <div class="loginMainContainer signupMainContainer">
        <?php include ".\partials\loginLeftContainer.php"; ?>
        <div class="loginBodyContainer signupBodyContainer">
            <h1>SIGN UP</h1>
            <img src="/img/logo.png" alt="Logo">
            <div class="loginBody signupBody">
                <form action="/adminSignup.php" method="POST">
                    <div class="errorHeader">
                        <?php if(!empty($error_message)) { ?>
                            <div id="errorMessage">
                                <p>Error: <?= $error_message ?> </p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="formFields" id="firstName">
                        <label for="firstName" class="formFieldsLabel">First Name:</label>
                        <input type="text" class="appFormInput" name="firstName" required>
                    </div>
                    <div class="formFields" id="lastName">
                        <label for="lastName" class="formFieldsLabel">Last Name:</label>
                        <input type="text" class="appFormInput" name="lastName" required>
                    </div>
                    <div class="formFields row1" id="age">
                        <label for="age" class="formFieldsLabel">Age:</label>
                        <input type="number" class="appFormInput" name="age" required>
                    </div>
                    <div class="formFields row1" id="adminEmail">
                        <label for="" class="formFieldsLabel">E-mail:</label>
                        <input type="email" class="appFormInput" name="email" required>
                    </div>
                    <div class="formFields" id="adminUsername">
                        <label for="username" class="formFieldsLabel">Username:</label>
                        <input type="text" class="appFormInput" name="username" required>
                    </div>
                    <div class="formFields" id="adminPassword">
                        <label for="password" class="formFieldsLabel">Password:</label>
                        <input type="password" class="appFormInput" name="password" required>
                    </div>
                    <div class="buttons adminButtons">
                        <a href="./adminLogin.php" id="adminLoginBtn">LOG IN</a>
                        <button type="submit" id="adminSignupBtn">SIGN UP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
