@extends('layouts.client.index')
@section('title', 'Danh sách các tour')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('client') }}/images/bg_1.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Tour List <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Tours List</h1>
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
                                        <label for="#">Destination</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="fa fa-search"></span></div>
                                            <input type="text" class="form-control" placeholder="Search place">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="#">Check-in date</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                            <input type="text" class="form-control checkin_date"
                                                placeholder="Check In Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="#">Check-out date</label>
                                        <div class="form-field">
                                            <div class="icon"><span class="fa fa-calendar"></span></div>
                                            <input type="text" class="form-control checkout_date"
                                                placeholder="Check Out Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group p-4">
                                        <label for="#">Price Limit</label>
                                        <div class="form-field">
                                            <div class="select-wrap">
                                                <div class="icon"><span class="fa fa-chevron-down"></span></div>
                                                <select name="" id="" class="form-control">
                                                    <option value="">$5,000</option>
                                                    <option value="">$10,000</option>
                                                    <option value="">$50,000</option>
                                                    <option value="">$100,000</option>
                                                    <option value="">$200,000</option>
                                                    <option value="">$300,000</option>
                                                    <option value="">$400,000</option>
                                                    <option value="">$500,000</option>
                                                    <option value="">$600,000</option>
                                                    <option value="">$700,000</option>
                                                    <option value="">$800,000</option>
                                                    <option value="">$900,000</option>
                                                    <option value="">$1,000,000</option>
                                                    <option value="">$2,000,000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg d-flex">
                                    <div class="form-group d-flex w-100 border-0">
                                        <div class="form-field w-100 align-items-center d-flex">
                                            <input type="submit" value="Search"
                                                class="align-self-stretch form-control btn btn-primary">
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