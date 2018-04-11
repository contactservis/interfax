<?php
include_once $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/interfax/model/get_json.php';
// 
$prognoz = 'konsensus';

if (isset($_GET['prognoz'])) {
		$prognoz = $_GET['prognoz'];
}

$array_json_data = new Get_Forecast;

switch ($prognoz) {
	case 'invest':
		$array_data['Rows'] = $array_json_data->get_TargetPrices();		
		break;
	
	default:
		$array_data['Rows'] = $array_json_data->get_PriceConsensus();
		break;
}

$array_data['InvestDoms'] = $array_json_data->get_MarketMakers();


?>