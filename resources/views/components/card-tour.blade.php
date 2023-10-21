<div class="project-wrap">
    <a href="{{ route('client.tour-detail', $slug) }}" class="img" style="background-image: url({{ $cover }}">
        <span class="price">{{ $price }} VND/Người</span>
    </a>
    <div class="text p-4">
        <span class="days">{{ $nightOfDay }}</span>
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
    </div>
</div>
