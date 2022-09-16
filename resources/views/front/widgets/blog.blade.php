<div class="vg-page page-blog" id="blog">
    <div class="container">
        <div class="text-center">
            <div class="badge badge-subhead wow fadeInUp">Blog</div>
        </div>
        <h1 class="text-center fw-normal wow fadeInUp">Latest Post</h1>
        <div class="row post-grid">
        @foreach($blogs as $blog)
            <div class="col-md-6 col-lg-4 wow fadeInUp">
                <div class="card">
                    <div class="img-place">
                        <img src="{{asset($blog->image)}}" alt="{{$blog->title}}">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)" class="post-category">{{$blog->title}}</a>
                        <a href="{{route('blog',$blog->slug)}}" class="post-title">
                            {{Str::limit($blog->description,50)}}
                        </a>
                        <span class="post-date"><span class="sr-only">Published on</span> {{$blog->created_at}}</span>
                    </div>
                </div>
            </div>
        @endforeach
            <div class="col-12 text-center py-3 wow fadeInUp">
                <a href="blog-fullbar.html" class="btn btn-theme">See All Post</a>
            </div>
        </div>
    </div>
</div>
