@php
    $moduleName = 'chuyến đi';
@endphp
@extends('layouts.admin.index')
@section('title', 'Quản lý ' . $moduleName)

@section('content')
    <x-breadcrumb parentName="Quản lý {{ $moduleName }}" parentLink="dashboard.tour.index"
        childrenName="Danh sách {{ $moduleName }}" />
    <div class="card">
        <x-alert />
        @can('create', App\Models\Tour::class)
            <x-header-table tableName="Danh sách {{ $moduleName }}" link="dashboard.tour.add"
                linkName="Tạo {{ $moduleName }}" />
        @else
            <div class="d-flex justify-content-between align-items-center mx-3">
                <h5 class="card-header px-0"> Danh sách {{ $moduleName }}</h5>
            </div>
            <hr class="my-0" />
        @endcan

        <form method="GET" class="mx-3 mb-4 mt-4">
            <div class="row ">
                <div class="col-md-6 col-lg-4 mb-2">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="search" class="form-control" placeholder="Tên chuyến đi" name="keywords"
                            value="{{ Request()->keywords }}">
                    </div>
                </div>




                <div class="col-md-6 col-lg-4 mb-2">
                    <select class="form-select" name="status">
                        <option value="">Trạng thái</option>
                        <option value="active" {{ Request()->status == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="inactive" {{ Request()->status == 'inactive' ? 'selected' : '' }}>Ngừng hoạt động
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


                <div class="col-md-6 col-lg-12 mb-2 text-md-end">
                    <a href="{{ route('dashboard.tour.index') }}" class="btn btn-outline-secondary">Đặt lại </a>
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
                        <th>Vé người lớn </th>
                        <th>Vé trẻ em</th>
                        <th>Giảm giá</th>
                        <th>Số lượng người</th>
                        <th>Còn trống chỗ</th>
                        <th>Ngày khởi hành</th>
                        <th>Ngày trở về</th>
                        <th>Trạng thái</th>
                        <th>Cài đặt</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($tours->count() > 0)
                        @foreach ($tours as $item)
                            <tr>
                                <td class="px-0 text-center">
                                    <a href="{{ route('dashboard.tour.edit', $item->id) }}" title="Click xem thêm"
                                        style="color: inherit"><strong>{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td class="px-0 text-center">
                                    <img src="{{ $item->cover ?? asset('images/no-img.png') }}" style="object-fit: contain"
                                        alt="Ảnh" class=" border rounded w-px-40 h-px-40">
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.tour.edit', $item->id) }}" style="color: inherit    "
                                        title="Click xem thêm">
                                        <p class="text-ellipsis mb-0">
                                            <strong>
                                                {{ $item->title }}
                                            </strong>

                                        </p>
                                    </a>
                                    <p class="mb-0">Địa điểm: {{ $item->destination->name }}</p>
                                </td>
                                <td class="px-0 text-center">
                                    <strong>{{ number_format($item->price_large) }}đ</strong>
                                </td>
                                <td class="px-0 text-center">
                                    <strong>{{ number_format($item->price_small) }}đ</strong>
                                </td>
                                <td class="px-0 text-center">
                                    <strong class="badge bg-label-danger">{{$item->sale >0 ? $item->sale .'%' :'' }}</strong>
                                </td>
                                <td class="px-0 text-center">
                                    {{ $item->amount_of_people }}
                                </td>
                                <td class="px-0 text-center">
                                    {{ $item->avaiable }}
                                </td>
                                <td>
                                    <p class="m-0">{{ $item->date_of_department->format('d M Y') }}</p>
                                    <small>{{ $item->date_of_department->format('h:i A') }}</small>
                                </td>
                                <td>
                                    <p class="m-0">{{ $item->return_date->format('d M Y') }}</p>
                                    <small>{{ $item->return_date->format('h:i A') }}</small>
                                </td>
                                <td class="px-0 text-center"><span
                                        class="badge  me-1 {{ $item->deleted_at == null ? 'bg-label-success ' : ' bg-label-primary' }}">{{ $item->deleted_at == null ? 'Công khai' : 'Tạm ẩn' }}</span>
                                </td>

                                <td class="px-0 text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @can('update', App\Models\Tour::class)
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.tour.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Xem thêm</a>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Không có quyền sửa</a>
                                            @endcan

                                            @can('delete', App\Models\Tour::class)
                                                @if ($item->trashed() == 1)
                                                    <form class="dropdown-item"
                                                        action="{{ route('dashboard.tour.restore', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn p-0  w-100 text-start" type="submit">
                                                            <i class='bx bx-revision'></i>
                                                            Khôi phục hoạt động
                                                        </button>
                                                    </form>
                                                @endif
                                                <form class="dropdown-item"
                                                    action="{{ $item->trashed() ? route('dashboard.tour.force-delete', $item->id) : route('dashboard.tour.soft-delete', $item->id) }}"
                                                    method="POST"
                                                    @if ($item->trashed()) onsubmit="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')" @endif>
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0  w-100 text-start" type="submit">
                                                        <i
                                                            class="bx {{ $item->trashed() ? 'bx-trash' : 'bx bxs-hand' }}  me-1"></i>
                                                        {{ $item->trashed() ? 'Xóa vĩnh viễn' : 'Tạm ngưng hoạt động' }}
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
