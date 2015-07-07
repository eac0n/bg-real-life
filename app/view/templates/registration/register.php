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
			    <?php if($success) : ?>
				<h1>Registrierung erfolgreich</h1>
				<a href="./login">zum Login</a>
			    <?php else : ?>
				<h1>Email Adresse oder Username bereits vergeben</h1>
				<a href="http://127.0.0.1/bg-real-life/registration?username=<?=$username?>&amp;email=<?=$email?>&amp;checkrules=<?=$checkrules?>">zurück</a>
			    <?php endif; ?>
			</section>
		</div>
	</body>
</html>
