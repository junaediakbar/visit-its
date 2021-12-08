@extends('layouts.app')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
         
            <div class="col-md-4 d-flex flex-column  justify-content-center">
                <div class="d-flex flex-column  align-items-center">

                    <img  class="img border-0 w-75 my-5" src="{{ asset('assets/logo_evits.png')}}" alt="Logo E-Vits">
                </div>

                <div class="card mb-5">
                    <h3 class="card-header text-center">Login Admin</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('check-admin.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto mb-2">
                                <button type="submit" class="btn btn-dark bg-primary btn-block">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
