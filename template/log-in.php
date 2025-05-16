<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in | Mindblow</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link class="favicon" rel="shortcut icon" href="../img/main/logo.png" type="image/x-icon">
    <style>
        body {
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
            font-family: 'Roboto', sans-serif;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            background: #fff;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 400px;
        }
        .login-card .form-control {
            border-radius: 2rem;
        }
        .login-card .btn {
            border-radius: 2rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .login-logo {
            width: 60px;
            height: 60px;
            margin-bottom: 1rem;
        }
        .login-title {
            font-weight: bold;
            letter-spacing: 2px;
        }
        .login-card .form-group {
            margin-bottom: 1.2rem;
        }
        .login-card .text-muted {
            font-size: 0.95rem;
        }
        .login-card .signup-link {
            color: #198754;
            font-weight: 500;
        }
        .login-card .signup-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php
    include 'dbcon.php';
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = " select * from registration where email='$email' ";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

        if($email=='admin@admin.com' && $password=='admin') {
            ?>
            <script>
                location.replace("admin_home.php");
            </script>
            <?php
        } elseif($email_count) {
            $email_pass = mysqli_fetch_assoc($query);
            $db_pass = $email_pass['password'];
            $_SESSION['username'] = $email_pass['username'];
            $pass_decode = password_verify($password, $db_pass);
            if($pass_decode) {
                ?>
                <script>
                    location.replace("home.php");
                </script>
                <?php
            } else {
                echo "<script>alert('Password Incorrect');</script>";
            }
        } else {
            echo "<script>alert('Invalid Email');</script>";
        }
    }
    ?>
    <div class="login-container">
        <div class="login-card">
            <div class="text-center">
                <img src="../img/main/logo.png" alt="Logo" class="login-logo">
                <h2 class="login-title mb-3">Sign In</h2>
                <p class="text-muted mb-4">Welcome back! Please login to your account.</p>
            </div>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" autocomplete="off">
                <div class="form-group mb-3">
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="Email Address" required>
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" name="submit" class="btn btn-success btn-lg">Log In</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <span class="text-muted">New to site?</span>
                <a href="sign-up.php" class="signup-link">Sign Up</a>
            </div>
        </div>
    </div>
</body>
</html>