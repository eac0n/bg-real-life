<!DOCTYPE html>
<html>
	<head>
		<?php $min_css = ''; ?>
		<?php if (DEBUG) : ?>
			<?php $min_css = '.min'; ?>
		<?php endif; ?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script language="javascript" type="text/javascript" src="./js/angular<?= $min_css ?>.js"></script>
		<link rel="stylesheet" type="text/css" href="./css/bootstrap<?= $min_css ?>.css" />
		<link rel="stylesheet" type="text/css" href="./css/style.css" />
		<title>Login</title>
	</head>
	<body>
		<div class="content">
			<section class="login">
				<h1>Login</h1>
				<form action="./login" method="post">
					<input name="email" type="email" placeholder="Email">
					<input name="password" type="password" placeholder="Passwort">
					<input name="login" type="submit" value="Login">
				</form>
			</section>
		</div>
	</body>
</html>
