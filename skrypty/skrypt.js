var count = 0;
$('.zebra').click(function() {
    count++;
    if(count % 2 != 0) {
        $(".zebra").css("box-shadow", "0 0 20px 20px orange");
    } else {
        $(".zebra").css("box-shadow", "2px 2px 5px grey");
    }
});

$('#zamow').click(function() {
    $('input.ch').each(function() {
        $('input:checked').parent().siblings('.k').addClass('kp');
        $('input:not(:checked)').parent().siblings('.k').removeClass('kp');
        $('input:checked').closest('tr').addClass('zaznaczony');
        $('input:not(:checked)').closest('tr').removeClass('zaznaczony');
    });

    var suma = 0;
    
    $('.kp').each(function() {
        suma += Number($(this).text());
    });
    
    $('#suma').text('Suma kosztów wykonania strony: ' + suma + ' zł');
});