<?php
// issjungia visus erroru rodymus
/*ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);*/
include 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Prisijungimas prie pasto bazes</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="robots" content="noindex" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="header">
		<h2>Prisijungimas</h2>
		<h3>prie kompiuterinių žaidimų parduotuvės</h3>
	</div>
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Vartotojo vardas:</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Slaptažodis:</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Prisijungti</button>
		</div>
	</form>
</body>
</html>