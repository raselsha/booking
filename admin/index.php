<?php 
	session_start();
	if (isset($_SESSION['email'])) {
		header('Location:dashboard.php');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../assets/admin/css/style.css">
</head>
<body>
		<?php 
			require '../classes/Login.php';
			$login = new Login();
			$er_email = '';
			$er_password = '';
			$er_message = '';
			$er = 0;
			if (isset($_POST['submit'])) {
			
				if (empty($_POST['email'])) {
					$er_email = '<p style="color:red">Email is required!</p>';
					$er++;
				}
				if (empty($_POST['password'])) {
					$er_password = '<p style="color:red">Password is required!</p>';
					$er++;
				}
				if ($er==0) {
					$result=$login->auth($_POST);
					if ($result) {
						$er_email = '';
						$er_password = '';
						$er_message = '';
						unset($_POST['submit']);
						$_SESSION['name']=$result['name'];
						$_SESSION['email']=$result['email'];
						$_SESSION['type']=$result['type'];
						header('Location:dashboard.php');
					}
					else{
						$er_message = '<p style="color:red">Email and password not matched!</p>';
					}
				}
			} 
		?>
		<h1 align="center">

		 	<img src="../assets/admin/images/logo.png" alt='Logo'>

		 </h1>

		 <table width="30%" align="center" cellpadding="20">

		 	<tr>

		 		<td bgcolor="#eee">
		 			<form method="post">
		 				
		 				<fieldset>

		 					<legend>Login</legend>

		 					<?= $er_message; ?>
		 					<p><label>Email</label></p>

		 					<p><input type="text" name="email"></p>

		 					<?= $er_email; ?>

		 					<p><label>Password</label></p>

		 					<p><input type="password" name="password"></p>

		 					<?= $er_password; ?>

		 					<p>

		 						<input type="submit" name="submit" value="Login">

		 					</p>

		 				</fieldset>

		 			</form>

		 			<p><a href="../">Back to main site</a></p>

		 		</td>

		 	</tr>

		 </table>

</body>

</html>