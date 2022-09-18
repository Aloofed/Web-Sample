<html>
<head>
		<title>Angela's Beauty Shop | Registration</title>
		
</head>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
	color: white;
}

body {
    width: 100%;
    min-height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(./back2.jpg);
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
	color:white;
}

.container {
    min-width: 400px;
    min-height: 400px;
    background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5));
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,.3);
    padding: 40px 30px;
	margin: 0 auto;
}

.container .login-text {
    color: #111;
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
	color:white;
    margin:  0 auto;
}


.container .login-email .input-group {
    width: 100%;
    height: 50px;
    margin-bottom: 25px;
}

.container .login-email .input-group input {
    width: 100%;
    height: 100%;
    border: 2px solid #e7e7e7;
    padding: 15px 20px;
    font-size: 1rem;
    border-radius: 30px;
    background: transparent;
    outline: none;
    transition: 1s;
    text-align: center;
}



.container .login-email .input-group .btn { 
    display: block;
    width: 100%;
    padding: 15px 20px;
    text-align: center;
    border: none;
    background: #D7003D;
    outline: none;
    border-radius: 30px;
    font-size: 1.0rem;
    color: black;
    cursor: pointer;
    transition: .3s;
}





.login-register-text a {
    text-decoration: none;
    color: #D7003D;
}
.login-register-text{
    margin-left: 40px;
}
.balik{
    position: absolute;
}
.balik a{
    margin-left: 300px;
    cursor: pointer;
    color: white;
    text-decoration: none;
}
.input-sel{
    text-align: center;
    margin-bottom: 10px;
}
.input-sel select{
    font-size: 20px;
    padding: 5px 5px;
    border-radius: 5px;
    border-style: white 2px;
    cursor: pointer;
    background: transparent;
    color: white;
}

</style>

<body>
    
<div class="container">
        <div class="balik">
			<a href="index.html">Back</a>
		</div>
		<form action="Users.php" method="POST" class="login-email" enctype="multipart/form-data">
            <p class="login-text" style="font-size: 2rem; font-weight: 800; color:#D7003D;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Name" name="username" required> 
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="address" placeholder="Address" name="address" required >
            </div>
			<div class="input-group">
				<input type="contact" placeholder="Contact" name="contact" required >
            </div>
            <div class="input-sel">
				<select name="type" id="" required title="UserType">
                    <option value=""></option>
                    <option value="Customer">Customer</option>
                </select>
            </div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" required >
			</div>
			<div class="input-group">
				<button name="register" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>
		
</body>
</html>