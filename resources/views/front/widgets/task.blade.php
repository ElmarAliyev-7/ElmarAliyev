<div class="vg-page page-blog" id="task">
    <div class="container">
        <div class="text-center">
            <div class="badge badge-subhead wow fadeInUp">Task</div>
        </div>
        <h1 class="text-center fw-normal wow fadeInUp">Learn with my Tasks</h1>
        <div class="row post-grid">
            @foreach($tasks as $task)
                <div class="col-md-6 col-lg-4 wow fadeInUp">
                    <div class="card">
                        <div class="img-place">
                            <img src="{{asset($task->image)}}" alt="{{$task->title}}" style="height: 250px!important;">
                        </div>
                        <div class="caption">
                            <a href="javascript:void(0)" class="post-category">{{$task->title}}</a>
                            <a href="{{route('task',$task->slug)}}" class="post-title">
                                {{Str::limit($task->description,50)}}
                            </a>
                            <span class="post-date"><span class="sr-only">Published on</span> {{$task->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            @if(\Request::segment(1) !== 'tasks')
                <div class="col-12 text-center py-3 wow fadeInUp">
                    <a href="{{route('tasks')}}" class="btn btn-theme">See All Tasks</a>
                </div>
            @endif
        </div>
    </div>
</div>

@push('js')
    <script>
        if(window.location.pathname === '/tasks') {
            $(document).ready(function () {
                function scrollToRegister() {
                    $('html, body').animate({
                        scrollTop: $("#task").offset().top
                    }, 1000);
                }

                scrollToRegister()
            });
        }
    </script>
@endpush
