<div class="mytabs-sec">
    <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button
                class="nav-link active"
                id="pills-all-tab"
                data-bs-toggle="pill"
                data-bs-target="#pills-all"
                type="button"
                role="tab"
                aria-controls="pills-all"
                aria-selected="true"
            >
                All
            </button>
        </li>
        @foreach($categories as $category)
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link"
                    id="pills-{{ $category->slug }}-tab"
                    data-bs-toggle="pill"
                    data-bs-target="#pills-{{ $category->slug }}"
                    type="button"
                    role="tab"
                    aria-controls="pills-{{ $category->slug }}"
                    aria-selected="false"
                >
                    {{ $category->name }}
                </button>
            </li>
        @endforeach
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div
            class="tab-pane fade show active"
            id="pills-all"
            role="tabpanel"
            aria-labelledby="pills-all-tab"
            tabindex="0"
        >
            <div class="row gx-3">
                @if(count($projects) > 0)
                    @foreach($projects as $project)
                        <div class="col-lg-4 col-md-4">
                            <div class="services-holder position-relative">
                                <!-- <img src="{{ $project->images[0]->src }}" alt="Georgia Construction" /> -->
                                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators">
                                        @foreach($project->images as $key => $image)
                                            <button 
                                                type="button" 
                                                data-bs-target="#carouselExampleAutoplaying" 
                                                data-bs-slide-to="{{ $key }}" 
                                                class="{{ $key == 0 ? 'active' : '' }}" 
                                                aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                                aria-label="Slide {{ $key + 1 }}">
                                            </button>
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner">
                                        @foreach($project->images as $key => $image)
                                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                <img src="{{ $image->src }}" class="d-block w-100" alt="Georgia Construction">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                <div class="img-content-box">
                                    <h5 class="font-24 font-weight-bold">{{ $project->unit }},</h5>
                                    <p class="font-24">{{ $project->town }}, {{ $project->city }}.</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else 
                    <div class="col-lg-12 col-md-12">
                        <h4 class="text-center text-danger">No project found!</h4>
                    </div>
                @endif
            </div>
        </div>
        @foreach($categories as $category)
            <div
                class="tab-pane fade"
                id="pills-{{ $category->slug }}"
                role="tabpanel"
                aria-labelledby="pills-{{ $category->slug }}-tab"
                tabindex="0"
            >
                <div class="row">
                    @if(count($projects) > 0)
                        @foreach($projects as $key => $project)
                            @if($project->categories->slug == $category->slug)
                                <div class="col-lg-4 col-md-4">
                                    <div class="services-holder position-relative">
                                        <div id="carouselExampleAutoplaying-{{ $key }}" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <!-- <img src="{{ $project->images[0]->src }}" alt="Georgia Construction" /> -->
                                                @foreach($project->images as $key => $image)
                                                    <button 
                                                        type="button" 
                                                        data-bs-target="#carouselExampleAutoplaying-{{ $key }}" 
                                                        data-bs-slide-to="{{ $key }}" 
                                                        class="{{ $key == 0 ? 'active' : '' }}" 
                                                        aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                                        aria-label="Slide {{ $key + 1 }}">
                                                    </button>
                                                @endforeach
                                            </div>
                                            <div class="carousel-inner">
                                                @foreach($project->images as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <img src="{{ $image->src }}" class="d-block w-100" alt="Georgia Construction">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        <div class="img-content-box">
                                            <h5 class="font-24 font-weight-bold">{{ $project->unit }},</h5>
                                            <p class="font-24">{{ $project->town }}, {{ $project->city }}.</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else 
                        <div class="col-lg-12 col-md-12">
                            <h4 class="text-center text-danger">No project found!</h4>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>