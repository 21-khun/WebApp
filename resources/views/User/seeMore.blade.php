<x-pagelayout>
<div class="container">
    <h4 class="purple-text mt-5 mb-5 ">Posted By {{$post->user->name}}</h4>

    <div class="row">

        <div class="col-md-5 ">
            <img src="{{asset('images/posts/'.$post->image)}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-5 mt-4">
            <h1 class="purple-text">CONTENT</h1>
            <hr>
            <h2>{{$post->title}}</h2>
            <p>{{$post->content}}</p>
        </div>
        @can('roleCheck')
        <div class="col-md-2 mt-5"><br><br><br>
            <a href="{{route('edit_post',$post->id)}}" class="btn btn-lg btn-info">Edit </a>
            <a href="{{route('delete_post',$post->id)}}" class="btn btn-lg btn-danger">Delete </a>
        </div>
        @endcan
    </div>
</div>
</x-pagelayout>