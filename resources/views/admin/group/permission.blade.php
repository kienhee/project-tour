@php
    $moduleName = 'Phân quyền';
@endphp
@extends('layouts.admin.index')
@section('title', '' . $moduleName)

@section('content')
    <x-breadcrumb parentName="{{ $moduleName }}" parentLink="dashboard.group.index" childrenName="{{ $group->name }}" />
    <div class="card">
        <x-alert />
        <h5 class="card-header px-3">{{ $group->name }}</h5>
        <hr class="my-0 mb-4" />
        <div class="table-responsive text-nowrap">
            <form action="{{ route('dashboard.group.postPermissions', $group->id) }}" method="POST" class="pb-2">
                @csrf
                @method('put')
                <table class="table">
                    <thead>
                        <tr>
                            <th>Modules</th>
                            <th>Quyền hạn</th>
                        </tr>
                    </thead>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Modules</th>
                                <th>Quyền hạn</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($modules as $module)
                                @if ($module->routeName == 'admin')
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger "></i>
                                            <strong>{{ $module->title }}</strong>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label" for="role_{{ $module->routeName }}_access">
                                                  Truy cập
                                                </label>
                                                <input class="form-check-input" type="checkbox"
                                                    name="role[{{ $module->routeName }}][]"
                                                    @if (isRole($roleData, $module->routeName, 'view')) @checked(true) @endif value="view"
                                                    id="role_{{ $module->routeName }}_access">
                                            </div>
                                        </td>

                                    </tr>
                                @elseif($module->routeName == 'dashboard')
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger "></i>
                                            <strong>{{ $module->title }}</strong>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label" for="role_{{ $module->routeName }}_dashboard">
                                                    Xem
                                                </label>
                                                <input class="form-check-input" type="checkbox"
                                                    name="role[{{ $module->routeName }}][]"
                                                    @if (isRole($roleData, $module->routeName, 'view')) @checked(true) @endif value="view"
                                                    id="role_{{ $module->routeName }}_dashboard">
                                            </div>
                                        </td>

                                    </tr>
                                @elseif($module->routeName == 'media')
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger "></i>
                                            <strong>{{ $module->title }}</strong>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <label class="form-check-label" for="role_{{ $module->routeName }}_media">
                                                    Quản lý toàn bộ (Xem, thêm, sửa, xóa)
                                                </label>
                                                <input class="form-check-input" type="checkbox"
                                                    name="role[{{ $module->routeName }}][]"
                                                    @if (isRole($roleData, $module->routeName, 'view')) @checked(true) @endif value="view"
                                                    id="role_{{ $module->routeName }}_media">
                                            </div>
                                        </td>

                                    </tr>
                                @else
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger "></i>
                                            <strong>{{ $module->title }}</strong>
                                        </td>


                                        @foreach ($roleArr as $roleName => $label)
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label"
                                                        for="role_{{ $module->routeName }}_{{ $roleName }}">
                                                        {{ $label }}
                                                    </label>
                                                    <input class="form-check-input" type="checkbox"
                                                        name="role[{{ $module->routeName }}][]"
                                                        @if (isRole($roleData, $module->routeName, $roleName)) @checked(true) @endif
                                                        value="{{ $roleName }}"
                                                        id="role_{{ $module->routeName }}_{{ $roleName }}">
                                                </div>
                                            </td>
                                        @endforeach
                                        @if ($module->routeName == 'groups')
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label"
                                                        for="role_{{ $module->routeName }}_permission">
                                                       Phân quyền
                                                    </label>
                                                    <input class="form-check-input" type="checkbox"
                                                        name="role[{{ $module->routeName }}][]"
                                                        @if (isRole($roleData, $module->routeName, 'permission')) @checked(true) @endif
                                                        value="permission" id="role_{{ $module->routeName }}_permission">
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </table>
                <hr>
                <div class="d-flex  justify-content-end">
                    <button type="submit" class="btn btn-primary mx-3 ">Lưu lại</button>
                </div>
            </form>

        </div>
    </div>
@endsection
