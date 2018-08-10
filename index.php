<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
	<title>Ayup Development boilerplate</title>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<link rel="canonical" href="Boilerplate" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="format-detection" content="telephone=no">

	<!-- Typekit -->
	<link rel="stylesheet" href="https://use.typekit.net/bjq5bor.css">
	
	<!-- Site styles -->
	<link href="./assets/dist/app.css" media="screen, projection" rel="stylesheet" />
</head>

<body>
	<?php include('templates/_components/modal.html'); ?>
	<?php include('templates/_snippets/header.html'); ?>
	<?php include('templates/_components/hero.html'); ?>

	<main id="content" class="page" role="main">
		<section class="section">
			<div class="flex-container">
				<div class="flex-col flex-col--4">
					<?php include('templates/_components/service.html'); ?>
				</div>
			</div>
		</section>
	</main>

	<?php include('templates/_snippets/footer.html'); ?>

	<script src="./assets/dist/app.js"></script>

	<!-- ~~~~~~~~~~~~ BUILT BY ~~~~~~~~~~~~
		 AAAAAAA YYY  YYY UU    UU PPPPPPP
		AA     AA YY  YY  UU    UU PP   PP
		AAAAAAAAA  YYYY   UU    UU PPPPPPP
		AA     AA   YY    UU    UU PP
		AA     AA   YY     UUUUUU  PP
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
</body>
</html>