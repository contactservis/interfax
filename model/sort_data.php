<?php
include_once ('GetPrognoz.php');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (empty($_GET['sort_fild'])){
    $sort_fild = 12;
} else {
    $sort_fild = $_GET['sort_fild'];
}

if (empty($_GET['sort_ad'])){
    $sortab = 'ASC';
}else {
    $sortab =$_GET['sort_ad'];
}

$ArrData    = new GetPrognoz();
// направление сортировки
$absort     = $ArrData -> sorts($sortab);
// массив консенсус прогнозов
$arrPrognoz = $ArrData -> getArrPrognoz('PriceConsensus', $sort_fild, $absort);
// массив прогнозов инвест домов
$arrTarget  = $ArrData -> getArrPrognoz('TargetPrices', $sort_fild, $absort);

$url_view = $_SERVER['DOCUMENT_ROOT'];

include_once ($url_view .'/interfax/veiw/PriceConsensus.php');

?>
