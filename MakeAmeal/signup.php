<?php
require("inc/function.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["signup"])) {
        registerUser();
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">

    <title>Register Now | EatAmeal</title>

</head>
<header></header>
<body>

<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="#" method="post">
            <h1>Create an Account</h1>
            <span>or use your email for registration</span>
            <input type="text" name="name" placeholder="Name" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="text" name="address" placeholder="Address" required />
            <button type="submit" name="signup">Register</button>
        </form>
    </div>
    <!-- ... rest of the code ... -->
</div>

<!-- ... rest of the code ... -->

</body>
</html>
<script src="js/main.js"></script>
