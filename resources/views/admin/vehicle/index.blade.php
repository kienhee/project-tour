@php
    $moduleName = 'xe';
@endphp
@extends('layouts.admin.index')
@section('title', 'Quản lý ' . $moduleName)

@section('content')
    <x-breadcrumb parentName="Quản lý {{ $moduleName }}" parentLink="dashboard.vehicle.index"
        childrenName="Danh sách {{ $moduleName }}" />
    <div class="card">
        <x-alert />
        @can('create', App\Models\Vehicle::class)
            <x-header-table tableName="Danh sách {{ $moduleName }}" link="dashboard.vehicle.add"
                linkName="Tạo {{ $moduleName }}" />
        @else
            <div class="d-flex justify-content-between align-items-center mx-3">
                <h5 class="card-header px-0"> Danh sách {{ $moduleName }}</h5>
            </div>
            <hr class="my-0" />
        @endcan

        <div class="table-responsive text-nowrap mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Tên màu</th>
                        <th>Ngày tạo</th>
                        <th>Cài đặt</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if ($vehicles->count() > 0)

                        @foreach ($vehicles as $item)
                            <tr>
                                <td> <a href="{{ route('dashboard.vehicle.edit', $item->id) }}" title="Click xem thêm"
                                        style="color: inherit"><strong>#{{ $item->id }}</strong>
                                    </a>
                                </td>
                                <td><a href="{{ route('dashboard.vehicle.edit', $item->id) }}" title="Click xem thêm"
                                        style="color: inherit"><strong>{{ $item->name }}</strong>
                                    </a></td>
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

                                            @can('update', App\Models\Vehicle::class)
                                                <a class="dropdown-item"
                                                    href="{{ route('dashboard.vehicle.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Sửa thông tin</a>
                                            @else
                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                        class="bx bx-edit-alt me-1"></i>
                                                    Không có quyền sửa</a>
                                            @endcan
                                            @can('delete', App\Models\Vehicle::class)
                                                <form class="dropdown-item"
                                                    action="{{ route('dashboard.vehicle.delete', $item->id) }}" method="POST"
                                                    onsubmit="return confirm('Bạn chắc chắn muốn xóa vĩnh viễn?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0  w-100 text-start" type="submit">
                                                        <i class="bx bx-trash  me-1"></i>
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
                            <td colspan="5" class="text-center">Không có dữ liệu!</td>
                        </tr>

                    @endif


                </tbody>
            </table>
        </div>

    </div>
@endsection
