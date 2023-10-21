@extends('layouts.client.index')
@section('title', 'Danh sách địa điểm')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('https://images.unsplash.com/photo-1614088459293-5669fadc3448?auto=format&fit=crop&q=80&w=1974&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate pb-5 text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Trang chủ <i
                                class="fa fa-chevron-right"></i></a></span> <span>Danh sách địa điểm<i
                            class="fa fa-chevron-right"></i></span></p>
                <h1 class="mb-0 bread">Danh sách địa điểm</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pb">
    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="search-wrap-1 ftco-animate">
                    <form action="#" class="search-property-1">
                        <div class="row no-gutters">
                            <div class="col-lg-10 d-flex">
                                <div class="form-group p-4 border-0">
                                    <label for="destination-input">Địa điểm</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="fa fa-search"></span></div>
                                        <input type="text" class="form-control" placeholder="Tìm kiếm địa điểm"
                                            id="destination-input">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 d-flex">
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
    </div> --}}
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach (getAllDestination() as $destination)
            <div class="col-md-4 ftco-animate mb-4">
                <div class="project-destination">
                    <x-card-destination id="{{ $destination->id }}" name="{{ $destination->name }}"
                        slug="{{ $destination->slug }}" cover="{{ $destination->cover }}"
                        totalTours="{{ $destination->tour->count() }}" />
                </div>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    {{ getAllDestination()->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection