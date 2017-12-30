var base_url = window.location.protocol + '//' + window.location.host;
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
        }
    });
    /* ---------------- 
     * AJAX REQURESTS FOR COUNTRY STATE AND CITY
     */
     
     /* ---------------- 
     * get all the states from the country
     */

    $("#country").change(function() {
        var data = {
            country_id: $('#country').val()
        }
        $.ajax({
            type: "POST",
            url: base_url + "/country/states",
            data: data,
            beforeSend: function() {
                    alert(data['country_id']);
                },
            success: function(states_obj) {
                var cities_elt = document.getElementById("city")
                var states_elt = document.getElementById("state")
                $('option', states_elt).remove();
                $('option', cities_elt).remove();
                $.each(states_obj, function(index, state) {
                    states_elt.add(new Option(state.name, state.id))
                })
                $('select').selectpicker('refresh');
            },
            failure: function(data) {
                alert("error occured")
                console.log("failed badly")
            }
        })
    });
    /* ------------------------------
     * Get all cities in this state
     */
    $("#state").change(function() {
        console.log('states clicked')
        var data = {
            state_id: $('#state').val()
        }
        $.ajax({
            type: "POST",
            url: base_url + "/state/cities",
            data: data,
            success: function(cities_obj) {
                var cities_elt = document.getElementById("city")
                $('option', cities_elt).remove();
                $.each(cities_obj, function(index, city) {
                    cities_elt.add(new Option(city.name, city.id))
                })
                $('select').selectpicker('refresh');
            },
            failure: function(data) {
                console.log("failed badly")
            }
        })
    });

    /* ------------------------------
     * Get all quarters in this city
     */
    