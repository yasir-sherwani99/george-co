<div class="contact-form m-auto">
    @if(count($errors) > 0)
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <button type="button" class="btn-close font-12" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul class="mb-0 font-12">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success fade show font-12 mb-4" role="alert">
            <strong>Welldone! </strong>
            {{ session()->get('success') }}
        </div>
    @endif
    <form method="post" action="{{ route('contact.store') }}">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-5">
                    <label
                        for="first_name"
                        class="form-label font-12 font-weight-medium mb-0"
                    >
                        First Name
                    </label>
                    <input
                        type="text"
                        class="form-control rounded-0 border-top-0 border-end-0 border-start-0 font-14"
                        id="first_name"
                        name="first_name"
                        required
                    />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-5">
                    <label
                        for="last_name"
                        class="form-label font-12 font-weight-medium mb-0"
                    >
                        Last Name
                    </label>
                    <input
                        type="text"
                        class="form-control rounded-0 border-top-0 border-end-0 border-start-0 font-14"
                        id="last_name"
                        name="last_name"
                        required
                    />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-5">
                    <label
                        for="email"
                        class="form-label font-12 font-weight-medium mb-0"
                    >
                        Email
                    </label>
                    <input
                        type="email"
                        class="form-control rounded-0 border-top-0 border-end-0 border-start-0 font-14"
                        id="email"
                        name="email"
                        required
                    />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-5">
                    <label
                        for="phone"
                        class="form-label font-12 font-weight-medium mb-0"
                        >Phone Number</label
                    >
                    <input
                        type="phone"
                        class="form-control rounded-0 border-top-0 border-end-0 border-start-0 font-14"
                        id="phone"
                        name="phone"
                        required
                    />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-5">
                    <label
                        for="subject"
                        class="form-label font-weight-medium mb-3 font-12"
                    >
                        Subject?
                    </label>
                    <div class="d-flex">
                        <label class="container-check me-4">
                            General Inquiry
                            <input type="radio" checked="checked" name="subject" value="general" />
                            <span class="checkmark"></span>
                        </label>
                        <label class="container-check">
                            Serious Inquiry
                            <input type="radio" name="radio" name="subject" value="serious" />
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-5">
                    <label
                        for="message"
                        class="form-label font-12 font-weight-medium mb-0"
                    >
                        Message
                    </label>
                    <textarea
                        placeholder="Write your message.."
                        class="form-control rounded-0 border-top-0 border-end-0 border-start-0 font-14"
                        id="message"
                        name="message"
                        rows="4"
                        required
                    ></textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-5 text-center">
                    <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                </div>
            </div>
            <div class="col-lg-12 text-end">
                <button
                    type="submit"
                    class="btn sendbtn font-16 font-weight-medium text-white"
                >
                    Send Message
                </button>
            </div>
        </div>
    </form>
</div>