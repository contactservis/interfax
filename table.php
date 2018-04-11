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
	$j = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR); // в примере все файлы в корне
	$data = json_decode($j);
	$array = (array) $data;
	//print_r($array['Rows']);
?>
<div class="container">
	<div class="row">
	    <div class="col-12">
			<table class="table table-hover">
				<thead>
					<tr class="table-active">
						<td>ИД Акции</td>
						<td>Дата обновления</td>
						<td>ИД Аналитика</td>
						<td>Наименование компании маркетмейкера</td>
						<td>Название</td>
						<td>Потенциал в %</td>
						<td>Цена закрытия</td>
						<td>Прогноз цены</td>
					</tr>
				</thead>
				<tbody>
					<?php
						$id = 0;
						foreach ($array['Rows'] as $item_table) {
						$id_ak = $item_table[12]; 						 

						?><?php
							if($id == $id_ak){
							 				//echo "одна акция";
								?><tr><?php

							}else {
								$class =  'class="table-warning"';
								?><tr <?=$class?> > <?php
							}	
										 $id = $id_ak;								
							?>	
								
								<td><?=$item_table[12]?></td>
								<td><?=$item_table[0]?></td>
								<td><?=$item_table[16]?></td>
								<td><?=$item_table[26]?></td>
								<td><?=$item_table[14]?></td>
								<td><?=$item_table[43]?></td>
								<td><?=$item_table[20]?></td>
								<td><?=$item_table[20]?></td>						
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