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
<?php
	// чтение файла json
	$j = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'data.json' ); // в примере все файлы в корне
	$data = json_decode($j);
	$array = (array) $data;
	//print_r($array['Rows']);
?>
<div class="container">
	<div class="row">
	    <div class="col-9">
			<table class="table">
				<thead>
					<tr>
						<td>Название</td>
						<td>Потенциал в %</td>
						<td>Цена</td>
						<td></td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($array['Rows'] as $item_table) {
										

						?>
					<tr>
						<!-- <td><?=$item_table[12]?></td> -->
						<td><?=$item_table[14]?></td>
						<td><?=$item_table[43]?></td>
						<td><?=$item_table[20]?></td>
						<td> </td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</body>
</html>