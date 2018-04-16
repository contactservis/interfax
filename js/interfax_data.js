$( document ).ready(function() {
    // изменение кнопок сортировки
    $('.interfax_prognoz div.botton_sort').on('click', function () {
        var icon       = $(this).children('span');

        if ($(icon).hasClass('oi-sort-ascending')) {
            $(icon).removeClass();
            $(icon).addClass('oi');
            $(icon).addClass('oi-sort-descending');
        } else {
            $(icon).removeClass();
            $(icon).addClass('oi');
            $(icon).addClass('oi-sort-ascending');
        }

        var sort        = $(this).children('span').attr('class');
        var sort_fild   = $(this).attr('data');
        var sortab      = 'ASC';

        if (sort == 'oi oi-sort-descending') {
            sortab ='DESC';

        }else {
            sortab = 'ASC';
        }

        $.ajax({
            url: 'model/sort_data.php?sort_ad='+sortab+'&sort_fild='+sort_fild,
            success: function(data){
                // вывод полученных данных
                $('#tabl_prognoz').html(data);
            }
        });

    });

    $(document).on('click', '.interfax_prognoz #show_prognoz', function () {
        var child_atr = $(this).attr('data');

        var icon       = $(this).children('span');
        console.log("click"+child_atr);
        if ($(icon).hasClass('oi-caret-bottom')) {
            $(icon).removeClass();
            $(icon).addClass('oi');
            $(icon).addClass('oi-caret-top');
            $('.'+child_atr).css('display', 'table-row');
        } else {
            $(icon).removeClass();
            $(icon).addClass('oi');
            $(icon).addClass('oi-caret-bottom');
            $('.'+child_atr).css('display', 'none');
        }

        //console.log(child_atr);
        //$('.'+child_atr).css('display', 'table-row');
    });

});