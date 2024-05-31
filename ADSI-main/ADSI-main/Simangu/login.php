<?php
// Start PHP session
session_start();

// Initialize error message
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dummy login credentials
    $valid_email = "admin@gmail.com";
    $valid_password = "password123";

    $valid_email2 = "pengguna@gmail.com";
    $valid_password2 = "password123";

    // Get form input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate credentials
    if ($email == $valid_email2 && $password == $valid_password2) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;

        // Redirect to welcome.php
        header("Location: welcome.php");
        exit();
    } elseif ($email == $valid_email && $password == $valid_password) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;

        // Redirect to login2.html
        header("Location: welcome2.php");
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #444aff;
            margin: 0;
        }

        .container {
            display: flex;
            width: 100%;
            height: 100vh; /* Full height */
            background: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .cover {
            flex: 1;
            background: #444aff;
            position: relative;
            overflow: hidden;
        }

        .cover img {
            width: 170%;
            height: 100%;
            object-fit: cover;
        }

        .cover .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #ffffff;
            z-index: 10;
        }
        .cover .text img {
            margin-bottom: 20px;
            width: 30%;
            height: auto;
            object-fit: cover;
        }

        .cover .text-1 {
            font-size: 36px;
            font-weight: 700;
        }

        .forms {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #396ebd;
        }

        .form-content {
            width: 100%;
            max-width: 800px;
        }

        .title {
            font-size: 40px;
            font-weight: 500;
            color: #ffffff;
            margin-bottom: 20px;
            position: relative;
        }

        .title:before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            height: 3px;
            width: 25px;
            background: #444aff;
        }

        .input-boxes {
            margin-top: 30px;
        }

        .input-box {
            position: relative;
            width: 100%;
            margin: 10px 0;
        }

        .input-box i {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #444aff;
            font-size: 17px;
        }

        .input-box input {
            width: 100%;
            padding: 10px 40px;
            font-size: 16px;
            border: none;
            border-bottom: 2px solid rgba(0, 0, 0, 0.2);
            outline: none;
            transition: all 0.3s ease;
        }

        .input-box input:focus,
        .input-box input:valid {
            border-color: #444aff;
        }

        .remember-me {
            display: flex;
            align-items: center;
            color: #fff;
            margin: 20px 0;
        }

        .remember-me input {
            margin-right: 10px;
        }

        .text {
            font-size: 14px;
            color: #fff;
            margin-top: 10px;
        }

        .text a {
            color: #fff;
            text-decoration: none;
        }

        .text a:hover {
            text-decoration: underline;
        }

        .button input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #82a5db;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .button input:hover {
            background: #3333ff;
        }

        .forgot-password {
            text-align: right;
            margin-top: 10px;
        }

        .forgot-password a {
            color: #fff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .container {
                flex-direction: column;
            }
            
            .cover, .forms {
                width: 100%;
                height: 50%;
            }

            .cover .text {
                font-size: 24px;
            }
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <div class="cover">
            <img src="bg gudang.jpg" alt="Background Image">
            <div class="text">
                <img src="logo.png" alt="SIMANGU Logo">
                <div class="text-1">SIMANGU</div>
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Log in</div>
                    <form action="" method="POST">
                        <div class="input-boxes">
                            <?php if ($error): ?>
                                <div class="error" style="color: red; margin-bottom: 10px;"><?php echo $error; ?></div>
                            <?php endif; ?>
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="remember-me">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember me</label>
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Login">
                            </div>
                            <div class="forgot-password">
                                <a href="#">Forgot password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
