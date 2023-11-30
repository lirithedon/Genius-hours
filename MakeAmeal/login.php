<?php 
  include "inc/function.php";

handlePost();
dd($_POST);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
  <title>Log In | Clothing Webshop</title>
  <link rel="stylesheet" type="text/css" href="css/stylelogin.css">
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="css/shop.css">

</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="<?php echo getCurrentURL(); ?>" method="post">
			<h1>Create Account</h1>
			<span>or use your email for registration</span>
			<input type="text" name="name" placeholder="Name" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<button type="submit" name="signin">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>Log in</h1>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<button type="submit" name="login">Log in</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome back!</h1>
				<p>To keep connected with us, please login with your personal info</p>
				<button class="ghost" id="signIn">Log in</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>No account?</h1>
				<p>Click below to register</p>
                <a href="signup.php">
				    <button class="ghost" id="signUp">Register</button>
                </a>
            </div>
	    </div>
    </div>
</div>
  <div id="cart-items"></div>
  <div class="cart-total" id="cart-total"></div>
  <div class="buy-now-btn">
    <a href="order.php" class="btn" onclick="storeOrderSummary()">Buy Now</a>
  </div>
  <div class="cart-toggle" onclick="toggleCart()">&times;</div>
  <button onclick="resetCart()">Reset Cart</button>
    </div>
</body>
</html>
<script src="main.js"></script>
