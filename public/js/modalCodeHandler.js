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
                couponId = null;
            }
        });
    
    });

    $('#exchangeButton').click(function(event){
        let code = $('#code').val();
        $('.actions').hide();
        $('.lds-ring').show();
        $.ajax({
           url: `http://localhost:8000/api/coupon/${coupon.id}`,
           type: 'POST',
           data: {
               code: `${code}-${coupon.code}`,
               couponId: coupon.id,
               user_id: code
           },
           success: function(data){
                if (data.error){
                    $('#exchangeForm').hide();
                    $('#error').text(data.error);
                    $('.lds-ring').hide();
                    $('.actions').show();
                    coupon = null;
                }else{
                    $('.lds-ring').hide();
                    $('.actions').show();
                    $('#success').text('The Coupon was succesfully Exchanged');
                    coupon = null;
                }
           },
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        });
    });

    $('#exchangeModal').on('hidden.bs.modal', function (e) {
        $('#error').text('');
        $('#exchangeForm').show();
        $('#success').text('');
        $('#code').val('')
      });

});