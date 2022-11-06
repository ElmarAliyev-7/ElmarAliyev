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
                        <img src="{{asset($blog->image)}}" alt="{{$blog->title}}" style="height: 250px!important;">
                    </div>
                    <div class="caption">
                        <a href="javascript:void(0)" class="post-category">{{$blog->title}}</a>
                        <a href="{{route('blog',$blog->slug)}}" class="post-title">
                            {{Str::limit($blog->description,50)}}
                        </a>
                        <span class="post-date"><span class="sr-only">Published on</span> {{$blog->created_at->diffForHumans()}}</span>
                    </div>
                </div>
            </div>
        @endforeach
        @if(\Request::segment(1) !== 'blogs')
            <div class="col-12 text-center py-3 wow fadeInUp">
                <a href="{{route('blogs')}}" class="btn btn-theme">See All Blogs</a>
            </div>
        @endif
        </div>
    </div>
</div>

@push('js')
    <script>
        if(window.location.pathname === '/blogs') {
            $(document).ready(function () {
                function scrollToRegister() {
                    $('html, body').animate({
                        scrollTop: $("#blog").offset().top
                    }, 1000);
                }

                scrollToRegister()
            });
        }
    </script>
@endpush
