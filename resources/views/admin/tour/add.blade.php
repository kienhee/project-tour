@php
    $moduleName = 'chuyến đi';
@endphp
@extends('layouts.admin.index')
@section('title', 'Tạo mới ' . $moduleName)

@section('content')
    <x-breadcrumb parentName="Quản lý {{ $moduleName }}" parentLink="dashboard.tour.index"
        childrenName="Tạo mới {{ $moduleName }}" />
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <x-alert />
                <x-header-table tableName="Tạo mới {{ $moduleName }}" link="dashboard.tour.index"
                    linkName="Danh sách {{ $moduleName }}" />
                <div class="card-body">
                    <form action="{{ route('dashboard.tour.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <div class="upload__box d-flex justify-content-center flex-column align-items-center gap-3">
                                    <img id="img_preview" class="img-fluid object-fit-contain"
                                        src="{{ asset('images/pngtree-image-upload-icon-photo.png') }}" alt="your image" />
                                    <label for="imgInp" data-preview="holder" class="form-label upload-label mb-3">
                                        <p class="mb-0">Thêm ảnh bìa <span class="text-danger">*</span></p>
                                        <small>(Nên chọn hình tỉ lệ 1:1)</small>
                                    </label>

                                    <input id="imgInp" accept="image/*" type="file" name="cover" hidden>

                                </div>

                                @error('cover')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="title" class="form-label">Tiêu đề chuyến đi: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('title') is-invalid @enderror " type="text"
                                    oninput="createSlug('title','slug')" id="title" name="title"
                                    value="{{ old('title') }}" placeholder="VD: Du lịch chùa A - Đền B - Biển C, ..v.v"
                                    autofocus />
                                @error('title')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="slug" class="form-label">Đường dẫn URL: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('slug') is-invalid @enderror" type="text"
                                    id="slug" name="slug" value="{{ old('slug') }}"
                                    placeholder="Đường dẫn thân thiện" />
                                @error('slug')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="starting_point" class="form-label">Địa điểm suất phát: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('starting_point') is-invalid @enderror" type="text"
                                    id="starting_point" name="starting_point" value="{{ old('starting_point') }}"
                                    placeholder="VD: Bến xe mỹ đình...v.v" />
                                @error('starting_point')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="road_map" class="form-label">Lộ trình: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('road_map') is-invalid @enderror" type="text"
                                    id="road_map" name="road_map" value="{{ old('road_map') }}"
                                    placeholder="VD: Hà nội - Thanh hóa - Quảng ninh" />
                                @error('road_map')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="date_of_department" class="form-label">Ngày khởi hành: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('date_of_department') is-invalid @enderror"
                                    type="datetime-local" id="date_of_department" name="date_of_department"
                                    value="{{ old('date_of_department') }}" />
                                @error('date_of_department')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="return_date" class="form-label">Ngày quay về: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('return_date') is-invalid @enderror" type="datetime-local"
                                    id="return_date" name="return_date" value="{{ old('return_date') }}" />
                                @error('return_date')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="price_large" class="form-label">Giá vé người lớn: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('price_large') is-invalid @enderror" type="text"
                                    id="price_large" name="price_large" value="{{ old('price_large') }}"
                                    placeholder="Giá vé người lớn" />
                                @error('price_large')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="price_small" class="form-label">Giá vé trẻ em: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('price_small') is-invalid @enderror" type="text"
                                    id="price_small" name="price_small" value="{{ old('price_small') }}"
                                    placeholder="Giá vé trẻ em" />
                                @error('price_small')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="amount_of_people" class="form-label">Số lượng người tham gia: <span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('amount_of_people') is-invalid @enderror" type="text"
                                    id="amount_of_people" name="amount_of_people" value="{{ old('amount_of_people') }}"
                                    placeholder="Số lượng người tham gia" />
                                @error('amount_of_people')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="vehicle_id" class="form-label">Loại xe: <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('vehicle_id') is-invalid @enderror" name="vehicle_id"
                                    id="vehicle_id">
                                    <option value="">Vui lòng lựa chọn</option>
                                    @if (getAllVehicle()->count() > 0)
                                        @foreach (getAllVehicle() as $item)
                                            <option {{ old('vehicle_id') == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">
                                                {{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('vehicle_id')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="destination_id" class="form-label">Địa điểm: <span
                                        class="text-danger">*</span></label>
                                <select class="form-select @error('destination_id') is-invalid @enderror"
                                    name="destination_id" id="destination_id">
                                    <option value="">Vui lòng lựa chọn</option>
                                    @if (getAllVehicle()->count() > 0)
                                        @foreach (getAllDestination() as $item)
                                            <option {{ old('destination_id') == $item->id ? 'selected' : '' }}
                                                value="{{ $item->id }}">
                                                {{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('destination_id')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="content-product" class="form-label">Nội dung bài viết: <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('content') is-invalid @enderror " id="content-product" rows="3"
                                    name="content">{{ old('content') }}</textarea>
                                @error('content')
                                    <p class="text-danger my-1">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Tạo mới {{ $moduleName }}</button>
                                <button type="reset" class="btn btn-outline-secondary">Đặt lại</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
