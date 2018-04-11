<?php
//phpinfo();
include $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/interfax/controller/ForecastService.php';
//print_r($array_data['InvestDoms']);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>	
	
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-12"><h1>Прогноз по акциям</h1></div>
	    <div class="col-9">
	    	<div id="ajax_data">
	    		<div class="btn-group" style="padding: 15px 0;">
		    		<div class="dropdown">
					  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    Инвестдома
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">
					    <?php 
					    	foreach ($array_data['InvestDoms'] as $item_investdoms) {
					    ?>
					    	<div class="dropdown-item">
					    		<input type="checkbox" class="form-check-input" id="<?=$item_investdoms[0]?>">
	    						<label class="form-check-label" for="exampleCheck1"><?=$item_investdoms[1]?></label>
					    	</div>				    
					    <?php } ?>
					  </div>
					</div>
				</div>
				<table class="table table-hover">
					<thead>
						<tr class="table-active">
							<td >Акция</td>
							<td class="text-center">Наименование инвестдома</td>
							<td class="text-center">Рекомендация</td>
							<td class="text-center">Цена закрытия предыдущего дня</td>
							<td class="text-center">Прогноз</td>
							<td class="text-center">Потенциал в %</td>
						</tr>
					</thead>
					<tbody>
						<?php						
							foreach ($array_data['Rows'] as $item_table) {
							?>
								<tr>								
									<td><?=$item_table[14]?></td>
									<td class="text-center"><?=$item_table[26]?></td>
									<td class="text-center"><?=$item_table[15]?></td>
									<td class="text-center"><?=$item_table[23]?></td>
									<td class="text-center"><?=$item_table[36]?></td>
									<td class="text-center"><?=$item_table[36]?></td>
								</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

</body>
</html>