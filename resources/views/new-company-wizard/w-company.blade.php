
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
                            <label for="duration" class="col-md-4 control-label">Duration</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control" name="duration" required>

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('application_period') ? ' has-error' : '' }}">
                            <label for="application_period" class="col-md-4 control-label">Application Period</label>

                            <div class="col-md-6">
                                <input id="application_period" type="text" class="form-control" name="application_period" required>

                                @if ($errors->has('application_period'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('application_period') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('intern_number') ? ' has-error' : '' }}">
                            <label for="intern_number" class="col-md-4 control-label">Number Of Inters</label>

                            <div class="col-md-6">
                                <input id="intern_number" type="text" class="form-control" name="intern_number" required>

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
       {{--  
        <a  class="btn btn-warning col-md-12 nav-btn-next-prev" data-move="prev" data-current="info"  data-next-prev="property">
            <i class="fa fa-btn fa-backward"></i>Previous
        </a> --}}
        
    </div>
    <div class="col-md-3 col-sm-offset-6 pull-right">
        <a class="btn btn-info col-md-12  nav-btn-next-prev" data-move="next" data-current="company"  data-next-prev="address">
            <i class="fa fa-btn fa-forward"></i>Next
        </a>
    </div>
</div>