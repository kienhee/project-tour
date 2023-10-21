  @extends('layouts.client.index')
  @section('title', 'Thông tin khách hàng')
  @section('content')
      <section class="ftco-section contact-section " style="padding-top: 170px;">
          <div class="container">
              <div class="row">
                  <div class="col-lg-2">
                      <div class="nav flex-column nav-pills user-info" id="v-pills-tab" role="tablist"
                          aria-orientation="vertical">
                          <a class="nav-link active"
                              href=" {{ url()->current() == route('client.user') ? 'javascript:void(0)' : route('client.user') }}">Thông
                              tin</a>
                          <a class="nav-link "
                              href=" {{ url()->current() == route('client.history-book-tour') ? 'javascript:void(0)' : route('client.history-book-tour') }}">Lịch
                              sử đặt tour</a>
                          <a class="nav-link"
                              href="{{ url()->current() == route('client.change-password') ? 'javascript:void(0)' : route('client.change-password') }}">Đổi
                              mật khẩu</a>
                      </div>
                  </div>
                  <div class="col-lg-10">
                      @if (session('msgSuccess'))
                          <div class=" mt-3 alert alert-success alert-dismissible" role="alert">
                              {{ session('msgSuccess') }}

                          </div>
                      @endif
                      @if (session('msgError'))
                          <div class="mt-3  alert alert-danger alert-dismissible" role="alert">
                              {{ session('msgError') }}

                          </div>
                      @endif

                      <form action="{{ route('client.user-update', Auth::user()->email) }}" method="POST"
                          class="bg-light p-5 contact-form">
                          @csrf
                          @method('put')

                          <div class="form-group">
                              <label for="full_name">Họ và tên: <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="full_name" name="full_name"
                                  value="{{ Auth::user()->full_name }}" placeholder="Họ và tên">
                              @error('full_name')
                                  <p class="text-danger my-1">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="email">Email: <span class="text-danger">*</span></label>
                              <input type="text" class="form-control disabled" id="email" readonly
                                  value="{{ Auth::user()->email }}" placeholder="Email">
                          </div>
                          <div class="form-group">
                              <label for="phone_number">Số điện thoại: <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="phone_number" name="phone_number"
                                  value="{{ Auth::user()->phone_number }}" placeholder="Số điện thoại">
                              @error('phone_number')
                                  <p class="text-danger my-1">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="address">Địa chỉ: <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="address" name="address"
                                  value="{{ Auth::user()->address }}" placeholder="Địa chỉ">
                              @error('address')
                                  <p class="text-danger my-1">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="submit" value="Lưu thông tin" class="btn btn-primary py-3 px-5 ">
                          </div>

                      </form>
                  </div>
              </div>

          </div>
      </section>

  @endsection
