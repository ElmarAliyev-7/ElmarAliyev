@extends('back.layouts.master')
@section('title','Blogs')
@section('content')

    @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error')}}
        </div>
    @elseif(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
    @endif
    @if(AppHelper::instance()->checkPermisson(16) == 1)
        <a href="{{route('admin.create-blog')}}" class="btn btn-success btn-sm">Create new Blog
        </a> <hr>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Slug</th>
            <th scope="col">Image</th>
            <th scope="col">Video</th>
            <th scope="col">Link</th>
            <th scope="col">Reads</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($blogs as $blog)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$blog->title}}</th>
                <th>{{Str::limit($blog->description, 50)}}</th>
                <th>{{$blog->slug}}</th>
                <th><img src="{{asset($blog->image)}}" width="180px" height="160px"/></th>
                <th><video src="{{asset($blog->video)}}" width="180px" height="160px" controls></video></th>
                <th>{{$blog->link}}</th>
                <th>{{$blog->reads}}</th>
                <td>
                    @if(AppHelper::instance()->checkPermisson(17) == 1)
                        <a href="{{route('admin.update-blog',$blog->id)}}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                    @endif
                    @if(AppHelper::instance()->checkPermisson(18) == 1)
                        <a href="{{route('admin.delete-blog',$blog->id)}}" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
