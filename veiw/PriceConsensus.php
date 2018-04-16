<?php
$id = 0;
foreach ($arrPrognoz as $item_table) {
    $id_ak = $item_table[13];
    ?><tr>
    <td><?=$item_table[12]?> <div id="show_prognoz" data="<?=$item_table[13]?>" >Прогнозы <span class="oi oi-caret-bottom"></span></div></td>
    <td class="text-center">
        <?=$ArrData->formatDate($item_table[0])?>
    </td>
    <td class="text-center">
        <?=$ArrData->noValue($item_table[22])?>
        <div style="width: 20px; position: relative; float: right;">
            <?=$ArrData->exch_tpChg($item_table[14])?>
        </div>
    </td>
    <td class="text-center">
        <?php // Потенциал
        if ($item_table[36] >0 ) {
            echo "<span class='text-success'>".$item_table[36]."</span>";
        } else {
            echo "<span class='text-danger'>".$item_table[36]."</span>";
        }
        ?>
    </td>
    <td class="text-center"><?php // Цена закрытия ?>
        <?=$ArrData->noValue($item_table[15])?>
        <span style='font-size: 10px;'><?=$item_table[7]?></span>
    </td>
    <td class="text-center"><?php
        // консенсус прогноз ?>
        <?=$ArrData->noValue($item_table[8])?>
        <span class="exchange_name"><?=$item_table[7]?></span>
    </>
    </tr>
    <tr class="child_h <?=$item_table[13]?> <?=$ArrData->colorHeadTable($item_table[36])?>">
        <td>
            Прогнозы инвестдомов
        </td>
        <td></td>
        <td>Рекомендация</td>
        <td>Потенциал (%)</td>
        <td>Цена закрытия</td>
        <td>Прогноз</td>
    </tr>
    <?php
    // прогнозы инвест домов
    $arPrognII = $ArrData -> getIDaction($arrTarget, $item_table[13], 12);
    foreach ($arPrognII as $item_tables) {
        ?>
        <tr class="child <?=$item_table[13]?> <?=$ArrData->colorStrTable($item_table[36])?>">
            <td class="name_ii"><?=$item_tables[26]?></td>
            <td class="text-center"><?php
                echo strstr($item_tables[0], 'T', true);
                ?>
            </td>
            <td class="text-center">
                <?=$ArrData->noValue($item_tables[34])?>
            </td>
            <td class="text-center"><?php
                if (!isset($item_tables[43])) { echo "-";}
                if ($item_tables[43] >0 ) {
                    echo "<span class='text-success'>".$item_tables[43]."</span>";
                } else {
                    echo "<span class='text-danger'>".$item_tables[43]."</span>";
                }
                ?>
            </td>
            <td class="text-center"><?=$ArrData->noValue($item_tables[22])?>
                <span class="exchange_name"><?=$item_tables[5]?></span>
            </td>
            <td class="text-center"><?=$ArrData->noValue($item_tables[39])?>
                <span class="exchange_name"><?=$item_tables[5]?></span>
            </td>
        </tr>
        <?php
    }
}
?>