@extends('user.frontlayout')


@section('content')


  {{-- Slider Start --}}
  <div class="">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('images/6.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/6.jpg') }}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/6.jpg') }}" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>
{{-- Slider End --}}

{{-- Service Section start  --}}

<div class="container mt-5">
<h2 class="text-center">Service Section</h2>
<div class="row">
    <div class="col-md-5">
        <img src="{{ asset('images/20.jpg') }}" class="w-100" alt="">
    </div>
    <div class="col-md-7">
        <h4 class="mt-5">Service Heading</h4>
        <p class="text-muted" style="line-height: 40px"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Tenetur, accusantium atque dolores blanditiis, corrupti, nobis obcaecati adipisci
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.istinctio iste hic vel, nihil tempore est illum optio fugit?</p>
    </div>

    <div class="col-md-7">
        <h4 class="mt-5">Service Heading</h4>
        <p class="text-muted" style="line-height: 40px"> Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Tenetur, accusantium atque dolores blanditiis, corrupti, nobis obcaecati adipisci
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.istinctio iste hic vel, nihil tempore est illum optio fugit?</p>
    </div>
    <div class="col-md-5">
        <img src="{{ asset('images/35.jpg') }}" class="w-100" alt="">
    </div>
</div>
</div>

{{-- Service Section end  --}}


{{-- Gallery Section start  --}}
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4"><div class="" style="width: 18rem;">
            <img src="{{ asset('images/30.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
            </div>
          </div></div>
        <div class="col-md-4">
            <div class="" style="width: 18rem;">
                <img src="{{ asset('images/34.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="" style="width: 18rem;">
                <img src="{{ asset('images/33.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="btn btn-primary btn-sm">Go somewhere</a>
                </div>
              </div>
        </div>
    </div>
</div>
{{-- Gallery Section start  --}}

{{-- Team member section  --}}

<div class="container member mt-5">
    <h2 class="text-center mb-5">Our Team Members</h2>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        {{-- <div class="carousel-indicators mt-5">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div> --}}
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="">
                        <img src="{{ asset('images/5.jpg') }}" style="width: 100px" alt="" class="img-center">
                        <h4 class="text-center">Hotel Manager</h4>
                        <p class="text-muted text-center">Calvin</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="">
                        <img src="{{ asset('images/5.jpg') }}" style="width: 100px" alt="" class="img-center">
                        <h4 class="text-center">Hotel Manager</h4>
                        <p class="text-muted text-center">Calvin</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="">
                        <img src="{{ asset('images/5.jpg') }}" style="width: 100px" alt="" class="img-center">
                        <h4 class="text-center">Hotel Manager</h4>
                        <p class="text-muted text-center">Calvin</p>
                    </div>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="">
                        <img src="{{ asset('images/5.jpg') }}" style="width: 100px" alt="" class="img-center">
                        <h4 class="text-center">Hotel Manager</h4>
                        <p class="text-muted text-center">Calvin</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="">
                        <img src="{{ asset('images/5.jpg') }}" style="width: 100px" alt="" class="img-center">
                        <h4 class="text-center">Hotel Manager</h4>
                        <p class="text-muted text-center">Calvin</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="">
                        <img src="{{ asset('images/5.jpg') }}" style="width: 100px" alt="" class="img-center">
                        <h4 class="text-center">Hotel Manager</h4>
                        <p class="text-muted text-center">Calvin</p>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

</div>

{{-- Team member section  --}}

{{-- Service Section  start --}}

<div class="container">
    <div class="row">
        @foreach ($services as $service)
            <div class="col-md-3">
                <div class="card">
                    <div class="">
                        <img src="{{ asset('storage/'.$service->photo) }}" alt="service_photo">
                    </div>
                    <div class="">
                        <p class="text-center">{{ $service->small_desc }}</p>
                        {{-- <p class="text-muted text-center">{{ $service->detail_desc }}</p> --}}
                        <a href="{{ url('/service_detail/'.$service->id) }}" class="btn btn-primary btn-sm">View Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Service Section  end --}}

@endsection
