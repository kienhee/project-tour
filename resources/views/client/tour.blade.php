@extends('layouts.client.index')
@section('title', 'Danh sách các tour')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('client') }}/images/bg_1.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Danh sách chuyến đi<i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Danh sách chuyến đi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-wrap-1 ftco-animate">
                        <form action="#" class="search-property-1">
                            <div class="row no-gutters">
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4 border-0">
                                        <label for="#">Tên chuyến đi</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="fa fa-search"></span></div>
                                            <input type="text" class="form-control" placeholder="Tìm kiếm chuyến đi">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="#">Khởi hành</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                            <input type="text" class="form-control checkin_date"
                                                placeholder="Chọn ngày">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="#">Quay về</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                            <input type="text" class="form-control checkout_date"
                                                placeholder="Chọn ngày">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="#">Khoảng giá</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                <select name="price" id="" class="form-control">
                                                    <option value="">Tất cả</option>
                                                    <option value="">100.000vnd</option>
                                                    <option value="">200.000vnd</option>
                                                    <option value="">300.000vnd</option>
                                                    <option value="">400.000vnd</option>
                                                    <option value="">500.000vnd</option>
                                                    <option value="">600.000vnd</option>
                                                    <option value="">700.000vnd</option>
                                                    <option value="">800.000vnd</option>
                                                    <option value="">900.000vnd</option>
                                                    <option value="">1.000.000vnd</option>
                                                    <option value="">2.000.000vnd</option>
                                                    <option value="">3.000.000vnd</option>
                                                    <option value="">4.000.000vnd</option>
                                                    <option value="">5.000.000vnd</option>
                                                    <option value="">6.000.000vnd</option>
                                                    <option value="">7.000.000vnd</option>
                                                    <option value="">8.000.000vnd</option>
                                                    <option value="">9.000.000vnd</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="destination">Địa điểm</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                <select name="destination" id="destination" class="form-control">
                                                    <option value="">Tất cả</option>
                                                    @foreach (getAllDestination() as $item)
                                                    <option value="{{$item->slug}}">{{$item->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group d-flex w-100 border-0">
                                        <div class="form-field w-100 align-items-center d-flex">
                                            <input type="submit" value="Tìm kiếm"
                                                class="pl-0 align-self-stretch form-control btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($tours as $item)
                    <div class="col-md-4 ftco-animate">
                        <x-card-tour slug="{{ $item->slug }}"
                            nightOfDay="{{ nightOfDay($item->date_of_department, $item->return_date) }}"
                            title="{{ $item->title }}" price="{{ number_format($item->price_large) }}"
                            cover="{{ $item->cover }}" startingPoint="{{ $item->starting_point }}"
                            dateOfDepartment="{{ $item->date_of_department->format('d/m/Y h:m A') }}"
                            amountOfPeople="{{ $item->amount_of_people }}" avaiable="{{ $item->avaiable }}" />
                    </div>
                @endforeach

            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
