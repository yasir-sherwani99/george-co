<section class="services-sec">
    <div class="container">
        <h2 class="my-heading d-inline-block mb-4 font-36 font-weight-bold">Services</h2>
        <div class="row gx-3">
            @if(count($services) > 0)
                @foreach($services as $key => $service)
                    <?php 
                        $increment = ($key * 2 + 1)/10 . 's';
                    ?>
                    <div class="col-lg-4 col-md-6 col-6 wow bounceInUp" data-wow-delay="{{ $key != 0 ? $increment : '0.0s' }}">
                        <div class="services-holder position-relative">
                            <img src="{{ $service->images[0]->src }}" alt="Georgia Construction" />
                            <span class="label-box position-absolute font-18 text-white">{{ $service->title }}</span>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12 col-md-12 col-12">
                    <h4 class="text-center text-danger">No services found!</h4>
                </div>
            @endif
        </div>
    </div>
</section>