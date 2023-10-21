  @extends('layouts.client.index')
  @section('title', 'Lịch sử đặt tour')
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
                          <a class="nav-link active "
                              href=" {{ url()->current() == route('client.history-book-tour') ? 'javascript:void(0)' : route('client.history-book-tour') }}">Lịch
                              sử đặt tour</a>
                          <a class="nav-link"
                              href="{{ url()->current() == route('client.change-password') ? 'javascript:void(0)' : route('client.change-password') }}">Đổi
                              mật khẩu</a>
                      </div>
                  </div>
                  <div class="col-lg-10">
                      <table class="table table-striped  table-bordered">
                          <thead>
                              <tr>
                                  <th scope="col" style="width: 50px;">STT</th>
                                  <th scope="col">Thông tin </th>
                                  <th scope="col">Thông tin khách hàng</th>
                                  <th scope="col">Trạng thái</th>
                              </tr>
                          </thead>
                          <tbody>
                              @if (count(getHistoryBookTour()) > 0)
                                  @foreach (getHistoryBookTour() as $item)
                                      <tr>
                                          <th scope="row">#{{ $item->id }}</th>
                                          <td>
                                              <p class="mb-1"><strong>Tên:</strong>
                                                  {{ $item->tour->title }}</p>
                                              <p class="mb-1"><strong>Điểm xuất phát:</strong>
                                                  {{ $item->tour->starting_point }}</p>
                                              <p class="mb-1"><strong>Lộ trình:</strong> {{ $item->tour->road_map }}
                                              </p>
                                              <p class="mb-1"><strong>Ngày khởi hành:</strong>
                                                  {{ $item->tour->date_of_department->format('d/m/Y h:m A') }}</p>
                                              <p class="mb-1"><strong>Ngày trở về:</strong>
                                                  {{ $item->tour->return_date->format('d/m/Y h:m A') }}</p>
                                              <p class="mb-1"><strong>Số lượng:</strong>
                                                  {{ $item->tour->amount_of_people }} người
                                              </p>
                                              <p class="mb-1"><strong>Vé người lớn:</strong>
                                                  {{ number_format($item->price_large) }}VND</p>
                                              <p class="mb-1"><strong>Vé trẻ em:</strong>
                                                  {{ number_format($item->price_small) }}VND</p>
                                              <p class="mb-1"><strong>Loại xe:</strong> {{ $item->tour->vehicle->name }}
                                              </p>

                                          </td>
                                          <td>
                                              <p class="mb-1"><strong>Họ và tên:</strong> {{ $item->full_name }}</p>
                                              <p class="mb-1"><strong>Email:</strong> {{ $item->email }}</p>
                                              <p class="mb-1"><strong>Số điện thoại:</strong> {{ $item->phone_number }}
                                              </p>
                                              <p class="mb-1"><strong>Địa chỉ liên hệ:</strong> {{ $item->address }}</p>
                                              <p class="mb-1"><strong>Số người lớn:</strong> {{ $item->adult }}</p>
                                              <p class="mb-1"><strong>Số trẻ em:</strong> {{ $item->children }}</p>
                                              <p class="mb-1"><strong>Ghi chú:</strong> {{ $item->notes }}</p>
                                              <p class="mb-1"><strong>Tổng tiền:</strong>
                                                  {{ number_format($item->total) }}VND</p>
                                          </td>
                                          <td>
                                              @if ($item->status == 1)
                                                  <button class="btn btn-warning w-100">Đang chờ duyệt</button>
                                              @elseif($item->status == 2)
                                                  <button class="btn btn-success w-100">Đã xác nhận</button>
                                              @elseif($item->status == 3)
                                                  <button class="btn btn-success w-100">Đã hoàn thành</button>
                                              @else
                                                  <button class="btn btn-danger w-100">Đã hủy</button>
                                              @endif
                                          </td>
                                      </tr>
                                  @endforeach
                              @else
                                  <tr>
                                      <th colspan="4" class="text-center">Bạn chưa từng đặt tour</th>
                                  </tr>
                              @endif


                          </tbody>
                      </table>
                  </div>
              </div>

          </div>
      </section>

  @endsection
