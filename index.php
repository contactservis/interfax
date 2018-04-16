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
$urlService = '/interfax';
?>
<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
include_once ('model/GetPrognoz.php');

// тип прогноза
// consensus  - Консенсус прогнозы,  invest - прогнозы от инвест домов
if (!empty($_GET['prognoz'])) {
    $tipPrognoza = $_GET['prognoz'];
} else {
    $tipPrognoza = 'consensus';
}

$ArrData        = new GetPrognoz();
// массив консенсус прогнозов
$arrPrognoz     = $ArrData -> getArrPrognoz('PriceConsensus', 13, SORT_ASC );
// массив прогнозов инвест домов
$arrTarget      = $ArrData -> getArrPrognoz('TargetPrices', 0, SORT_DESC );
// массив инвест-домо
$arrInvestDoms  = $ArrData -> getArrPrognoz('MarketMakers', 0, SORT_DESC );
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="<?=$urlService."/?prognoz=consensus"?>">Консенсус-прогнозы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=$urlService."/?prognoz=invest"?>">Прогнозы инвест-домов</a>
                </li>
            </ul>
            <?php
            switch ($tipPrognoza){
                case 'consensus':
                    include_once ('veiw/page_PriceConsensus.php');
                    break;
                case 'invest':
                    include_once ('veiw/page_TargetPrices.php');
                    break;
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>