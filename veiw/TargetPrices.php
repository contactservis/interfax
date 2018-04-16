<?php foreach ($arrInvestDoms as $item_table) { ?>
        <tr>
            <td><img src="img/<?=$item_table[0]?>.png"><?=$item_table[1]?></td>
            <td><div id="show_prognoz" data="<?=$item_table[0]?>" >Прогнозы <span class="oi oi-caret-bottom"></span></div></td>
            <td colspan="4"></td>
        </tr>
    <?php
    // прогнозы инвест домов
    $arPrognII = $ArrData -> getIDaction($arrTarget, $item_table[0], 17);
    //print_r($arPrognII);
        foreach ($arPrognII as $item_tables) {
            ?>
            <tr class="child <?=$item_table[0]?>">
                <td class="name_ii"><?=$item_tables[14 ]?></td>
                <td class="text-center"><?php
                    echo strstr($item_tables[0], 'T', true);
                    ?>
                </td>
                <td class="text-center">
                    <?=$ArrData->noValue($item_tables[34])?>
                    <div style="width: 20px; position: relative; float: right;">
                        <?=$ArrData->exch_tpChg($item_tables[18])?>
                    </div>
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
        } ?>

<?php } ?>