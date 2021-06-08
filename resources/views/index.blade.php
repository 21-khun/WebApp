<x-pagelayout>

<header></header>

<div class="container">
    <div class="row">

        @foreach ( $posts as $post)

        <div class="col-md-4 mt-5">
            <!-- Card -->
            <div class="card">

                <!-- Card image -->

                <img class="card-img-top " height="450px" src="{{asset('images/posts/'.$post->image)}}"  alt="Card image cap">

                <!-- Card content -->
                <div class="card-body">
                    
                    <h6 class="card-title"><a>Posted By {{$post->user->name}}</a></h6>


                    <!-- Title -->
                    <h4 class="card-title"><a> {{$post->title}}</a></h4>
                    <!-- Text -->
                   
                    </p>
                    <!-- Button -->
                    <a href="{{route('seeMore',$post->id)}}" class="btn btn-primary">See More</a>

                </div>

            </div>
            <!-- Card -->


        </div>
        @endforeach
      
       
      

    </div>
    {{$posts->links()}}
</div>


</x-pagelayout>