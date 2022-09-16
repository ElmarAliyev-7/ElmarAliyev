  <!-- Portfolio page -->
  <div class="vg-page page-portfolio" id="portfolio">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="badge badge-subhead">Portfolio</div>
      </div>
      <h1 class="text-center fw-normal wow fadeInUp">See my work</h1>
      @if(count($projects) > 0)
      <div class="filterable-button py-3 wow fadeInUp" data-toggle="selected">
        <button class="btn btn-theme-outline selected" data-filter="*">All</button>
        @foreach( config('settings.programs') as $key => $value)
              <button class="btn btn-theme-outline" data-filter=".{{$key}}">{{$value}}</button>
        @endforeach
      </div>
      @endif
      <div class="gridder my-3">
          <div class="container">
              <div class="row">
                @foreach($projects as $project)
                    <div class="grid-item {{$project->program}} wow zoomIn col-sm-3" style="width: 300px; height: 270px;">
                      <div class="img-place" data-src="{{asset($project->image)}}" data-fancybox
                           data-caption="<h5 class='fg-theme'>{{$project->title}}</h5> <p>{{$project->comment}}</p>">
                        <img src="{{asset($project->image)}}" alt="{{$project->title}}">
                        <div class="img-caption" style="height: 50px">
                          <h5 class="fg-theme">{{$project->title}}</h5>
                          <p>{{$project->comment}}</p>
                        </div>
                      </div>
                    </div>
                @endforeach
              </div>
          </div>

      </div> <!-- End gridder -->
    </div>
      <div class="col-12 text-center py-3 wow fadeInUp">
          <a href="blog-fullbar.html" class="btn btn-theme">See All Post</a>
      </div>
  </div>
  <!-- End Portfolio page -->
