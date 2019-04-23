$(function() {
    let coupon;
    $('#exchangeModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var couponId = button.data('code');
        
        var modal = $(this);
        $.ajax({
            url: `http://localhost:8000/api/coupon/${couponId}`,
            type: 'GET',
            success: function(data) {
                coupon = data.coupon;
                modal.find('#couponCode').text(`-${coupon.code}`);
            }
        });
    
    });

    $('#exchangeButton').click(function(event){
        let code = $('#code').val();
        $.ajax({
           url: `http://localhost:8000/api/coupon/${coupon.id}`,
           type: 'POST',
           data: {
               code: `${code}-${coupon.code}`,
               couponId: coupon.id,
               user_id: code
           },
           success: function(data){
               console.log(data);
           },
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        });
    });
});