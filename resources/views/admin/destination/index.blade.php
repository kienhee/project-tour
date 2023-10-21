@php
    $moduleName = 'địa điểm';
@endphp
@extends('layouts.admin.index')
@section('title', 'Quản lý ' . $moduleName)
@section('content')
    <x-breadcrumb parentName="Quản lý {{ $moduleName }}" parentLink="dashboard.destination.index"
        childrenName="Danh sách {{ $moduleName }}" />
    <div class="card">
        <x-alert />
        <x-header-table tableName="Danh sách {{ $moduleName }}" link="dashboard.destination.add"
            linkName="Tạo {{ $moduleName }}" />
        <form method="GET" class="mx-3 mb-4 mt-4">
            <div class="row ">
                <div class="col-md-6 col-lg-3 mb-2">
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="basic-addon-search31"><i class="bx bx-search"></i></span>
                        <input type="search" class="form-control" placeholder="Tên địa điểm" name="keywords"
                            value="{{ Request()->keywords }}">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 mb-2">
                    <select class="form-select" name="status">
                        <option value="">Trạng thái</option>
                        <option value="active" {{ Request()->status == 'active' ? 'selected' : '' }}>Hoạt động
                        </option>
                        <option value="inactive" {{ Request()->status == 'inactive' ? 'selected' : '' }}>Ngừng
                            hoạt
                            động
                        </option>
                    </select>
                </div>
                <div class="col-md-6 col-lg-3 mb-2">
                    <select class="form-select" name="sort">
                        <option value="">Bộ lọc</option>
                        <option value="desc" {{ Request()->sort == 'desc' ? 'selected' : '' }}>Mới nhất
                        </option>
                        <option value="asc" {{ Request()->sort == 'asc' ? 'selected' : '' }}>Cũ nhất</option>
                    </select>
                </div>
                <div class="col-md-6 col-lg-3 mb-2 text-md-end">
                    <a href="{{ route('dashboard.destination.index') }}" class="btn btn-outline-secondary me-2">Đặt lại
                    </a>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>

            </div>
        </form>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th class="px-1 text-center" style="width: 50px">#ID</th>
                        <th class="px-1 text-center" style="width: 50px">ảnh</th>
                        <th>Tên địa điểm</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Cài đặt</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($destinations->count() > 0)

                        @foreach ($destinations as $item)
                            <tr>
                                <td> <a href="{{ route('dashboard.destination.edit', $item->id) }}" title="Click xem thêm"
                                        style="color:inherit"><strong>#{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td>
                                    <img src="{{ $item->cover }}" alt="{{ $item->name }}"
                                        style="width: 50px; height: 50px; border-radius: 8px ;object-fit: cover">
                                </td>
                                <td><a href="{{ route('dashboard.destination.edit', $item->id) }}" title="Click xem thêm"
                                        style="color: inherit"><strong>{{ $item->name }}</strong>
                                    </a></td>


                                <td><span
                                        class="badge  me-1 {{ $item->deleted_at == null ? 'bg-label-success ' : ' bg-label-primary' }}">{{ $item->deleted_at == null ? 'Hoạt động' : 'Đang ẩn' }}</span>
                                </td>

                                <td>
                                    <p class="m-0">{{ $item->created_at->format('d M Y') }}</p>
                                    <small>{{ $item->created_at->format('h:i A') }}</small>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('dashboard.destination.edit', $item->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Xem chi tiết</a>

                                            @if (Auth::user()->id != $item->id)
                                                @if ($item->trashed() == 1)
                                                    <form class="dropdown-item"
                                                        action="{{ route('dashboard.destination.restore', $item->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn p-0  w-100 text-start" type="submit">
                                                            <i class='bx bx-revision'></i>
                                                            Hiện địa điểm
                                                        </button>
                                                    </form>
                                                @endif
                                                <form class="dropdown-item"
                                                    action="{{ $item->trashed() ? route('dashboard.destination.force-delete', $item->id) : route('dashboard.destination.soft-delete', $item->id) }}"
                                                    method="POST"
                                                    @if ($item->trashed()) onsubmit="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')" @endif>
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0  w-100 text-start" type="submit">
                                                        <i
                                                            class="bx {{ $item->trashed() ? 'bx-trash' : 'bx bxs-hand' }}  me-1"></i>
                                                        {{ $item->trashed() ? 'Xóa vĩnh viễn' : 'Tạm ẩn địa điểm' }}
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">Không có dữ liệu!</td>
                        </tr>

                    @endif


                </tbody>
            </table>
        </div>
        <div class="mx-3 mt-3">
            {{ $destinations->withQueryString()->links() }}
        </div>
    </div>
@endsection
