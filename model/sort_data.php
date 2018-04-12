<?php
class  GetPrognoz
{
    public $sort  = '';
    public $field = 12;

    // чтение данных
    function getArrPrognoz($metods, $field, $sort)
    {
        // чтение файла json
        $jsonData = file_get_contents(__DIR__.DIRECTORY_SEPARATOR."".$metods.".json"); // в примере все файлы в корне
        $data       = json_decode($jsonData);
        $array      = (array)$data;
        $srtArray   = $this->customMultiSort($array['Rows'], $field, $sort);
        return $srtArray;
    }

    // сортировка массива
    function customMultiSort($array, $field, $sort)
    {
        $sortArr = array();
        foreach ($array as $key => $val) {
            $sortArr[$key] = $val[$field];
        }
        array_multisort($sortArr, $sort, $array);
        return $array;
    }

    // метод сортировки
    function sorts($sort_ab){
        if ($sort_ab == 'ASC'){
           return $sort = SORT_ASC ;
            //return SORT_ASC ;
        }else {
            return $sort = SORT_DESC ;
            //return SORT_DESC ;
        }
    }

}


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
echo "Сортировка ".$absort."</br>";
// метод получаемых данных и массив
$arrPrognoz = $ArrData -> getArrPrognoz('PriceConsensus', $sort_fild, $absort);

foreach ($arrPrognoz as $item_table){
    ?><tr>
        <td><?=$item_table[12]?></td>
        <td class="text-center"><?php
            echo strstr($item_table[0], 'T', true);
            ?></td>
        <td class="text-center"><?php
            if (!isset($item_table[36])) { echo "-";
            }else {
               echo  $item_table[22];
            }

            ?>
        </td>
        <td class="text-center"><?php
            if (!isset($item_table[36])) { echo "-";}
            if ($item_table[36] >0 ) {
                echo "<span class='text-success'>".$item_table[36]."</span>";
            } else {
                echo "<span class='text-danger'>".$item_table[36]."</span>";
            }
            ?>
        </td>
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
