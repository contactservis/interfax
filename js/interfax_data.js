$( document ).ready(function() {
    // изменение кнопок сортировки
    $('.interfax_prognoz div.botton_sort').on('click', function () {
        var icon       = $(this).children('span');
        if ($(icon).hasClass('oi-caret-bottom')) {
            $(icon).removeClass();
            $(icon).addClass('oi');
            $(icon).addClass('oi-caret-top');
        } else {
            $(icon).removeClass();
            $(icon).addClass('oi');
            $(icon).addClass('oi-caret-bottom');
        }
    });

    //загрузка контента таблицы
    $('.interfax_prognoz div.botton_sort').on('click', function () {
        $.ajax({
            url: "some.php",
            success: function(data){
                // вывод полученных данных
                $('#tabl_prognoz').html(data);
            }
        });
    });

});