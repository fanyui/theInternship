/*date time picker*/
$('.datetimepicker').fdatepicker({
    format: 'yyyy-mm-dd',
    language: 'en',
    weekStart: 0,
    closeButton: true, 
    todayBtn: true, 
    autoclose: true,
});
$('.datetimepicker-from-today').fdatepicker({
    format: 'yyyy-mm-dd',
    language: 'en',
    weekStart: 0,
    closeButton: true, 
    todayBtn: true, 
    autoclose: true,
    startDate: new Date()
});


var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
var startDate = $('#startDate').fdatepicker({
    onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > endDate.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        endDate.update(newDate);
    }
    startDate.hide();
    $('#endDate')[0].focus();
}).data('datepicker');
var endDate = $('#endDate').fdatepicker({
    onRender: function(date) {
        return date.valueOf() <= startDate.date.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    endDate.hide();
}).data('datepicker');

//Start and Expiry Date of rental contract
// implementation of disabled form fields
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
var start_date = $('#rental_contract_step_2 #start_date').fdatepicker({
    onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > expiry_date.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        expiry_date.update(newDate);
    }
    start_date.hide();
    $('#rental_contract_step_2 #expiry_date')[0].focus();
}).data('datepicker');
var expiry_date = $('#rental_contract_step_2 #expiry_date').fdatepicker({
    onRender: function(date) {
        return date.valueOf() <= start_date.date.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    expiry_date.hide();
}).data('datepicker');

//Start and Expiry Date of rental contract


var base_url = window.location.protocol+'//'+window.location.host;

$.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name=csrf-token]').attr('content')
    }
});

/* ---------------- 
 * AJAX REQURESTS FOR COUNTRY STATE AND CITY
 */
