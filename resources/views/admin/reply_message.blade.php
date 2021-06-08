<x-adminlayout>
    <!-- Material form register -->
    <div class="card">

        <h5 class="card-header purple white-text text-center py-4">
            <strong>Reply Message To User </strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="" style="color: #757575;" action="{{route('post_reply_message')}}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="col">
                        <!-- To User name -->
                        <div class="md-form">
                            <input type="text" id="materialRegisterFormFirstName" value="{{$userInfo->name}}" class="form-control">
                            <label for="materialRegisterFormFirstName">To </label>
                        </div>
                    </div>
                    <div class="col">
                        <!-- Email  -->
                        <div class="md-form">
                            <input type="email" id="materialRegisterFormLastName" value="{{$userInfo->email}}" class="form-control">
                            <label for="materialRegisterFormLastName">Email</label>
                        </div>
                    </div>
                </div>

                <input type="text" hidden id="materialRegisterFormLastName" name="user_id" value="{{$userInfo->id}}" class="form-control">


                <!--From  -->
                <div class="md-form mt-0">
                    <input type="email" id="materialRegisterFormEmail" value="{{auth()->user()->email}}" name="adminEmail" class="form-control">
                    <label for="materialRegisterFormEmail">From Admin</label> @error('adminEmail')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <!--message  -->
                <label for="materialRegisterFormEmail">content</label>

                <div class="md-form mt-0">

                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea> @error('message')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

                </div>




                <!-- Sign up button -->
                <button class="btn btn-outline-purple btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Reply </button>



            </form>
            <!-- Form -->

        </div>

    </div>
    <!-- Material form register -->
</x-adminlayout>