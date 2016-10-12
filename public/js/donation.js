/**
 * Created by StamAlex1 on 2/10/16.
 */
$(document).ready(function(){
    $(".donate-btn").click(function(){
        var $div = $(this).parent().parent().parent();
        var $sliding_div = $div.next('div');
        $sliding_div.slideToggle("default","swing");
    });

    $(document).on('submit','.donation-form',function(e){
        var $donation_details_div = $(this).parent().parent();
        var $donation_success_div = $donation_details_div.next('div');
        var token = $('input[name=_token]').val();
        var data = $(this).serialize();
        $.ajax({
            url: 'donate',
            type: 'POST',
            data: data,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', token);
            },
            success: function (phone) {
                console.log(phone);
                $('.phone').html(phone);
                $donation_details_div.fadeOut(200).hide(function () {
                    $donation_success_div.fadeIn(200).show()});
            },
            error: function (message) {
                console.log(message)
            }
        });
        return false;
    });
});