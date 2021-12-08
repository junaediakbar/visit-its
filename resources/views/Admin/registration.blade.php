@extends('layouts.app')

@section('content')
<main class="signup-form my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register Admin</h3>
                    <div class="card-body">
                        <form action="{{ route('register-admin.custom') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">

                                <input type="text" placeholder="Nama Lengkap" id="name" class="form-control" name="name"
                                    required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">

                                <input type="text" placeholder="NIK" id="nik" class="form-control" name="nik" required>
                                @if ($errors->has('nik'))
                                <span class="text-danger">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="date" placeholder="2001-10-10" id="tanggal_lahir" class="form-control" name="tanggal_lahir" required>
                                @if ($errors->has('tanggal_lahir'))
                                <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="text" placeholder="Jabatan" id="jabatan" class="form-control" name="jabatan" required>
                                @if ($errors->has('jabatan'))
                                <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="remember"> Remember Me</label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark bg-primary btn-block mb-2">Daftar</button>
                            </div>
                            <div class="d-grid mx-auto">
                                <a href="{{ route('login') }}" class="btn btn-dark btn-block">Sudah punya akun</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

