@extends('layouts.auth')

@section('pageTitle', 'Forgot Password')

@section('content')
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('assets/images/originals/city.jpg');"></div>
                                        <div class="slider-content"><h3>{{config('app.name')}}</h3>
                                            <p>{{config('app.description')}} {{config('app.name')}}.</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="position-relative slide-img-bg" style="background-image: url('assets/images/originals/citynights.jpg');"></div>
                                        <div class="slider-content"><h3>{{config('app.name')}}</h3>
                                            <p>{{config('app.description')}} {{config('app.name')}}.</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                        <div class="slide-img-bg opacity-6" style="background-image: url('assets/images/originals/citydark.jpg');"></div>
                                        <div class="slider-content"><h3>{{config('app.name')}}</h3>
                                            <p>{{config('app.description')}} {{config('app.name')}}.</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-8 col-lg-6">
                            <div class="app-logo"></div>
                            <h4>
                                <div>Forgot your Password?</div>
                                <span>Use the form below to recover it.</span></h4>
                            <div>
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="position-relative form-group">
                                                <label for="email" class="">Email</label>
                                                <input name="email" id="email" placeholder="Email here..." type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 d-flex align-items-center"><h6 class="mb-0"><a href="{{ route('login') }}" class="text-primary">Sign in existing account</a></h6>
                                        <div class="ml-auto">
                                            <button type="submit" class="btn btn-primary btn-lg">Recover Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

