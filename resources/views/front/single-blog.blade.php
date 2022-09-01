<div class="container">
    <a href="{{route('home')}}">Ana sehife</a>
<h1>{{$blog->title}}</h1>
<p>{{$blog->description}}</p>
<img  src="{{asset($blog->image)}}" width="300px" height="275px"/>
<video src="{{asset($blog->video)}}" controls width="300px" height="275px"></video>
<a href="{{$blog->link}}" target="_blank">link</a>
<p>Baxis sayi {{$blog->reads}}</p>
</div>

