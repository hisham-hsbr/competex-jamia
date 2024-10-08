<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Fetch countries dynamically on page load
        $.ajax({
            url: '/get-countries',
            type: 'GET',
            success: function(data) {
                $.each(data, function(key, value) {
                    $('#country').append('<option value="' + value.country + '">' + value
                        .country + '</option>');
                });
            }
        });

        $('#country').on('change', function() {
            let country = this.value;
            $('#state').html('<option value="">Select State</option>');
            $('#district').html('<option value="">Select District</option>');
            $('#city').html('<option value="">Select City</option>');
            $('#zip_code').val('');

            if (country) {
                $.ajax({
                    url: '/get-states/' + country,
                    type: 'GET',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#state').append('<option value="' + value.state +
                                '">' + value.state + '</option>');
                        });
                    }
                });
            }
        });

        $('#state').on('change', function() {
            let state = this.value;
            $('#district').html('<option value="">Select District</option>');
            $('#city').html('<option value="">Select City</option>');
            $('#zip_code').val('');

            if (state) {
                $.ajax({
                    url: '/get-districts/' + state,
                    type: 'GET',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#district').append('<option value="' + value
                                .district + '">' + value.district + '</option>');
                        });
                    }
                });
            }
        });

        $('#district').on('change', function() {
            let district = this.value;
            $('#city').html('<option value="">Select City</option>');
            $('#zip_code').val('');

            if (district) {
                $.ajax({
                    url: '/get-cities/' + district,
                    type: 'GET',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="' + value.city +
                                '">' + value.city + '</option>');
                        });
                    }
                });
            }
        });

        $('#city').on('change', function() {
            let selectedCity = $('#city').val();

            $.ajax({
                url: '/get-cities/' + $('#district').val(),
                type: 'GET',
                success: function(data) {
                    const cityData = data.find(city => city.city === selectedCity);
                    if (cityData) {
                        $('#zip_code').val(cityData.zip_code);
                    }
                }
            });
        });
    });
</script>
