
<!-- Modal For Register and login-->
  <div class="modal fade modal-md in" id="authModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Welcome</h4>
        </div> --}}
        <div class="modal-body">


          <div class="ex-tab col2 form-designed" id="listing-tabs">
                    <ul class="nav nav-pills">
                        <li class="active" id="pill-add-info"><a href="#login" data-toggle="tab">Log In</a></li> 
                        <li id="pill-add-finance"><a href="#signup" data-toggle="tab">Sign Up</a></li>
                    </ul>
                    <div class="tab-content clearfix">
                      <!-- Beginning of login  -->
                        <div class="tab-pane m-t-0 active" id="login">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}
                        {{-- SOCIAL LITE STARTS--}}
                        <div class="form-group social-login">
                            <div class="col-md-12">
                                <div class="col-md-4 col-xs-4 twitter-div">
                                    <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter btn-block btn-default"><i class="fa fa-twitter"></i> Twitter</a>
                                </div>
                                <div class="col-md-4 col-xs-4 google-div">
                                    <a href="{{ url('/auth/google') }}" class="btn btn-google btn-block btn-default"><i class="fa fa-twitter"></i> Google</a>
                                </div>
                                <div class="col-md-4 col-xs-4 facebook-div">
                                    <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook btn-block btn-default"><i class="fa fa-facebook"></i> Facebook</a>
                                </div>
                            </div>
                        </div>
                        {{-- SOCIAL LITE ENDS--}}
                        <h4 class="or-item"><span>OR</span></h4>
                        <div class="form-group{{ $errors->has('identity') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail / Tel</label>

                            <div class="col-md-6">
                                <input autofocus type="text" class="form-control" name="identity" value="{{ old('identity') }}" placeholder="email or phone number">

                                @if ($errors->has('identity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('identity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                  @if ($errors->has('remember'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remember') }}</strong>
                                    </span>
                                 @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Login
                                </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                        </div>

                          <!-- End of sign in accordial -->
                          <!-- Beginning of Regiser -->
                        <div class="tab-pane m-t-0" id="signup">
                           <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                          {!! csrf_field() !!}
                          {{-- SOCIAL LITE STARTS--}}
                          <div class="form-group social-login">
                              <div class="col-md-12">
                                  <div class="col-md-4 col-xs-4 twitter-div">
                                      <a href="{{ url('/auth/twitter') }}" class="btn btn-twitter btn-block btn-default"><i class="fa fa-twitter"></i> Twitter</a>
                                  </div>
                                  <div class="col-md-4 col-xs-4 google-div">
                                      <a href="{{ url('/auth/google') }}" class="btn btn-google btn-block btn-default"><i class="fa fa-twitter"></i> Google</a>
                                  </div>
                                  <div class="col-md-4 col-xs-4 facebook-div">
                                      <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook btn-block btn-default"><i class="fa fa-facebook"></i> Facebook</a>
                                  </div>
                              </div>
                          </div>
                          {{-- SOCIAL LITE ENDS--}}
                          <h4 class="or-item"><span>OR</span></h4>
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">Name *</label>

                              <div class="col-md-6">
                                  <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">E-Mail Address</label>

                              <div class="col-md-6">
                                  <input type="email" id="signup_email" class="form-control" name="email" value="{{ old('email') }}">

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">Phone Number (+237)</label>

                              <div class="col-md-6">
                                  <input type="text" min="9" max="9" id="signup_phone_number" class="form-control" name="phone_number" value="{{ old('phone_number') }}">

                                  @if ($errors->has('phone_number'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('phone_number') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          

                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">Password *</label>

                              <div class="col-md-6">
                                  <input type="password" class="form-control" name="password">

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                              <label class="col-md-4 control-label">Confirm Password *</label>

                              <div class="col-md-6">
                                  <input type="password" class="form-control" name="password_confirmation">

                                  @if ($errors->has('password_confirmation'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          
                          <div class="form-group container-fluid" style="display: none;" id="error-div" align="center">
                              <p class="alert alert-danger">Need to set either email or phone number or both</p>
                          </div>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-4">
                                  <button type="submit" id="register-btn" class="btn btn-block btn-primary">
                                      <i class="fa fa-btn fa-user"></i>Register
                                  </button>
                              </div>
                          </div>
                      </form>
                        </div>
            
                    </div>
                </div>
          
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>