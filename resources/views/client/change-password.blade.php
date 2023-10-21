  @extends('layouts.client.index')
  @section('title', 'Đổi mật khẩu')
  @section('content')
      <section class="ftco-section contact-section " style="padding-top: 170px;">
          <div class="container">
              <div class="row">
                  <div class="col-lg-2">
                      <div class="nav flex-column nav-pills user-info" id="v-pills-tab" role="tablist"
                          aria-orientation="vertical">
                          <a class="nav-link "
                              href=" {{ url()->current() == route('client.user') ? 'javascript:void(0)' : route('client.user') }}">Thông
                              tin</a>
                          <a class="nav-link  "
                              href=" {{ url()->current() == route('client.history-book-tour') ? 'javascript:void(0)' : route('client.history-book-tour') }}">Lịch
                              sử đặt tour</a>
                          <a class="nav-link active"
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
                      <form action="{{ route('client.handle-change-password', Auth::user()->email) }}" method="POST"
                          class="bg-light p-5 contact-form">
                          @csrf
                          @method('put')
                          <div class="form-group">
                              <label for="currentPassword">Mật khẩu hiện tại: <span class="text-danger">*</span></label>
                              <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                  placeholder="Mật khẩu">
                              @error('currentPassword')
                                  <p class="text-danger my-1">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label for="password">Mật khẩu: <span class="text-danger">*</span></label>
                              <input type="password" class="form-control" id="password" name="password"
                                  placeholder="Mật khẩu">
                              @error('password')
                                  <p class="text-danger my-1">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group mb-4">
                              <label for="password_confirmation">Xác nhận mật khẩu: <span
                                      class="text-danger">*</span></label>
                              <input type="password" class="form-control" id="password_confirmation"
                                  name="password_confirmation" placeholder="Xác nhận mật khẩu">
                              @error('password_confirmation')
                                  <p class="text-danger my-1">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <input type="submit" value="Đổi mật khẩu" class="btn btn-primary py-3 px-5 w-100">
                          </div>

                      </form>
                  </div>
              </div>

          </div>
      </section>

  @endsection
