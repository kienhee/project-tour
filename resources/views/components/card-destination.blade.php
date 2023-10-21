<div class="project-destination">
    <a href="{{route('client.tour',['destination'=>$id])}}" class="img" style="background-image: url({{ $cover }});">
        <div class="text">
            <h3>{{ $name }}</h3>
            <span>{{ $totalTours }} Tours</span>
        </div>
    </a>
</div>