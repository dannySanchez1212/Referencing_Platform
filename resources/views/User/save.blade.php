@extends('layouts.app')

@section('content')
<main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Owner - Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('userO.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="owner_id" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>
                            <div class="col-md-6">
                                <SELECT id='owner_id' name='owner_id' class="form-control" >
                                    @foreach($companys as $company)
                                        <option id='owner_id' value="{{ $company }}" selected="selected" class="form-control{{ $errors->has('owner_id') ? ' is-invalid' : '' }}" required autofocus>{{ $company }}</option>
                                    @endforeach
                                </SELECT>
                                 @if ($errors->has('owner_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('owner_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                 @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <SELECT id='role_id' name='role_id' class="form-control" >
                                    @foreach($roles as $role)
                                        <option id='role_id' value="{{ $role }}" selected="selected" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" required autofocus>{{ $role }}</option>
                                    @endforeach
                                </SELECT>
                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                  
                        <div class="form-group row">
                            <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>
                            <div class="col-md-6">
                                <SELECT id='location_id' name='location_id' class="form-control" >
                                    @foreach($locations as $location)
                                        <option id='location_id' value="{{ $location }}" selected="selected" class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}" required autofocus>{{ $location }}</option>
                                    @endforeach
                                </SELECT>
                                 @if ($errors->has('location_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('location_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Address') }}</label> 
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_active" class="col-md-4 col-form-label text-md-right">{{ __('Is Active') }}</label>
                            <div class="col-md-6">
                                <input id="is_active" type="text" class="form-control{{ $errors->has('is_active') ? ' is-invalid' : '' }}" name="is_active" value="{{ old('is_active') }}" required>
                                @if ($errors->has('is_active'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('is_active') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="is_locked" class="col-md-4 col-form-label text-md-right">{{ __('Is locked') }}</label>
                            <div class="col-md-6">
                                <input id="is_locked" type="text" class="form-control{{ $errors->has('is_locked') ? ' is-invalid' : '' }}" name="is_locked" value="{{ old('is_locked') }}" required>
                                @if ($errors->has('is_locked'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('is_locked') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="locked_duration" class="col-md-4 col-form-label text-md-right">{{ __('locked_duration') }}</label>
                            <div class="col-md-6">
                                <input id="locked_duration" type="text" class="form-control{{ $errors->has('locked_duration') ? ' is-invalid' : '' }}" name="locked_duration" value="{{ old('locked_duration') }}" required>
                                @if ($errors->has('locked_duration'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('locked_duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection


