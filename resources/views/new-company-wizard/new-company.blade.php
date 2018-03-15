@extends('layouts.no-header')

@section('content')
<br><br>
<div class="container col-p-0" id="main_body">
    <div class="panel panel-default">
        <div class="container hidden" id="processing-during-ajax" style="">
            <center>
                <img src="{{ asset('img/processing.gif') }}">
            </center>
        </div>
        <div class="panel-heading top-btn container-fluid" style="text-align: center;">
            
            <span id="pg_title">@lang('sentence.create_company')</span>
       
        </div>
        <div class="form-designed panel-body" id="estate-listing">
            <form class="form-horizontal" id="add-listing-form" role="form" method="POST" action="{{route('company-new') }}"  enctype="multipart/form-data">   
                {!! csrf_field() !!}
                <div class="ex-tab col5 " id="company-tabs">
                    <ul class="nav nav-pills col-md-offset-3 col-sm-offset-2">
                        <li class="active" id="pill-add-company">
                            <a href="#add-company" data-toggle="tab"><i class="fa fa-building text text-default"></i><span> @lang('sentence.company_details')</span></a>
                        </li>
                        <li id="pill-add-info">
                            <a href="#add-address" data-toggle="tab"><i class="fa fa-list text text-info"></i><span> @lang('words.address_category') </span></a>
                        </li>
                        
                        <li id="pill-add-image">
                            <a href="#add-logo" data-toggle="tab"><i class="fa fa-image text text-warning"></i><span>@lang('words.company_logo')</span></a>
                        </li>
                    </ul>
                    <br> <hr>
                    <div class="tab-content clearfix">
                        <div class="tab-pane active" id="add-company">
                            @include('new-company-wizard.w-company')
                        </div>
                        <div class="tab-pane" id="add-address">
                            @include('new-company-wizard.w-address')
                        </div>
                        
                        <div class="tab-pane" id="add-logo">
                            @include('new-company-wizard.w-logo')
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection

@section('extra_js')
<script type="text/javascript">
    $(document).ready(function(e){

        {{-- If the user is not logged in, each time he/she clicks or there is a blur on an element, force open the login/signup modal
        @if(Auth::guest())

        @if(count($errors) > 0)
            $('#authModal').modal('show');
        @endif
        $('#add-listing-form select, #add-listing-form input, #add-listing-form textarea, #add-listing-form checkbox').on('click blur keyup keypress change', function(e){
            console.log('force login')
            $('#authModal').modal('show');
        });
        @endif
         --}}
        



       



        /*------------------------------------------------------------*/
        /*    UPLOADING A NEW LISTING IMAGE AND DISPLAYING PREVIEW    */
        /*------------------------------------------------------------*/
        function readURL(input, img_div) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    img_div.attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("body").on("change", ".add-new-listing-image", function() {
            var img_div = $(this).parent().children('img'); 
            readURL(this, img_div);
            return true; 


            $('#new-img-div').show().scrollTop(400);

            $('html, body').animate({
                scrollTop: $("#new-img-div").offset().top
            }, 1000);
        });




        /*------------------------------------------------------------*/
        /*         DELETE A LISTING IMAGE AND CLEARING PREVIEW        */
        /*------------------------------------------------------------*/
        $("body").on("click", ".del-listing-image", function() {
            var del_div = $(this).parent().parent().parent().remove();
        });




        /*------------------------------------------------------------*/
        /*        ADD A NEW PLACEHOLDER FOR A NEW LISTING IMAGE       */
        /*------------------------------------------------------------*/
        $('#add-listing-image').click(function(e){
            var data = (`<div class="col-sm-3 col-xs-12 col-p-5 listing-images-item">
                            <div>
                                <div><label>Image</label><i class="del-listing-image pull-right fa fa-times text text-danger"></i></div>
                                <img class="img-responsive" src="{{ asset('img/upload.png') }}">
                                <input type="file" class="form-control add-new-listing-image" name="images[]">
                            </div>
                        </div>`); 
            var add_div = $('.listing-images .them').append(data); 
        })
             
        
    })
</script>
@endsection