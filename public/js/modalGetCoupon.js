$(function() {
    $('#error').hide();
    let coupon;
    let code;
    $('#getCouponModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var couponId = button.data('code');
        $('.lds-ring').hide();
        var modal = $(this);
        $.ajax({
            url: `http://localhost:8000/api/coupon/${couponId}`,
            type: 'GET',
        }).done(function (data){
            coupon = data.coupon;
            code = `${$('#userId').val()}-${coupon.code}`;
            modal.find('#code').text(code);
        });
    });

    $('#getButton').click(function(event){
        $('.actions').hide();
        $('.lds-ring').show();
        $.ajax({
            url: `http://localhost:8000/api/setCoupon`,
            type: 'POST',
            data: {
                code: code,
                userId: $('#userId').val(),
                couponId: coupon.id
            }
        }).done(function(data){
            if (data.error) {
                $('#info').hide();
                $('#code').hide();
                $('#error').text(data.error)
                $('#error').show();
                $('.lds-ring').hide();
                $('.actions').show();
            }else{
                $('.lds-ring').hide();
                $('.actions').show();
                $('#code').text(data.body);
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log('error');
        });
    })
})