$("#country").change(function() {
    var data = {
        country_id: $('#country').val()
    }
    $.ajax({
        type: "POST",
        url: base_url + "/bk/country/states",
        data: data,
        success: function(states_obj) {
            var cities_elt = document.getElementById("city")
            var states_elt = document.getElementById("state")
            var quarters_elt = document.getElementById("quarter")
            $('option', states_elt).remove();
            $('option', cities_elt).remove();
            $('option', quarters_elt).remove();
            $.each(states_obj, function(index, state) {
                states_elt.add(new Option(state.name, state.id))
            })
            $('select').selectpicker('refresh');
        },
        failure: function(data) {
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
        url: base_url + "/bk/state/cities",
        data: data,
        success: function(cities_obj) {
            var cities_elt = document.getElementById("city")
            var quarters_elt = document.getElementById("quarter")
            $('option', cities_elt).remove();
            $('option', quarters_elt).remove();
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
$("#city").change(function() {
    console.log('city clicked')
    var data = {
        city_id: $('#city').val()
    }
    $.ajax({
        type: "POST",
        url: base_url + "/bk/cities/quarter",
        data: data,
        success: function(quarters_obj) {
            var quarters_elt = document.getElementById("quarter")
            $('option', quarters_elt).remove();
            $.each(quarters_obj, function(index, quarter) {
                quarters_elt.add(new Option(quarter.name, quarter.id))
            })
            $('select').selectpicker('refresh');
        },
        failure: function(data) {
            console.log("failed badly")
        }
    })
});

/* ------------------------------- 
 * Get all houses that are in the estate
 */
$("#estate").change(function() {
    var data = {
        estate_id: $('#estate').val()
    }
    $.ajax({
            type: "POST",
            url: base_url + "/bk/estate/houses",
            data: data,
            success: function(houses_obj) {
                // console.log(houses_obj)
                var house_elt = document.getElementById("house")
                $('option', house_elt).remove();
                $.each(houses_obj, function(index, house) {
                    var rm = 'HS ' + house.house_number + ' - FL ' + house.floor_number;
                    house_elt.add(new Option(rm, house.id))
                })
                $('select').selectpicker('refresh');
            },
            failure: function(data) {
                console.log("failed badly")
            }
        })
});

/*
 * Get all houses when estate changes on filter div
 * Update house filter element with (key, value) (slug, house_concat)
 */
$("#estate_filter").change(function() {
    var data = {
        estate_id: $('#estate_filter').val()
    }
    $.ajax({
            type: "POST",
            url: base_url + "/bk/estate/houses",
            data: data,
            success: function(houses_obj) {
                console.log(houses_obj)
                var house_elt = document.getElementById("house_filter")
                $('option', house_elt).remove();
                $.each(houses_obj, function(index, house) {
                    var rm = 'RM ' + house.house_number + ' - FL ' + house.floor_number;
                    var slug = 'RM-' + house.house_number + '-FL-' + house.floor_number + 
                               '-'   + house.id;
                    house_elt.add(new Option(rm, slug))
                })
                $('select').selectpicker('refresh');
            },
            failure: function(data) {
                console.log("failed badly")
            }
        })
});

/* ------------------------------- 
 * Get statistics for that rental contract
 */
$("#new_rent_payment #contract_id").change(function() {
    var data = {
        contract_id: $('#contract_id').val()
    }
    console.log($('#contract_id').val());
    $.ajax({
            type: "POST",
            url: base_url + "/bk/rent/rent_payment/history",
            data: data,
            success: function(history) {
               console.log(history);
               if (history !== null) {
                $('#new_rent_payment #contract_details').hide().html(
                    " <center><strong>Total Sum:</strong> " + history.sumRent + 
                    " <strong>Total Paid:</strong> " + history.rentPaid + 
                    " <strong>Rent Due :</strong> " + history.rentDue + " " + history.status + 
                    " <strong>Duration : </strong> " + history.duration + " " + history.billing_cycle_text +
                    " of (" + history.billing_cycle_int + " " + history.billing_cycle_text + ")" +
                    "</center>"
                    ).show(200)
                if (history.status == 'EXCESS') {
                    $('#amount').val(0)
                }else{
                    $('#amount').val(history.rentDue)
                }
                $('#msg').remove();
               }
            },
            failure: function(data) {
            }
        })
});

function toDelete() {
    return window.confirm('Are you sure you want to delete');
}

function confirmAction() {
    return window.confirm('Are you sure you want to perform this action');
}

/*FUNCTION TO SET ACTIVE ITEMS ON THE SIDEBAR AND UP MENU*/
$(document).ready(function () {
    var p = document.location.pathname;
    var path = p.split("/");

    var ref2 = path[2], ref3 = path[3], path4 = path[4], path5 = path[5];

    /*format is like this  ["", "bk", "item1", "item2". . . .] */
    /*so index 0 and 1 are of no used to us*/
    // console.log(path);
    if (ref2 == 'estate') {
        if (ref3 === undefined) {
            $('#estate_index_side, #estate_index_top').addClass('active')
        }else{
            if (ref3 == 'new') {
                $('#new_estate_btn').addClass('active').addClass('btn-info')
                $('#estate_index_side, #estate_index_top').addClass('active')
            } else if (ref3 == 'update') {
                $('#estate_index_side, #estate_index_top').addClass('active')
            } else if (ref3 == 'assign_caretaker') {
                $('#estate_caretaker_side').addClass('active')
            }
        }
    }

    if (ref2 == 'listing') {
        $('#listing_index_side, #listing_index_top').addClass('active')
    }
    // if (ref2 == 'user') {
    //     $('#admin_index_top').addClass('active')
    // }

    if (ref2 == 'house') {
        if (ref3 === undefined) {
            $('#house_index_side, #house_index_top').addClass('active')
        }else{
            if (ref3 == 'new') {
                $('#house_index_side, #house_index_top').addClass('active')
            }else if (ref3 == 'update') {
                $('#house_index_side, #house_index_top').addClass('active')
            }
        }
    }
    if(ref2 == 'house-request'){
        $('#houseRequest_side,  #admin_index_top').addClass('active')   
    }
    if(ref2 == 'demo-request'){
        $('#demoRequest_side , #admin_index_top').addClass('active')   
    }
    if(ref2 == 'contact-us-details'){
        $('#contactUsDetails_side ,  #admin_index_top').addClass('active')   
    }
    if(ref2 == 'visitor-contacts'){
        $('#visitorContacts_side , #admin_index_top').addClass('active')   
    }
    if(ref2 == 'flaged-listings'){
        $('#flagedListings_side , #admin_index_top').addClass('active')   
    }
    if(ref2 == 'faqs'){
        $('#faqs_side').addClass('active')   
    }


    if (ref2 == 'user') {
        if (ref3 === undefined) {
            $('#users_side , #admin_index_top').addClass('active');
            $('#userAll_top').addClass('active');
            $('#user_index_top').addClass('active');
            $('#user_side').addClass('active');
        }else{
            if (ref3 == 'landlord') {
                $('#userLandlord_side, #userLandlord_top').addClass('active')
                $('#user_index_top').addClass('active');
            }else if (ref3 == 'caretaker') {
                $('#userCaretaker_side, #userCaretaker_top').addClass('active')
                $('#user_index_top').addClass('active');
            }else if (ref3 == 'tenant') {
                $('#userTenant_side, #userTenant_top').addClass('active')
                $('#user_index_top').addClass('active');
            }else if (ref3 == 'subscribe_invitation') {
                $('#userSubscriptionRequest_side, #userSubscriptionRequest_top').addClass('active')
                $('#invitation_index_top').addClass('active');
            }else if (ref3 == 'work_invitation') {
                $('#userWorkRequest_side, #userWorkRequest_top').addClass('active')
                $('#invitation_index_top').addClass('active');
            }
        }
    }

    if (ref2 == 'utility') {
        $('#utility_index_side, #utility_index_top, #rent_index_top').addClass('active')
    }

    if (ref2 == 'rent') {
        $('#rent_index_top').addClass('active')
        if (ref3 === undefined) {
        }else {
            if (ref3 == 'contract') {
                $('#rentContract_side, #rentContract_top').addClass('active')
            }else if (ref3 == 'rent_payment') {
                $('#rentPayment_side, #rentPayment_top').addClass('active')
            }else if (ref3 == 'utility_payment') {
                $('#utilityPayment_side, #utilityPayment_top').addClass('active')
            }
        }
    }

});


/*MANAGE ADDING UTILITY TO CONTRACTS*/
$(document).ready(function () {

    /*Hide all utilities that are not automatically billed*/
    $('.utility-billing').hide();
    $('.utility-billing.automatic').show();
    $('.select-utility').change(function(){
    $('#filter-div').hide();


        var utility_id = $(this).attr('data-utility-id')
        var billing_type = $(this).attr('data-utility-billing-type');

        var billing_type_info_id = '#utility-billing-'+utility_id
        var use_id = "#use-"+utility_id
        console.log($(use_id).prop('checked'))
        if (billing_type == 'manual') {
            $(billing_type_info_id).hide(400)
        }else if (billing_type == 'automatic') {
            $(billing_type_info_id).show(400)
        }
    })


    /*Filter. When filter button is clicked, we toggle the hidden class*/
    $('#filter-btn').click(function(e){
        e.preventDefault(); 
        if ($('#filter-div').css('display') == 'none') {
            $('#filter-div').slideDown( "fast", function() {});
        }else{
            $('#filter-div').slideUp( "fast", function() {});
        }
    })
    
    /* Submit selected notifications */
    $('#submit-form-mark-selected-asread').click(function(e){
        e.preventDefault();
        var frm = $('#form-mark-selected-asread');
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: $('#form-mark-selected-asread').serialize(),
            success: function(data) {

                  if (data.success == true) {
                    toastr["success"](data.message)
                  } else {
                    toastr["error"]('Sorry Could not mark selected as read');
                  }
                  setTimeout(
                  function() 
                  {
                     location.reload();
                  }, 0001);  
            },
            error: function(data) {
              toastr["error"]('Sorry Could not mark selected as read Try again');
            }
        })
        e.preventDefault();

    })

    /*Load all notifications*/
    $('.top-notif-icon').click(function(e){
        var notificationContainer = $('#notificationContainer'); 
        notificationContainer.fadeToggle(300).toggleClass('is-open');
        var count = $(this).find('.notification-count').html();
        count = parseInt(count);
        
        //The notification count is zero or empty, 
        //The dropdown is currently open, so the click is to trigger closing of the dropdown
        if (isNaN(count) || count == 0 || !notificationContainer.hasClass('is-open')) { 
            return true;  
        }

        var notif_body = $('#notificationsBody'); 
        notif_body.html('<div align="center"><img width="50px" src="/img/loading.gif" /></div>'); 
        // return true; 

        $.ajax({
            type: "POST",
            url: base_url + "/bk/notification/ajax/unread-notifications",
            success: function(notif) {
                // console.log(notif);

                notif_body.empty(); 
                $.each(notif.html, function(key, value){
                    notif_body.append(value);
                })

                // notif_body.html(notif.html)
            },
            failure: function(data) {
                console.log("failed badly")
            }
        })
    })

    $('#notificationsBody').on("click", '.notif-elt', function(event) { 
        var href = $(this).children('a').attr('href'); 
        window.location.href = href
    })

    $('.aminities_in_estate .add-aminity').click(function(e){
        var aminity_elt = $(this).parent('div').parent('div').find('#aminity-elt');
        var all_aminities = $(this).parent('div').parent('div').parent('div').find('.all-aminities');
        var aminity_id = aminity_elt.val();

        if (aminity_id == '') {
            alert('Please, select an aminity before submittint clicking add')
            return false; 
        }

        var estate_id = aminity_elt.data('estate')
        var house_type_id = aminity_elt.data('house-type')
        var data = {estate_id, aminity_id, house_type_id }
        console.log(data)
        // return false; 
        $.ajax({
            type: "POST",
            data: data,
            url: base_url + "/bk/estate/add-aminity",
            success: function(result) {
                if (result.success) {
                    console.log(all_aminities.find('.no-aminity').remove())
                    all_aminities.append(result.html)
                }else{
                    alert(result.error)
                }
            },
            failure: function(data) {
                console.log("failed badly")
            }
        })
    })

    /*Delete aminity*/
    $('.aminity-item .del-aminity').click(function(e){
        if (!confirm('Do you want to delete this aminity?')) { return false; }
        var aminity_id = $(this).data('aminity'); 
        var estate_id = $(this).data('estate');
        var house_type_id = $(this).data('house-type');
        var toDel = $(this).parent('div').parent('div')
        var data = {estate_id, aminity_id, house_type_id}
        console.log(data);
        // return false; 
        $.ajax({
            type: "POST",
            data: data,
            url: base_url + "/bk/estate/delete-aminity",
            success: function(result) {
                if (result.success) {
                    toDel.fadeToggle(500).remove();
                }else{
                    alert(result.error)
                }
            },
            failure: function(data) {
                console.log("failed badly")
            }
        })
    })


    /*Send verification mail to email address*/
    $('#verify-email').click(function(e){
        var that = $(this);
        var grandPa = that.parent('div').parent('div.container-fluid');
        var email = $('#email'); 
        var email_error = $("#email_error");
        
        email.css({'border-color': '#ccc'}); 
        email_error.slideUp( "fast", function() {});

        if (email.val() == '') {
            email.css({'border-color': '#a94442'}); 
            email_error.html('Please input email address')
                              .slideDown( "fast", function() {})
            return false; 
        }


        var data = {type:'email', 'value':email.val() }

        $.ajax({
            type: "POST",
            data: data,
            url: base_url + "/bk/user/verification",
            beforeSend: function() {
               that.html('<i class="fa fa-spinner"> Processing, please wait ... </i>');
            },
            success: function(result) {
                if (result.success) {
                    that.html('<i class="fa fa-check"> Email sent</i>');
                    email.prop('disabled', true); 
                    that.prop('disabled', true);
                    grandPa.hide()
                           .html(
                        `<center>
                            <h2 class="alert alert-success">
                                Email sent succesfully to your address: 
                                <strong>`+ email.val() + `</strong><br><br> ` +
                               `Please login to your mail and click the 
                                link to verify your account. <br><br> 
                                <small><u>NOTE</u>: 
                                    You must be logged into digotalrenter.com before you can verify your account
                                </small> 
                            </h2>
                        </center>`)
                           .slideDown('fast', function(){})
                    console.log(result)
                    // toDel.fadeToggle(500).remove();
                }else{
                    that.html('<i class="fa fa-frown-o"> Try again </i>');
                    email_error.html(result.message).slideDown( "fast", function() {})
                    // alert(result.message)
                }
            },
            failure: function(data) {
                console.log("failed badly")
            }
        })
    })

    /*Send verification code to phone number*/
    $('#verify-phone-number').click(function(e){
        var phone_number = $('#phone_number');
        var phone_number_error = $("#phone_number_error");

        phone_number.css({'border-color': '#ccc'}); 
        phone_number_error.slideUp( "fast", function() {});


        if (phone_number.val().length != 9) {
            phone_number.css({'border-color': '#a94442'}); 
            phone_number_error.html('phone number must be exactly 9 characters')
                              .slideDown( "fast", function() {})
            return false; 
        }
        console.log(phone_number);
    })


    /*Show modal to propose a new location*/
    $('.cant-find').click(function(e){
        var missing = $(this).data('missing'); 
        $("#missing_type").val(missing);
        $('select').selectpicker('refresh');
        $('#cant_find_location_modal').modal('show')
    })

    /*Submit a proposal for a new location*/
    $('#submit_proposal').click(function(e){
        var that = $(this);
        var error_item = $('#error_item');
        error_item.slideUp( "fast", function() {});

        var country = $('#country').val();
        var state = $('#state').val();
        var city = $('#city').val();
        var quarter = $('#quarter').val();

        var proposed_name = $('#proposed_name').val(); 
        var missing_type = $('#missing_type').val(); 
        var comment = $('#comment').val(); 

        if (proposed_name == '') {
            error_item.html('You need to propose a name. Please type in a name of the place you are proposing')
                            .slideDown('fast', function(){})
            return false; 
        }

        var data = { country, state, city, quarter, proposed_name, missing_type, comment};
        $.ajax({
            type: "POST",
            data: data,
            url: base_url + "/bk/location/propose/new",
            beforeSend: function() {
               that.html('<i class="fa fa-spinner"> </i> Processing, please wait ...');
            },
            success: function(result) {
                if (result.success) {
                   that.html('<i class="fa fa-paper-plane"> </i> Submit proposal');
                    $('#cant_find_location_modal').modal('hide')
                    $('#thank_you_modal #thank_you_text').html(`
                        <i class="fa fa-check fa-2x"> Your proposal has been sent to our review team. <br><br> We will get back to you in not more than 24 hours with our feedback. </i>
                        `);
                    $('#thank_you_modal').modal('show')
                }else{
                    console.log(result.message)
                }
            },
            failure: function(data) {
                console.log("failed badly")
            }
        })

    })

    /*Approve or decline rental payment*/
    $('.confirm-payment-btn').click(function(e){


        var that = $(this); 
        var status = that.data('status');
        var id = that.data('id');
        if(!confirm(`
            Do you want to continue with this action? 

            Note that this action is irreversible once executed
            
            This will mark the payment as `+status+`
            `)){
            return false; 
        }

        var data = {id, status};
        var old_html_val = that.html()
        var btns_div = that.parent('div').parent('div');
        var status_div = btns_div.parent('td').parent('tr').find('.payment-status');

        console.log(status, id);

        $.ajax({
            type: "POST",
            data: data,
            url: base_url + "/bk/rent/rent_payment/approve_decline",
            beforeSend: function() {
               that.html('<i class="fa fa-spinner"> </i> Processing');
            },
            success: function(result) {
                console.log(result); 
                that.html(old_html_val)
                if (result.success) {
                    btns_div.html(result.message)
                    status_div.html(`<label class="label label-default status-`+result.payment.status+`">
                                        `+result.payment.status+`
                                    </label>`)
                }else{
                    console.log(result.message)
                }
            },
            failure: function(data) {
                console.log("failed badly")
            }
        })

    })

})
/**/
