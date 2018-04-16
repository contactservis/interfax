<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 13.04.2018
 * Time: 16:09
 */

class GetPrognoz
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

    function arReassembly($array){
        $reArray = $array();
        foreach ($array as $item){
            $reArray[$item[12]] = $item;
        }
        return $reArray;
    }

    // получение прогнозов инвест домов по ид акции из консенсус прогноза
    function getIDaction($array, $fild, $fild_sort){

        $reArray = array();

        foreach ($array as $item){
            if ($item[$fild_sort] == $fild)
                $reArray[] = $item;
        }

        return $reArray;
    }

    // значок рекомендации
    function exch_tpChg($data){
        switch ($data){
            case 1:
                echo "<span class='ticket ticket_bottom'><span class='oi oi-caret-bottom'></span></span>";
                break;
            case 3:
                echo "<span class='ticket ticket_stop'><span class='oi oi-media-record'></span></span>";
                break;
            case 5:
                echo "<span class='ticket ticket_top'><span class='oi oi-caret-top'></span></span>";
                break;
        }
    }

    // цвет заголовка раскрывающийся таблицы
    function colorHeadTable($data){
        if ($data >0){
            echo 'green_ht';
        }else{
            echo 'red_ht';

        }
    }

    // цвет строк раскрывающийся таблицы
    function colorStrTable($data){
        if ($data >0){
            echo 'green_st';
        }else{
            echo 'red_st';
        }
    }

    function formatDate($data){
        echo strstr($data, 'T', true);
    }

    // замена знаком пустого значения
    function noValue($data){
        if (!isset($data)) {
            echo "-";
        }else {
            echo  $data;
        }
    }
}