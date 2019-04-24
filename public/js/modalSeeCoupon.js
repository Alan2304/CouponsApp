$(function(){
    let coupon;
    let code;
    $('#seeCouponModal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var couponId = button.data('code');    
        
        var modal = $(this);
        $.ajax({
            url: `http://localhost:8000/api/coupon/${couponId}`,
            type: 'GET'
        }).done(function(data){
            coupon = data.coupon;
            code = `${$('#userId').val()}-${coupon.code}`;
            modal.find('#code').text(code);
        });
    });
});