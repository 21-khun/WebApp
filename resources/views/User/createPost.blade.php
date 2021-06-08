<x-pagelayout>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4  mt-5">Create Post </h1>


            <!-- Default form contact -->
            <form class=" border border-light p-5" action="{{route('post_create')}}" method="post" enctype="multipart/form-data">

                @csrf

                <!-- Title -->
                <label for="title">Title</label>
                <input type="text" name="title" id="defaultContactFormName" class="form-control mb-4"> @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror

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
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror

                <!-- content -->
                <label for="title">Content</label>

                <textarea name="content" class="form-control mb-4" id="" cols="30" rows="10"></textarea> @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror


                <!-- Send button -->
                <button class="btn btn-outline-purple btn-block" type="submit">Upload Post</button>

            </form>
            <!-- Default form contact -->
        </div>
    </div>
</div>
</x-pagelayout>