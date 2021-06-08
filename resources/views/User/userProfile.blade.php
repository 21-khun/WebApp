<x-pagelayout>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4  mt-5">User Profile </h1>


            <!-- Default form contact -->
            <form class=" border border-light p-5" action="{{route('update_profile')}}" method="post" enctype="multipart/form-data">
                @if(Session('error'))
                <div class="alert alert-danger">
                    {{Session('error')}}
                </div>
                @endif @if(Session('success'))
                <div class="alert alert-success">
                    {{Session('success')}}
                </div>
                @endif @csrf

                <!-- Name -->
                <label for="title">User Name</label>
                <input type="text" id="defaultContactFormName" name="userName" class="form-control mb-4" value="{{auth()->user()->name}}">

                <!-- Email -->
                <label for="title">User Name</label>
                <input type="email" id="defaultContactFormName" name="email" class="form-control mb-4" value="{{auth()->user()->email}}">



                <div class="col-md-4 mb-3">
                    <img src="{{asset('images/profiles/'.auth()->user()->image)}}" class="img-fluid" alt="">
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

                <!-- Old Password -->
                <label for="title">Old Password </label>
                <input type="password" id="defaultContactFormName" name="old_password" class="form-control mb-4">
                <!-- New Password -->
                <label for="title">New Password </label>
                <input type="password" id="defaultContactFormName" name="new_password" class="form-control mb-4">





                <!-- Send button -->
                <button class="btn btn-outline-purple btn-block" type="submit">Update Profile</button>

            </form>
            <!-- Default form contact -->
        </div>
    </div>
</div>
</x-pagelayout>