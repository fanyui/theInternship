
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('words.company') @lang('words.name')</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">@lang('words.company') @lang('words.website')</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website') }}" required >

                                @if ($errors->has('website'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">@lang('words.duration') (@lang('words.month'))</label>

                            <div class="col-md-6">
                                <input id="duration" type="number" class="form-control" name="duration" required>

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('application_period') ? ' has-error' : '' }}">
                            <label for="application_period" class="col-md-4 control-label">@lang('sentence.app_start_period')</label>

                            <div class="col-md-6">
                                <select  class=" form-control selectpicker" data-live-search="true" title="@lang('sentence.app_start_period') " tabindex="10"  name="application_period" id="application_period" value="{{ old('application_period') }}" required>
                                
                                        <option value="January" > @lang('words.january') </option>
                                        <option value="February" >@lang('words.february') </option>
                                        <option value="March" > @lang('words.march') </option>
                                        <option value="April" > @lang('words.april') </option>
                                        <option value="May" > @lang('words.may') </option>
                                        <option value="June" > @lang('words.june') </option>
                                        <option value="July" > @lang('words.july') </option>
                                        <option value="August" > @lang('words.august') </option>
                                        <option value="September" > @lang('words.september') </option>
                                        <option value="October" > @lang('words.october') </option>
                                        <option value="November" > @lang('words.november') </option>
                                        <option value="December" > @lang('words.december') </option>
                            </select>
                                @if ($errors->has('application_period'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('application_period') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('application_end_period') ? ' has-error' : '' }}">
                            <label for="application_end_period" class="col-md-4 control-label">@lang('sentence.app_end_period')</label>

                            <div class="col-md-6">
                                <select  class=" form-control selectpicker" data-live-search="true" title="@lang('sentence.app_end_period')" tabindex="10"  name="application_end_period" id="application_end_period" value="{{ old('application_end_period') }}" required>
                                
                                        <option value="January" > @lang('words.january') </option>
                                        <option value="February" >@lang('words.february') </option>
                                        <option value="March" > @lang('words.march') </option>
                                        <option value="April" > @lang('words.april') </option>
                                        <option value="May" > @lang('words.may') </option>
                                        <option value="June" > @lang('words.june') </option>
                                        <option value="July" > @lang('words.july') </option>
                                        <option value="August" > @lang('words.august') </option>
                                        <option value="September" > @lang('words.september') </option>
                                        <option value="October" > @lang('words.october') </option>
                                        <option value="November" > @lang('words.november') </option>
                                        <option value="December" > @lang('words.december') </option>
                            </select>
                                @if ($errors->has('application_end_period'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('application_end_period') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('intern_number') ? ' has-error' : '' }}">
                            <label for="intern_number" class="col-md-4 control-label">@lang('sentence.no_of_interns')</label>

                            <div class="col-md-6">
                                <input id="intern_number" type="number" class="form-control" name="intern_number" required>

                                @if ($errors->has('intern_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('intern_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('intenship_reward') ? ' has-error' : '' }}">
                            <label for="intenship_reward" class="col-md-4 control-label">@lang('sentence.internship_reward')</label>
                            <div class="col-md-6">
                            <select  class=" form-control selectpicker" data-live-search="true" title="@lang('words.select') @lang('words.reward') " tabindex="10"  name="intenship_reward" id="intenship_reward" value="{{ old('intenship_reward') }}" required>
                                
                                        <option value="paid" > @lang('words.paid') </option>
                                        <option value="not paid" > @lang('words.not_paid')</option>
                                        <option value="allowance" > @lang('words.allowance') </option>
                            </select>
                            @if ($errors->has('intenship_reward'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('intenship_reward') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div> 

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">@lang('words.description')</label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control" id="description" rows="3" required></textarea> 

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



<div class="form-group">
    <div class="col-md-3 pull-left">
        
    </div>
    <div class="col-md-3 col-sm-offset-6 pull-right">
        <a class="btn btn-info col-md-12   nav-btn-next-prev" href="#add-address" data-toggle="tab" data-move="next" data-current="company"  data-next-prev="address">
            <i class="fa fa-btn fa-forward"></i>Next
        </a>
    </div>
</div>