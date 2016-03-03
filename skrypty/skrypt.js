$(document).ready(function () {
    function oblicz() {
        $('input.ch').each(function () {
            $('input:checked').parent().siblings('.k').addClass('kp');
            $('input:not(:checked)').parent().siblings('.k').removeClass('kp');
            $('input:checked').closest('tr').addClass('zaznaczony');
            $('input:not(:checked)').closest('tr').removeClass('zaznaczony');
        });

        var suma = 0;

        $('.kp').each(function () {
            suma += Number($(this).text());
        });

        $('#suma').text('Suma kosztów wykonania strony: ' + suma + ' zł');
    }
    
    oblicz();
    
    var count = 0;
    $('.zebra').click(function () {
        count++;
        if (count % 2 !== 0) {
            $(".zebra").css("box-shadow", "0 0 20px 20px orange");
        } else {
            $(".zebra").css("box-shadow", "2px 2px 5px grey");
        }
    });

    $('#zamow').click(function () {
        oblicz();
    });
	
	var body = document.body, html = document.documentElement;

    var height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
    $('.lewa').height(height);
    
    $('#zatwierdzZamowienie').click(function(event) {
        if($('#akceptacjaRegulaminu').prop('checked') === false) {
            event.preventDefault();
            $('#regulaminInfo').html('Musisz zaakceptować regulamin');
            $('#regulaminInfo').slideDown(500);
        } else {
            $('#regulaminInfo').slideUp(500);
        }
    });
});
