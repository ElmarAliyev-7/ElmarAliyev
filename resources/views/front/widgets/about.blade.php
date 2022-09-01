  <div class="vg-page page-about" id="about">
    <div class="container py-5">
      <div class="row">
        <div class="col-lg-4 py-3">
          <div class="img-place wow fadeInUp">
            <img src="{{asset($about->image)}}" alt="{{$about->fullname}}" style="object-fit:cover;height: 100%">
          </div>
        </div>
        <div class="col-lg-6 offset-lg-1 wow fadeInRight">
          <h1 class="fw-light">{{$about->fullname}}</h1>
          <h5 class="fg-theme mb-3">{{$about->duty}}</h5>
          <p class="text-muted">{{$about->description}}</p>
          <ul class="theme-list">
            <li><b>From: </b>{{$about->from}}</li>
            <li><b>Lives In: </b>{{$about->lives_in}}</li>
            <li><b>Age: </b>{{$about->age}}</li>
            <li><b>Gender: </b> {{$about->gender}}</li>
          </ul>
          <a href="{{route('download-cv')}}" class="btn btn-theme-outline">Download CV</a>
        </div>
      </div>
    </div>
    <div class="container py-5">
      <h1 class="text-center fw-normal wow fadeIn">My Skills</h1>
      <div class="row py-3">
        <div class="col-md-6">
          <div class="px-lg-3">
            <h4 class="wow fadeInUp">Coding skills</h4>
            <div class="progress-wrapper wow fadeInUp">
            @foreach($skills as $skill)
              <span class="caption">
                <details>
                  <summary>{{$skill->name}}</summary>
                  <ul>
                  @foreach(AppHelper::instance()->getSkillChilds($skill->id) as $child)
                    <li>{{$child->name}}</li>
                  @endforeach
                  </ul>
                </details>
              </span>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width:{{$skill->percent}}%;"
                     aria-valuenow="{{$skill->percent}}" aria-valuemin="0" aria-valuemax="100">
                    {{$skill->percent}}%
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="px-lg-3">
            <h4 class="wow fadeInUp">Language</h4>
            <div class="progress-wrapper wow fadeInUp">
              <span class="caption">
                <details>
                  <summary>Azerbaijani</summary>
                  <p>Native or bilingual proficiency</p>
                </details>
              </span>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
              </div>
            </div>
            <div class="progress-wrapper wow fadeInUp">
              <span class="caption">
                <details>
                  <summary>English</summary>
                  <p>Professional working proficiency</p>
                </details>
              </span>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 78%;" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100">78%</div>
              </div>
            </div>
            <div class="progress-wrapper wow fadeInUp">
              <span class="caption">
                <details>
                  <summary>Turkish</summary>
                  <p>Native or bilingual proficiency</p>
                </details>
              </span>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">95%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container pt-5">
      <div class="row">
        <div class="col-md-6 wow fadeInRight">
          <h2 class="fw-normal">Education</h2>
          <ul class="timeline mt-4 pr-md-5">
          @foreach($educations as $education)
            <li>
              <div class="title w-100">{{AppHelper::instance()->formatDate($education->start,$education->end)}}</div>
              <div class="details">
                <h5>{{$education->duty}}</h5>
                <small class="fg-theme">{{$education->company_name}}</small>
              </div>
            </li>
          @endforeach
          </ul>
        </div>
        <div class="col-md-6 wow fadeInRight" data-wow-delay="200ms">
          <h2 class="fw-normal">Experience</h2>
          <ul class="timeline mt-4 pr-md-5">
          @foreach($experiences as $experience)
            <li>
              <div class="title w-100">
                  {{AppHelper::instance()->formatDate($experience->start,$experience->end)}}
                  ( {{AppHelper::instance()->getExperiencePeriod($experience->start,$experience->end)}} month )
              </div>
              <div class="details">
                <h5>{{$experience->company_name}}</h5>
                <small class="fg-theme">{{$experience->duty}}</small>
                <p>{{AppHelper::instance()->getWorkTime($experience->work_time)}}</p>
              </div>
            </li>
          @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
