/**
 * Created by StamAlex1 on 2/10/16.
 */
$(document).ready(function(){
    $("#donate-btn").click(function(){
        $("#donation").slideToggle("default","swing");
    });

    $(document).on('submit','#donation-form',function(e){
        var token = $('input[name=_token]').val()
        var data = $('#donation-form').serialize();
        $.ajax({
            url: 'donate',
            type: 'POST',
            data: data,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', token);
            },
            success: function (amt) {
                console.log(amt);
                $("#donation-details").fadeOut(200).hide(function () {
                    $('#donation-success').fadeIn(200).show()});
            },
            error: function (message) {
                console.log(message)
            }
        });
        return false;
    });
});