$(function() {

    function loadEstates() {
        $.ajax({
            url:'http://localhost:8000/api/estates',
            type:'GET',
            success: function(data){
                let estates = data.estates;
                for (estate of estates) {
                    let newOption = new Option(estate.name, estate.id);
                    $('#estates').append(newOption);
                }                
            }
        });
    }

    $('#estates').on('change', function() {
        $.ajax({
            url:`http://localhost:8000/api/estates/${this.value}/cities`,
            type: 'GET',
            success: function(data) {
                $('#cities').prop('disabled', false);
                $('#cities').empty();
                let cities = data.cities;
                for (city of cities) {
                    let newOption = new Option(city.name, city.id)
                    $('#cities').append(newOption);
                }
            }
        })     
    })

    loadEstates();

});