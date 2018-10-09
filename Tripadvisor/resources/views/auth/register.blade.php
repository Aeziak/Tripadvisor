@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="abo_pseudo" class="col-md-4 col-form-label text-md-right">{{ __('abo_pseudo') }}</label>

                            <div class="col-md-6">
                                <input id="abo_pseudo" type="text" class="form-control{{ $errors->has('abo_pseudo') ? ' is-invalid' : '' }}" name="abo_pseudo" value="{{ old('abo_pseudo') }}" required autofocus>

                                @if ($errors->has('abo_pseudo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('abo_pseudo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="abo_mel" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="abo_mel" type="abo_mel" class="form-control{{ $errors->has('abo_mel') ? ' is-invalid' : '' }}" name="abo_mel" value="{{ old('abo_mel') }}" required>

                                @if ($errors->has('abo_mel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('abo_mel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="abo_motpasse" class="col-md-4 col-form-label text-md-right">{{ __('abo_motpasse') }}</label>

                            <div class="col-md-6">
                                <input id="abo_motpasse" type="password" class="form-control{{ $errors->has('abo_motpasse') ? ' is-invalid' : '' }}" name="abo_motpasse" required>

                                @if ($errors->has('abo_motpasse'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('abo_motpasse') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="abo_motpasse-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm abo_motpasse') }}</label>

                            <div class="col-md-6">
                                <input id="abo_motpasse-confirm" type="password" class="form-control" name="abo_motpasse_confirmation" required>
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
@endsection
