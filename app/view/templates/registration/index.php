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
		<title>Registrierung</title>
	</head>
	<body>
		<div class="content">
			<section class="login">
				<h1>Registrieren</h1>
				<form action="./registration/register" method="post">
					<input name="email" type="email" value="<?=$email?>" placeholder="Email">
					<input name="password" type="password" placeholder="Passwort">
					<input name="username" type="text" value="<?=$username?>" placeholder="Benutzername">
					<label><input name="checkrules" type="checkbox" checked="<?=$checkrules?>"> Ich akzeptiere die <a href="#">Allgemeine Geschäftbedingungen (AGB)</a></label>
					<input name="register" type="submit" value="Registrieren">
				</form>
                                <a href="<?= Controller::get_url('login') ?>">Zurück zum Login</a>
			</section>
		</div>
	</body>
</html>
