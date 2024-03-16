<div class="links">
    <a href="{{ url('/notice')}}">get post from drive</a>
    </div>
    <h1>POSTS FROM DRIVE</h1>
    @foreach($notices as $post)
    <div class="col-md-4">
    <div class="card" style="width: 50rem;">
    <div class="card-body">
    <h5 class="card-title"> {{$post->title}}</h5>
  
    </div>
    </div>
    </div>


    <div class="content">
        <div class="title m-b-md">
        <a href="{{ url('/login/google') }}">Authentication</a>
        </div>
        </div>
    @endforeach