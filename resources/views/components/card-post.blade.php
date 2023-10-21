<div class="blog-entry justify-content-end">
    <a href="{{ route('client.blog-detail', $slug) }}" class="block-20"
        style="background-image: url('{{ $cover }}');">
    </a>
    <div class="text">
        <div class="d-flex align-items-center mb-4 topp">
            <div class="one">
                <span class="day">{{ $day }}</span>
            </div>
            <div class="two">
                <span class="yr">{{ $years }}</span>
                <span class="mos">{{ $month }}</span>
            </div>
        </div>
        <h3 class="heading"><a href="{{ route('client.blog-detail', $slug) }}">{{ $title }}</a></h3>
        <p class="three-line">{{ $description }}</p>
        <p><a href="{{ route('client.blog-detail', $slug) }}" class="btn btn-primary">Đọc thêm</a></p>
    </div>
</div>
