  <!-- Contact -->
  <div class="vg-page page-contact" id="contact">
    <div class="container-fluid">
      <div class="text-center wow fadeInUp">
        <div class="badge badge-subhead">Contact</div>
      </div>
      <h1 class="text-center fw-normal wow fadeInUp">Get in touch</h1>
      <div class="row py-5">
        <div class="col-lg-12">
          <form  method="POST" action="{{route('contact')}}" class="vg-contact-form">
              @csrf
              @if ($errors->any())
                  @foreach ($errors->all() as $error)
                      <div class="alert alert-danger">{{$error}}</div>
                  @endforeach
              @endif
              @if(Session::has('error'))
                  <div class="alert alert-danger">
                      {{ Session::get('error')}}
                  </div>
              @elseif(Session::has('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success')}}
                  </div>
              @endif
            <div class="form-row">
              <div class="col-12 mt-3 wow fadeInUp">
                <input class="form-control" type="text" name="name" placeholder="Your Name" required>
              </div>
              <div class="col-6 mt-3 wow fadeInUp">
                <input class="form-control" type="text" name="email" placeholder="Email Address" required>
              </div>
              <div class="col-6 mt-3 wow fadeInUp">
                <input class="form-control" type="text" name="subject" placeholder="Subject" required>
              </div>
              <div class="col-12 mt-3 wow fadeInUp">
                <textarea class="form-control" name="message" rows="6" placeholder="Enter message here.." required></textarea>
              </div>
              <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact -->
