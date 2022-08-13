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
    <a href="{{route('admin.add-experience')}}" class="btn btn-success btn-sm">Add new Experience
    </a> <hr>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Company Name</th>
            <th scope="col">Type</th>
            <th scope="col">Duty</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
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
                <th>{{$experience->start}}</th>
                <th>{{$experience->end}}</th>
                <th>
                @if(gettype($experience->work_time) == "NULL")
                    ⛔
                @else
                    @if($experience->work_time == 0)
                        full-time
                    @elseif($experience->work_time == 1)
                        part-time
                    @elseif($experience->work_time == 2)
                        freelance
                    @endif
                @endif
                </th>
                <td>
                    <a href="{{route('admin.delete-exp',$experience->id)}}" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
