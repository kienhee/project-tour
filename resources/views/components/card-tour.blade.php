<div class="project-wrap">

    <a href="{{ route('client.tour-detail', $slug) }}" class="img" style="background-image: url({{ $cover }}">
        <span class="price">{{ $price }} VND/Người</span>

    </a>
    <div class="text p-4">
        <div class="d-flex justify-content-between align-items-center">
         <span class="days">{{ $nightOfDay }}</span>
         @if ($sale > 0)
         <span class="badge  text-danger border border-danger">Giảm giá {{$sale}}%</span>
         @endif
        </div>

        <h5 class="mb-3 "><a href="{{ route('client.tour-detail', $slug) }} " class=" text-dark"
                style="font-weight: 600;">{{ $title }}</a>
        </h5>
        <p style="font-size: 15px;" class="mb-1"><i class="fa-solid fa-map-location-dot text-primary"></i> Từ:
            {{ $startingPoint }}
        </p>
        <p style="font-size: 15px;" class="mb-1"><i class="fa-regular fa-calendar-days text-primary"></i> khởi
            hành: {{ $dateOfDepartment }}</p>
        <p style="font-size: 15px;" class="mb-1"><i class="fa-solid fa-users text-primary"></i> Số
            chỗ: {{ $amountOfPeople }}</p>
        <p style="font-size: 15px;" class="mb-1"><i class="fa-solid fa-users text-primary"></i> Còn
            trống: {{ $avaiable }}</p>

            <div class="d-flex " style="gap: 10px">
                <a href="{{ route('client.tour-detail', $slug) }}" class="btn btn-primary w-100">Xem thêm</a>
                @if ( url()->current() == route('client.favourite-tours'))
                <button class="btn btn-outline-primary" onclick="removeFavourite('{{$slug}}')"><i class="fa-solid fa-x"></i></button>
@else

<button class="btn btn-outline-primary" onclick="addToFavourite('{{$slug}}')"><i class="fa-regular fa-heart"></i></button>
                @endif
            </div>
    </div>
</div>
