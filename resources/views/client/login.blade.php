@extends('layouts.client.index')
@section('title', 'Đăng nhập')
@section('content')
    <section class="ftco-section contact-section " style="padding-top: 170px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="{{ route('client.handle-login') }}" method="POST" class="bg-light p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ session('email-account') ?? old('email') }}">
                            @error('email')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu: </label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                            @error('password')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col d-flex">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember"name="remember" />
                                    <label class="form-check-label" for="remember">Nhớ đăng nhập</label>
                                </div>
                            </div>

                            <div class="col text-right">
                                <a href="#!">Quên mật khẩu?</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Đăng nhập" class="btn btn-primary py-3 px-5 w-100">
                        </div>
                        <div class="text-center">
                            <p><strong>Bạn chưa có tài khoản ?</strong> <a href="{{ route('client.register') }}">Đăng ký</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

@endsection
