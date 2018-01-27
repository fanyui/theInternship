
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Company Name</label>

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
                            <label for="name" class="col-md-4 control-label">Company Website</label>

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
                            <label for="duration" class="col-md-4 control-label">Duration (months)</label>

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
                            <label for="application_period" class="col-md-4 control-label">Application Start Period</label>

                            <div class="col-md-6">
                                <select  class=" form-control selectpicker" data-live-search="true" title="Application Start period " tabindex="10"  name="application_period" id="application_period" value="{{ old('application_period') }}" required>
                                
                                        <option value="January" > January </option>
                                        <option value="February" > February </option>
                                        <option value="March" > March </option>
                                        <option value="April" > April </option>
                                        <option value="May" > May </option>
                                        <option value="June" > June </option>
                                        <option value="July" > July </option>
                                        <option value="August" > August </option>
                                        <option value="September" > September </option>
                                        <option value="October" > October </option>
                                        <option value="November" > November </option>
                                        <option value="December" > December </option>
                            </select>
                                @if ($errors->has('application_period'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('application_period') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('application_end_period') ? ' has-error' : '' }}">
                            <label for="application_end_period" class="col-md-4 control-label">Application End Period</label>

                            <div class="col-md-6">
                                <select  class=" form-control selectpicker" data-live-search="true" title="Application End period " tabindex="10"  name="application_end_period" id="application_end_period" value="{{ old('application_end_period') }}" required>
                                
                                        <option value="January" > January </option>
                                        <option value="February" > February </option>
                                        <option value="March" > March </option>
                                        <option value="April" > April </option>
                                        <option value="May" > May </option>
                                        <option value="June" > June </option>
                                        <option value="July" > July </option>
                                        <option value="August" > August </option>
                                        <option value="September" > September </option>
                                        <option value="October" > October </option>
                                        <option value="November" > November </option>
                                        <option value="December" > December </option>
                            </select>
                                @if ($errors->has('application_end_period'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('application_end_period') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('intern_number') ? ' has-error' : '' }}">
                            <label for="intern_number" class="col-md-4 control-label">Number Of Interns</label>

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
                            <label for="intenship_reward" class="col-md-4 control-label">Internship Reward</label>
                            <div class="col-md-6">
                            <select  class=" form-control selectpicker" data-live-search="true" title="Select Reward " tabindex="10"  name="intenship_reward" id="intenship_reward" value="{{ old('intenship_reward') }}" required>
                                
                                        <option value="paid" > Paid </option>
                                        <option value="not paid" > Not Paid </option>
                                        <option value="allowance" > Allowance </option>
                            </select>
                            @if ($errors->has('intenship_reward'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('intenship_reward') }}</strong>
                                </span>
                            @endif
                        </div>
                        </div> 

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

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