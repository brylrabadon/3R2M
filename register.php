<?php
session_start();
include 'config.php';
include 'header.php';

$message = "";

if (isset($_POST['register'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmail = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($checkEmail) > 0) {
        $message = "<p style='color:red; text-align:center;'>Email already registered!</p>";
    } else {
        $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            $message = "<p style='color:green; text-align:center;'>Registered successfully! <a href='login.php'>Login here</a></p>";
        } else {
            $message = "<p style='color:red; text-align:center;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>

<link rel="stylesheet" href="style.css">

<div class="login-wrapper">
    <div class="login-container">
        <div class="login-image">
            <img src="login.jpg" alt="Register Visual">
        </div>

        <div class="login-form-section">
            <form method="POST">
                <h2>Register</h2>
                
                <?php if($message != "") echo "<div style='margin-bottom: 15px;'>$message</div>"; ?>
                
                <div class="input-group">
                    <label>Full Name</label>
                    <input type="text" name="fullname" placeholder="Enter your full name" required>
                </div>

                <div class="input-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Create a password" required>
                </div>
                
                <button type="submit" name="register" class="login-btn">Sign Up</button>

                <div class="register-link" style="text-align: center; margin-top: 20px;">
                    <p style="color: #636e72;">Already have an account? <a href="login.php" style="color: #54b4f3; text-decoration: none; font-weight: bold;">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>