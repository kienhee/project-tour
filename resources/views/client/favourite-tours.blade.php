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
                                class="fa fa-chevron-right"></i></a></span> <span>Các tour đã lưu<i
                            class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Các tour đã lưu</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pb">
    <div class="container">
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="search-wrap-1 ftco-animate">
                    <form action="#" class="search-property-1">
                        <div class="row no-gutters">
                            <div class="col-lg d-flex">
                                <div class="form-group p-4 border-0">
                                    <label for="#">Tên chuyến đi</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-search"></span></div>
                                        <input type="text" class="form-control" name="keywords"
                                            placeholder="Tìm kiếm chuyến đi" value="{{ Request()->keywords }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="date_of_department">Khởi hành</label>
                                    <div class="form-field">
                                        <input type="date" class="form-control pl-0" id="date_of_department"
                                            name="date_of_department" value="{{ Request()->date_of_department }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg d-flex">
                                <div class="form-group p-4">
                                    <label for="price">Khoảng giá</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                            <select name="price" id="price" class="form-control">
                                                <option value="">Tất cả</option>
                                                <option value="100000" @if (Request()->price == "100000")
                                                    @selected(true)
                                                    @endif>100.000vnd</option>
                                                <option value="200000" @if (Request()->price == "200000")
                                                    @selected(true)
                                                    @endif>200.000vnd</option>
                                                <option value="300000" @if (Request()->price == "300000")
                                                    @selected(true)
                                                    @endif>300.000vnd</option>
                                                <option value="400000" @if (Request()->price == "400000" )
                                                    @selected(true)
                                                    @endif>400.000vnd</option>
                                                <option value="500000" @if (Request()->price =="500000" )
                                                    @selected(true)
                                                    @endif>500.000vnd</option>
                                                <option value="600000" @if (Request()->price == "600000")
                                                    @selected(true)
                                                    @endif>600.000vnd</option>
                                                <option value="700000" @if (Request()->price =="700000" )
                                                    @selected(true)
                                                    @endif>700.000vnd</option>
                                                <option value="800000" @if (Request()->price =="800000" )
                                                    @selected(true)
                                                    @endif>800.000vnd</option>
                                                <option value="900000" @if (Request()->price =="900000" )
                                                    @selected(true)
                                                    @endif>900.000vnd</option>
                                                <option value="1000000" @if (Request()->price =="1000000" )
                                                    @selected(true)
                                                    @endif>1.000.000vnd</option>
                                                <option value="2000000" @if (Request()->price =="2000000" )
                                                    @selected(true)
                                                    @endif>2.000.000vnd</option>
                                                <option value="3000000" @if (Request()->price =="3000000" )
                                                    @selected(true)
                                                    @endif>3.000.000vnd</option>
                                                <option value="4000000" @if (Request()->price == "4000000")
                                                    @selected(true)
                                                    @endif>4.000.000vnd</option>
                                                <option value="5000000" @if (Request()->price == "5000000")
                                                    @selected(true)
                                                    @endif>5.000.000vnd</option>
                                                <option value="6000000" @if (Request()->price == "6000000")
                                                    @selected(true)
                                                    @endif>6.000.000vnd</option>
                                                <option value="7000000" @if (Request()->price =="7000000" )
                                                    @selected(true)
                                                    @endif>7.000.000vnd</option>
                                                <option value="8000000" @if (Request()->price =="8000000" )
                                                    @selected(true)
                                                    @endif>8.000.000vnd</option>
                                                <option value="9000000" @if (Request()->price == "9000000")
                                                    @selected(true)
                                                    @endif>9.000.000vnd</option>
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
                                                <option value="{{$item->id}}" {{ Request()->destination == $item->id
                                                    ? 'selected' : '' }}>{{$item->name }}</option>
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
        </div> --}}
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row">

            @foreach ($tours as $item)
            <div class="col-md-4 ftco-animate">
                <x-card-tour slug="{{ $item->slug }}"
                    sale="{{$item->sale}}"
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
                    {{ $data->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
