@php
    $moduleName = 'đặt tour';
@endphp
@extends('layouts.admin.index')
@section('title', 'Quản lý ' . $moduleName)

@section('content')
    <x-breadcrumb parentName="Quản lý {{ $moduleName }}" parentLink="dashboard.tour.index"
        childrenName="Danh sách {{ $moduleName }}" />
    <div class="card">
        <x-alert />
        <div class="d-flex justify-content-between align-items-center mx-3">
            <h5 class="card-header px-0"> Danh sách {{ $moduleName }}</h5>
        </div>
        <hr class="my-0" />
        <form method="GET" class="mx-3 mb-4 mt-4">
            <div class="row ">
                <div class="col-md-6 col-lg-4 mb-2">
                    <select class="form-select" name="status">
                        <option value="">Trạng thái</option>
                        <option value="1" {{ Request()->status == '1' ? 'selected' : '' }}>Đang chờ</option>
                        <option value="2" {{ Request()->status == '2' ? 'selected' : '' }}>Đã xác nhận
                        </option>
                        <option value="3" {{ Request()->status == '3' ? 'selected' : '' }}>Đã hoàn thành</option>
                        <option value="4" {{ Request()->status == '4' ? 'selected' : '' }}>Đã hủy
                        </option>
                    </select>
                </div>

                <div class="col-md-6 col-lg-4 mb-2">
                    <select class="form-select" name="sort">
                        <option value="">Bộ lọc</option>
                        <option value="desc" {{ Request()->sort == 'desc' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="asc" {{ Request()->sort == 'asc' ? 'selected' : '' }}>Cũ nhất</option>
                    </select>
                </div>


                <div class="col-md-6 col-lg-4 mb-2 text-md-end">
                    <a href="{{ route('dashboard.book-tour.index') }}" class="btn btn-outline-secondary">Đặt lại </a>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>

            </div>
        </form>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="px-1 text-center" style="width: 50px">#ID</th>
                        <th class="px-1 text-center" style="width: 50px"></th>
                        <th>Chuyến đi </th>
                        <th>Khách hàng </th>
                        <th class=" text-center" style="width: 100px">Số lượng người</th>
                        <th class=" text-center" style="width: 100px">Còn trống chỗ</th>
                        <th class=" text-center" style="width: 100px">Ngày đặt</th>
                        <th class=" text-center" style="width: 100px">Tổng tiền</th>
                        <th class=" text-center" style="width: 100px">Trạng thái</th>
                        <th class="text-center" style="width: 100px">Cài đặt</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($tours->count() > 0)
                        @foreach ($tours as $item)
                            <tr>
                                <td class="px-0 text-center">
                                    <a href="{{ route('dashboard.book-tour.view-detail', $item->id) }}"
                                        title="Click xem thêm" style="color: inherit"><strong>{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td class="px-0 text-center">
                                    <img src="{{ $item->tour->cover ?? asset('images/no-img.png') }}"
                                        style="object-fit: contain" alt="Ảnh" class=" border rounded w-px-40 h-px-40">
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.book-tour.view-detail', $item->id) }}"
                                        style="color: inherit    " title="Click xem thêm">
                                        <p class="text-ellipsis mb-0">
                                            <strong>
                                                {{ $item->tour->title }}
                                            </strong>

                                        </p>
                                        <small>{{ nightOfDay($item->tour->date_of_department, $item->tour->return_date) }}</small>
                                    </a>
                                </td>
<td>
    {{$item->full_name}}
</td>
                                <td class="px-0 text-center">
                                    {{ $item->adult + $item->children }}
                                </td>
                                <td class="px-0 text-center">
                                    {{ $item->tour->avaiable }}
                                </td>

                                <td>
                                    <p class="m-0">{{ $item->created_at->format('d M Y') }}</p>
                                    <small>{{ $item->created_at->format('h:i A') }}</small>
                                </td>
                                <td class="px-0 text-center text-success">
                                    {{ number_format($item->total) }}vnd
                                </td>
                                <td class=" text-center">
                                    @if ($item->status == 1)
                                        <span class="badge bg-label-danger">Đang chờ duyệt</span>
                                    @elseif($item->status == 2)
                                        <span class="badge bg-label-success me-1">Đã xác nhận</span>
                                    @elseif($item->status == 3)
                                        <span class="badge bg-label-success me-1">Đã hoàn thành</span>
                                    @else
                                        <span class="badge bg-label-danger">Đã hủy</span>
                                    @endif
                                </td>

                                <td class="px-0 text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @can('update', App\Models\BookTour::class)
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.book-tour.view-detail', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Xem thêm</a>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Không có quyền sửa</a>
                                            @endcan
                                            @can('delete', App\Models\BookTour::class)
                                                <form class="dropdown-item"
                                                    action="{{ route('dashboard.book-tour.delete', $item->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Nếu bạn xóa, lịch sử đặt hàng của khách hàng sẽ xóa theo?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0  w-100 text-start" type="submit">
                                                        <i class="bx bx-trash me-1"></i>
                                                        Xóa vĩnh viễn
                                                    </button>
                                                </form>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-trash me-1"></i>
                                                    Không có quyền xóa</a>
                                            @endcan
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9" class="text-center">Không có dữ liệu!</td>
                        </tr>

                    @endif


                </tbody>
            </table>
        </div>
        <div class="mx-3 mt-3">
            {{ $tours->withQueryString()->links() }}
        </div>
    </div>
@endsection
