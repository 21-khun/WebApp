<x-authlayout>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5 ">
            <!-- Material form register -->
            <div class="card">

                <h5 class="card-header purple white-text text-center py-4">
                    <strong>Register</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" action="{{route('post_register')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col">
                                <!-- First name -->
                                <div class="md-form">
                                    <input type="text" id="materialRegisterFormFirstName" class="form-control" value="{{old('userName')}}" name="userName">
                                    <label for="materialRegisterFormFirstName">Full name</label> @error('userName')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>

                        <!-- E-mail -->
                        <div class="md-form mt-0">
                            <input type="email" id="materialRegisterFormEmail" class="form-control" value="{{old('email')}}" name="email">
                            <label for="materialRegisterFormEmail">E-mail</label> @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="md-form">
                            <input type="password" id="materialRegisterFormPassword" name="password" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                            <label for="materialRegisterFormPassword">Password</label> @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                        </div>
                        <!--Confirm Password -->
                        <div class="md-form">
                            <input type="password" id="materialRegisterFormPassword" name="password_confirmation" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock">
                            <label for="materialRegisterFormPassword">Confirm Password</label> @error('password_confirmation')
                            <p class="text-danger">{{$message}}</p>
                            @enderror


                        </div>

                        <!-- profile picture -->
                        <label for="materialRegisterFormPassword">Select Picture</label>
                        <div class="md-form">
                            <input type="file" id="materialRegisterFormPassword" name="image" class="form-control" aria-describedby="materialRegisterFormPasswordHelpBlock"> @error('image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror


                        </div>








                        <!-- Sign up button -->
                        <button class="btn btn-outline-purple btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Register</button>


                        <!-- Register -->
                        <p>Already Register ?
                            <a class="purple-text" href="{{route('login')}}">Log in</a>
                        </p>


                    </form>
                    <!-- Form -->

                </div>

            </div>
            <!-- Material form register -->
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</x-authlayout>