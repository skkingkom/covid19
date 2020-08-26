@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            @if (\Session::has('error'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Register Covid User') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save-register-form') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="user_adress" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('address') is-invalid @enderror" id="user_adress" name="address" rows="3">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cityname" class="col-md-4 col-form-label text-md-right">{{ __('City Name') }}</label>

                            <div class="col-md-6">
                                <input id="cityname" type="text" class="form-control @error('cityname') is-invalid @enderror" name="cityname" value="{{ old('cityname') }}" required autocomplete="cityname">
                                @error('cityname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pincode" class="col-md-4 col-form-label text-md-right">{{ __('Pincode') }}</label>

                            <div class="col-md-6">
                                <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode" value="{{ old('pincode') }}" required autocomplete="pincode">
                                @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Any Symptions of COVID?') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input @error('symption_type') is-invalid @enderror" type="radio" name="symption_type" id="symption_type_yes" value="1" @if(old('symption_type') == 1) checked @endif>
                                  <label class="form-check-label" for="symption_type_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input @error('symption_type') is-invalid @enderror" type="radio" name="symption_type" id="symption_type_no" value="0" @if(old('symption_type') == '0') checked @endif>
                                  <label class="form-check-label" for="symption_type_no">NO</label>
                                </div>
                                @error('symption_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Are you done COVID test?') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input @error('covid_test') is-invalid @enderror" type="radio" name="covid_test" id="covid_test_yes" value="1" @if(old('covid_test') == 1) checked @endif>
                                  <label class="form-check-label" for="covid_test_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input @error('covid_test') is-invalid @enderror" type="radio" name="covid_test" id="covid_test_no" value="0" @if(old('covid_test') == '0') checked @endif>
                                  <label class="form-check-label" for="covid_test_no">NO</label>
                                </div>
                                @error('covid_test')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile_number" class="col-md-4 col-form-label text-md-right">{{ __('Are you COVID Positive') }}</label>

                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input @error('positive') is-invalid @enderror" type="radio" name="positive" id="positive_yes" value="1" @if(old('positive') ==1) checked @endif>
                                  <label class="form-check-label" for="positive_yes">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input @error('positive') is-invalid @enderror" type="radio" name="positive" id="positive_no" value="0" @if(old('positive') == '0') checked @endif>
                                  <label class="form-check-label" for="positive_no">NO</label>
                                </div>
                                @error('positive')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
