<section class="hero-sec">
    @if(count($slides) > 0)
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($slides as $key => $slide)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img 
                            src="{{ asset($slide->image) }}" 
                            class="banner-img-2 object-fit-cover d-block w-100" 
                            alt="Georgia Construction"
                        />
                        <div class="carousel-caption d-md-block">
                            <h5 class="animated fadeInUp">{{ $slide->heading }}</h5>
                            <p class="animated fadeInDown">{{ $slide->sub_heading }}</p>
                        </div>
                    </div>
                @endforeach
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
    @else
        <img 
            class="banner-img object-fit-cover w-100" 
            src="{{ asset('admin-assets/images/default/no-banner.jpg') }}"
            alt="Georgia Construction" 
        />
    @endif
</section>