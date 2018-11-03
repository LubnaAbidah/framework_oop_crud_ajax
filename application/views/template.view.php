<!DOCTYPE_html>
<html>
	<head>
		<title>Contoh CRUD dengan Ajax</title>
		<link rel="stylesheet" type="text/css" href="<?= BASE_PATH ?>/public/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?= BASE_PATH ?>/public/dataTables/dataTables.bootstrap.css">

		<script type="text/javascript" src="<?= BASE_PATH ?>/public/jquery/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
			<?php
			$view = new View($viewName);
			$view->bind('data', $data);
			$view->render();
			?>
	</body>
	<script type="text/javascript" src="<?= BASE_PATH ?>/public/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?= BASE_PATH ?>/public/dataTables/jquery.dataTables.js"></script>
	<script type="text/javascript" src="<?= BASE_PATH ?>/public/dataTables/dataTables.bootstrap.js"></script>
</html>
