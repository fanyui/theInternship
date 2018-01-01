@extends('layouts.no-header')
@section('content')
<form method="post" action="{{ route('store-media') }} " enctype="multipart/form-data">
	 {!! csrf_field() !!}
	<h2> Apply for internship here</h2>
				<input type="hidden" name="company_id" value="{{ $company_id }}" />
					<div class="col-md-2 col-sm-4 {{ $errors->has('application_type') ? ' has-error' : '' }}">
                                         <select   class="col-md-12 form-control selectpicker" data-live-search="true" title="Select " tabindex="10"  name="application_type" id="application_type" value="{{ old('application_type') }}">
                            @if ($application_type)
                                @foreach($application_type as $type)
                                             <option value="{{$type->id}}" {{ old('type') == $type->id ? 'selected' : null }} > {{ $type->name}} </option>
                                @endforeach
                            @endif
                        </select>
                        <center>Application Type <a style="display: inline-block;" href="#" class="cant-find" data-missing="application_type" >{{-- Can't find my application_type --}}</a></center>

                        @if ($errors->has('application_type'))
                            <span class="help-block">
                                <strong>{{ $errors->first('application_type') }}</strong>
                            </span>
                        @endif
                    </div> 
                    <br><br><br>
                    <div class="row">
                    <div class="col-sm-3 col-xs-12 col-p-5 ">
						<div>
							<label>CV *</label>
							
							<input type="file" class="form-control " name="cv" required>
						</div>
					</div>

                    <div class="form-group{{ $errors->has('application_letter_text') ? ' has-error' : '' }}">
                            <label for="application_letter_text" class="col-md-4 control-label">Compose Application Letter</label>

                            <div class="col-md-6">
                                <textarea name="application_letter_text" class="form-control use-tinymce" id="application_letter_text" rows="3"></textarea> 

                                @if ($errors->has('application_letter_text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('application_letter_text') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                </div>
                    <hr />
                    <div class="row">
                    <div class="col-sm-3 col-xs-12 col-p-5 ">
						<div>
							<label>Upload Application Letter </label>
							
							<input type="file" class="form-control " name="application_letter" required>
						</div>
					</div>

                        <div class="form-group{{ $errors->has('multivation_letter') ? ' has-error' : '' }}">
                            <label for="multivation_letter" class="col-md-4 control-label">Multivation Letter</label>

                            <div class="col-md-6">
                                <textarea name="multivation_letter" class="form-control use-tinymce" id="multivation_letter" rows="3"></textarea> 

                                @if ($errors->has('multivation_letter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('multivation_letter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                            

                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary pull-right"> submit</button>
                                
                            </div>
                        </div>
</form>

@endsection