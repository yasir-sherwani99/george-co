<section class="content-sec services-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="font-36 font-weight-bold mb-3">Services</h2>
                <p class="font-24 mw-100 mb-4">
                    Our team offers comprehensive planning, coordination, and project management services
                    from inception to completion, empowering clients to make informed decisions. Our primary
                    objective is to create functional and financially viable projects that satisfy our
                    clients' expectations. We aim for excellence and prioritize building trust, quality, and
                    relationships. Our Business Principles serve as a set of guidelines and expectations for
                    all employees across our various business units. We believe that our overall success
                    hinges on our business conduct, which is founded on the highest level of integrity when
                    interacting with our customers, suppliers, local communities, and employees.
                </p>
            </div>
        </div>
        <div class="row gx-3">
            @if(count($services) > 0)
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="services-holder position-relative wow zoomIn">
                            <img src="{{ asset($service->images[0]->src) }}" alt="Georgia Construction" />
                            <span class="label-box position-absolute font-18 text-white">{{ $service->title }}</span>
                        </div>
                        <div class="text-img-box mb-3">
                            <p class="font-18 mb-3">
                                {{ $service->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-12 col-md-12">
                    <h4 class="text-center text-danger">No services found!</h4>
                </div>
            @endif
        </div>
    </div>
</section>