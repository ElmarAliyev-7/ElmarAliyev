@extends('back.layouts.master')
@section('title','Experience & Education')
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
    @if(AppHelper::instance()->checkPermisson(6) == 1)
        <a href="{{route('admin.create-experience')}}" class="btn btn-success btn-sm">Add new Experience
        </a> <hr>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">Type</th>
            <th scope="col">Duty</th>
            <th scope="col">Date</th>
            <th scope="col">Work time</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($experiences as $experience)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$experience->company_name}}</th>
                @if($experience->type == 0)
                    <th class="text-success">Experience</th>
                @elseif($experience->type == 1)
                    <th class="text-primary">Education</th>
                @endif
                <th>{{$experience->duty}}</th>
                <th>{{AppHelper::instance()->formatDate($experience->start,$experience->end)}}</th>
                <th>{{AppHelper::instance()->getWorkTime($experience->work_time)}}</th>
                <td>
                    @if(AppHelper::instance()->checkPermisson(15) == 1)
                        <a href="{{route('admin.update-experience',$experience->id)}}" class="btn btn-primary btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                    @endif
                    @if(AppHelper::instance()->checkPermisson(7) == 1)
                    <a href="{{route('admin.delete-exp',$experience->id)}}" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
