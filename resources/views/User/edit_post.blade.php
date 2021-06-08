<x-pagelayout>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4  mt-5">Edit Post </h1>


            <!-- Default form contact -->
            <form class=" border border-light p-5" action="{{route('update_post',$post->id)}}" method="post" enctype="multipart/form-data">


                @csrf

                <!-- Title -->
                <label for="title">Title</label>
                <input type="text" name="title" id="defaultContactFormName" value="{{$post->title}}" class="form-control mb-4">

                <div class="mb-3">
                    <img src="{{asset('images/posts/'.$post->image)}}" class="img-fluid" width="400px" height="400px" alt="">
                </div>
                <!-- photo -->
                <label for="title">Photo</label>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>

                </div>


                <!-- content -->
                <label for="content">Content</label>

                <textarea name="content" class="form-control mb-4" id="" cols="30" rows="10">{{$post->content}}</textarea>


                <!-- Send button -->
                <button class="btn btn-outline-purple btn-block" type="submit">Update Post</button>

            </form>
            <!-- Default form contact -->
        </div>
    </div>
</div>
</x-pagelayout>