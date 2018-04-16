<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/interfaxcss.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/interfax_data.js"></script>
    <link href="css/open-iconic-bootstrap.css" rel="stylesheet">
</head>
<body>
<?php
	// чтение файла json
	//$j = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'PriceConsensus.json' ); // в примере все файлы в корне
    $j = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR."/model/consensus.json"); // в примере все файлы в корне
	$data = json_decode($j);
	$array = (array) $data;
	//print_r($array['Columns']);
?>
<div class="container">
	<div class="row">
	    <div class="col-12">
			<table class="table table-hover interfax_prognoz">
				<thead>
					<tr class="table-active">
						<!--<td>ИД Акции</td>-->
                        <td>Название <div data="12" class="botton_sort"><span class="oi oi-caret-bottom"></span></div></td>
						<td class="text-center">Дата обновления <div data="0" class="botton_sort"><span class="oi oi-caret-bottom"></span></div></td>
						<td class="text-center">Рекомендация <div data="22" class="botton_sort"><span class="oi oi-caret-bottom"></span></div></td>
						<td class="text-center">Потенциал в % <div data="36" class="botton_sort"><span class="oi oi-caret-bottom"></span></div></td>
						<td class="text-center">Цена закрытия <div data="3" class="botton_sort"><span class="oi oi-caret-bottom"></span></div></td>
						<td class="text-center">Прогноз цены <div data="8" class="botton_sort"><span class="oi oi-caret-bottom"></span></div></td>
					</tr>
				</thead>
				<tbody id="tabl_prognoz">
					<?php
						$id = 0;
						foreach ($array['Rows'] as $item_table) {
						$id_ak = $item_table[13];

						?><tr>
                                <td><?=$item_table[12]?></td>
                                <td class="text-center"><?php
                                    echo strstr($item_table[0], 'T', true);
								?></td>
								<td class="text-center"><?=$item_table[22]?></td>
                                <td class="text-center"><?php
                                    if ($item_table[36] >0 ) {
                                        echo "<span class='text-success'>".$item_table[36]."</span>";
                                    } else {
                                        echo "<span class='text-danger'>".$item_table[36]."</span>";
                                    }
                                 ?></td>
								<td class="text-center"><?php
                                        echo number_format($item_table[3], 2, '.', '');
                                ?></td>
                                <td class="text-center"><?php
                                    echo number_format($item_table[8], 2, '.', '');
                                    ?></td>
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