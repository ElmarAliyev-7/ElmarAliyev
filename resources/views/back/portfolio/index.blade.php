@extends('back.layouts.master')
@section('title','Portfolio')
@section('content')
    @if(AppHelper::instance()->checkPermisson(8) == 1)
        <a href="{{route('admin.create-project')}}" class="btn btn-success btn-sm">Add new Project
        </a> <hr>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Comment</th>
            <th scope="col">Image</th>
            <th scope="col">Program</th>
            <th scope="col">Actions</th>
            <th scope="col">Sort</th>
        </tr>
        </thead>
        <tbody id="projects">
        @foreach($projects as $project)
            <tr id="sorts_{{ $project->id }}">
                <th>{{$project->id}}</th>
                <th>{{$project->title}}</th>
                <th>{{Str::limit($project->comment,25)}}</th>
                <th><img src="{{asset($project->image)}}" width="80px" height="60px"/></th>
                <th>{{AppHelper::instance()->getProgramNameByKey($project->program)}}</th>
                <td>
                    @if(AppHelper::instance()->checkPermisson(9) == 1)
                        <a href="{{route('admin.update-project',$project->id)}}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                    @endif
                    @if(AppHelper::instance()->checkPermisson(10) == 1)
                        <a href="{{route('admin.delete-project',$project->id)}}" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    @endif
                </td>
                <td class="handle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrows-move" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 1.707V5.5a.5.5 0 0 1-1 0V1.707L6.354 2.854a.5.5 0 1 1-.708-.708l2-2zM8 10a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 14.293V10.5A.5.5 0 0 1 8 10zM.146 8.354a.5.5 0 0 1 0-.708l2-2a.5.5 0 1 1 .708.708L1.707 7.5H5.5a.5.5 0 0 1 0 1H1.707l1.147 1.146a.5.5 0 0 1-.708.708l-2-2zM10 8a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 8.5H10.5A.5.5 0 0 1 10 8z"/>
                    </svg>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        $('#projects').sortable({
            handle : '.handle',
            update : function () {
                let order = $('#projects').sortable('serialize');
                $.get("{{ route('admin.sort-projects') }}?"+order, function() {
                    return alert('Sorted Successfully');
                });
            }
        });
    </script>
@endpush
