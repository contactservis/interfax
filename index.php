<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-12"><h1>Консенсус-прогнозы инвестдомов</h1></div>
	    <div class="col-9">
					<?php
						foreach ($array['Rows'] as $item_table) {
					?>
					<div class="card">
						<div class="card-block">
						    <h4 class="card-title"><?=$item_table[14]?></h4>
						    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
						    <p class="card-text"><?=$item_table[2]?></p>
						    <a href="#" class="card-link">Card link</a>
						    <a href="#" class="card-link">Another link</a>
						</div>
					</div>

					<?php
						}
					?>
		</div>
	</div>
</div>

</body>
</html>