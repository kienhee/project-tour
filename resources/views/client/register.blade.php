@extends('layouts.client.index')
@section('title', 'Đăng ký')
@section('content')
    <section class="ftco-section contact-section " style="padding-top: 170px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form action="{{ route('client.handle-register') }}"method="post" class="bg-light p-5 contact-form">
                        @csrf
                        <div class="form-group">
                            <label for="full_name">Họ và tên: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                value="{{ old('full_name') }}" placeholder="Họ và tên">
                            @error('full_name')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Số điện thoại: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ old('phone_number') }}" placeholder="Số điện thoại"> @error('phone_number')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                            @error('password')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password_confirmation">Xác nhận mật khẩu: <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password_confirmation"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <p class="text-danger my-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Đăng ký" class="btn btn-primary py-3 px-5 w-100">
                        </div>
                        <div class="text-center">
                            <p><strong>Bạn đã có tài khoản ?</strong> <a href="{{ route('client.login') }}">Đăng nhập</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
@endsection
