  <!-- Contact -->
  <div class="vg-page page-contact" id="contact">
    <div class="container-fluid">
      <div class="text-center wow fadeInUp">
        <div class="badge badge-subhead">Contact</div>
      </div>
      <h1 class="text-center fw-normal wow fadeInUp">Get in touch</h1>
      <div class="row py-5">
        <div class="col-lg-12">
          <form class="vg-contact-form" id="SubmitForm">
              @csrf
              @if ($errors->any())
                  @foreach ($errors->all() as $error)
                      <div class="alert alert-danger">{{$error}}</div>
                  @endforeach
              @endif
          <div class="alert alert-success" id="successMsg" style="display: none" ></div>
          <div class="alert alert-danger"  id="errorMsg" style="display: none" ></div>
            <div class="form-row">
              <div class="col-12 mt-3 wow fadeInUp">
                <input class="form-control" type="text" name="name" placeholder="Your Name" id="InputName" required>
              </div>
              <div class="col-6 mt-3 wow fadeInUp">
                <input class="form-control" type="text" name="email" placeholder="Email Address" id="InputEmail" required>
              </div>
              <div class="col-6 mt-3 wow fadeInUp">
                <input class="form-control" type="text" name="subject" placeholder="Subject" id="InputSubject" required>
              </div>
              <div class="col-12 mt-3 wow fadeInUp">
                <textarea class="form-control" name="message" rows="6" placeholder="Enter message here.." id="InputMessage" required></textarea>
              </div>
              <button type="submit" class="btn btn-theme mt-3 wow fadeInUp ml-1">Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact -->

@push('js')
    <script type="text/javascript">

        $('#SubmitForm').on('submit',function(e){
            e.preventDefault();

            let name    = $('#InputName').val();
            let email   = $('#InputEmail').val();
            let subject = $('#InputSubject').val();
            let message = $('#InputMessage').val();

            $.ajax({
                url: "{{route('contact')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    name:name,
                    email:email,
                    subject:subject,
                    message:message,
                },
                success:function(response){
                    if(response.error){
                        $('#errorMsg').show();
                        $('#errorMsg').text(response.error.errorInfo);
                    }
                    if(response.success){
                        $('#successMsg').show();
                        $('#successMsg').text(response.success);
                        $('#InputName').val('');
                        $('#InputEmail').val('');
                        $('#InputSubject').val('');
                        $('#InputMessage').val('');
                    }
                }
            });
        });
    </script>
@endpush
