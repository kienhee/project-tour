@php
    $moduleName = 'chi tiết';
@endphp
@extends('layouts.admin.index')
@section('title', 'Thông tin ' . $moduleName)

@section('content')
    <x-breadcrumb parentName="Quản lý {{ $moduleName }}" parentLink="dashboard.book-tour.index"
        childrenName="Thông tin {{ $moduleName }}" />
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <x-alert />
                <x-header-table tableName="Thông tin {{ $moduleName }}" link="dashboard.book-tour.index"
                    linkName="Tất cả {{ $moduleName }}" />
                <div class="card-body pb-5">
                    <div class="row">
                        <div class="col-lg-9">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="px-1 text-center" style="width: 50px"></th>
                                        <th>Thông tin chuyến đi</th>

                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <th scope="row">
                                            <img src="{{ $tour->tour->cover ?? asset('images/no-img.png') }}"
                                                style="object-fit: contain" alt="Ảnh"
                                                class=" border rounded w-px-100 h-px-100 mb-3">
                                            <a href="{{ route('client.tour-detail', $tour->tour->slug) }}" target="_blank"
                                                title="Xem chi tiết chuyến đi"
                                                class="btn btn-outline-primary btn-sm w-100">View</a>
                                        </th>
                                        <td>
                                            <p class="mb-1"><strong>Tên:</strong>
                                                {{ $tour->tour->title }}</p>
                                            <p class="mb-1"><strong>Điểm xuất phát:</strong>
                                                {{ $tour->tour->starting_point }}</p>
                                            <p class="mb-1"><strong>Lộ trình:</strong> {{ $tour->tour->road_map }}
                                            </p>
                                            <p class="mb-1"><strong>Ngày khởi hành:</strong>
                                                {{ $tour->tour->date_of_department->format('d/m/Y h:m A') }}</p>
                                            <p class="mb-1"><strong>Ngày trở về:</strong>
                                                {{ $tour->tour->return_date->format('d/m/Y h:m A') }}</p>
                                            <p class="mb-1"><strong>Số lượng:</strong>
                                                {{ $tour->tour->amount_of_people }} người
                                            </p>
                                            <p class="mb-1"><strong>Còn trống:</strong>
                                                {{ $tour->tour->avaiable }} người
                                            </p>
                                            <p class="mb-1"><strong>Vé người lớn:</strong>
                                                {{ number_format($tour->price_large) }}VND</p>
                                            <p class="mb-1"><strong>Vé trẻ em:</strong>
                                                {{ number_format($tour->price_small) }}VND</p>
                                            <p class="mb-1"><strong>Loại xe:</strong> {{ $tour->tour->vehicle->name }}
                                            </p>

                                        </td>


                                    </tr>
                                </tbody>

                            </table>
                            <hr class="mb-5">
                            <div class="row">
                                <div class="col-lg-6"></div>
                                <div class="col-lg-6">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                        <span class="fw-semibold">Thời lượng :</span><span class="text-warning">
                                            {{ nightOfDay($tour->tour->date_of_department, $tour->tour->return_date) }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                        <span class="fw-semibold">
                                            Đăng kí :</span><span class="text-info "> {{ $tour->adult + $tour->children }}
                                            người</span>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                        <span class="fw-semibold">Tổng tiền:
                                        </span><span class="text-success"> {{ number_format($tour->total) }}vnd</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3  ">
                            <h5>Tài khoản</h5>
                            <hr>
                            <div class="d-flex align-items-center mb-5">
                                <div class="flex-grow-1 me-3">
                                    <span class="fw-semibold d-block">{{ $tour->user->full_name }}</span>
                                    <small class="text-muted  text-right">Email: {{ $tour->user->email }}</small><br>
                                    <small class="text-muted  text-right">SDT: {{ $tour->user->phone_number }}</small><br>
                                    <small class="text-muted  text-right">Địa chỉ: {{ $tour->user->address }}</small><br>
                                </div>
                                <div class="flex-shrink-0 ">
                                    <div class="avatar avatar-online">
                                        <img src="{{ $tour->user->avatar ?? asset('images/avatar-default.png') }} "
                                            alt="avatar" class="w-px-40 h-px-40 rounded-circle"
                                            style="object-fit: cover" />
                                    </div>
                                </div>
                            </div>
                            <h5>Thông tin khách hàng</h5>
                            <hr>
                            <section class="mb-5">
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                    <span class="fw-semibold">Họ và tên:</span><span>{{ $tour->full_name }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                    <span class="fw-semibold">Email:</span><span>{{ $tour->email }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                    <span class="fw-semibold">Số điện thoại:</span><span>{{ $tour->phone_number }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                    <span class="fw-semibold">Địa chỉ:</span><span>{{ $tour->address }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                    <span class="fw-semibold">Số lượng người lớn:</span><span>{{ $tour->adult }}</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                    <span class="fw-semibold">Số lượng trẻ em:</span><span>{{ $tour->children }}</span>
                                </div>

                                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                    <span class="fw-semibold">Ghi chú:</span><span>{{ $tour->notes }}</span>
                                </div>
                                <hr>
                                <form action="{{ route('dashboard.book-tour.update-status', $tour->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Trạng thái</label>
                                        <select id="status" class="form-select" name="status">
                                            <option value="1" @if ($tour->status == 1) @selected(true) @endif>
                                                Đang
                                                chờ duyệt
                                            </option>
                                            <option value="2" @if ($tour->status == 2) @selected(true) @endif>
                                                Xác
                                                nhận</option>
                                            <option value="3" @if ($tour->status == 3) @selected(true) @endif>
                                                Đã
                                                hoàn thành</option>
                                            <option value="4" @if ($tour->status == 4) @selected(true) @endif>
                                                Đã
                                                hủy</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-dark w-100"><i class='bx bx-printer me-1'></i><span>Xác nhận
                                            thông tin
                                        </span></button>
                                </form>

                            </section>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
