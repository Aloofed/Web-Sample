<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Angela's Beauty Shop | Log In</title>
        <link rel="stylesheet" href="loginz.css"> 
    </head>
    <body>
    <div class="container">
	    <div class="balik">
			<a href="index.html">Back</a>  
		</div>
		<form action="login_process.php" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800; color: #d7003d;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required >
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-sells">
				<select name="type" required title="UserType">
					<option value=""></option>
					<option value="Customer">Customer</option> 
					<option value="Seller">Seller</option> 
					<option value="Admin">Admin</option>
				</select>
			</div>
			<div class="input-group">
				<button name="login" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
    </div>
	
    </body>
    </html>