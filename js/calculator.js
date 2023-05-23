$(function () {
    $(".calc_but").click(function () {
        if ($(this).text()=='') {
            $("#calc_input").select();
            document.execCommand("copy");
        }
        if ($("#calc_input").val() == 0) {
            if ('0123456789'.includes(String($(this).text()))) {
                $("#calc_input").val($(this).text());
            }
        }
        else {
            if ('0123456789'.includes(String($(this).text())) && $('#calc_input').val().length < 17) {
                $("#calc_input").val($("#calc_input").val() + $(this).text());
            }
            else if ($(this).text() == 'C') {
                $("#calc_input").val('0');
            }
            else if ($(this).text() == '←') {
                if ($('#calc_input').val().length > 1) {
                    $("#calc_input").val($("#calc_input").val().slice(0, -1));
                }
                else {
                    $("#calc_input").val('0');
                }
            }

            else if ('0123456789'.includes($("#calc_input").val().slice(-1)) && $('#calc_input').val().length < 17) {

                if ('+-.%'.includes(String($(this).text()))) {
                    $("#calc_input").val($("#calc_input").val() + $(this).text());
                }
                else if ($(this).text() == '×') {
                    $("#calc_input").val($("#calc_input").val() + '*');
                }
                else if ($(this).text() == '÷') {
                    $("#calc_input").val($("#calc_input").val() + '/');
                }
            }
        }
    })


})