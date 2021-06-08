<x-adminlayout>
    <!-- Material form register -->
    <div class="card">

        <h5 class="card-header purple white-text text-center py-4">
            <strong>UPDATE USER  </strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5 pt-0">

            <!-- Form -->
            <form class="" style="color: #757575;" action="{{route('post_update_user',$user->id)}}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="col">
                        <!-- To User name -->
                        <div class="md-form">
                            <input type="text" id="materialRegisterFormFirstName" name="userName" value="{{$user->name}}" class="form-control">
                            <label for="materialRegisterFormFirstName">User Name </label>
                        </div>
                    </div>

                </div>



                <!--E-mail  -->
                <div class="md-form mt-0">
                    <input type="email" id="materialRegisterFormEmail" name="email" value="{{$user->email}}" class="form-control">
                    <label for="materialRegisterFormEmail">E-mail</label> @error('adminEmail')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <!-- isAdmin -->
                <label for="materialRegisterFormEmail">Is Admin?</label>
                <div class="md-form mt-0">
                    <select name="isAdmin" class="form-control" id="">
                        <option value="1" {{$user->isAdmin =="1"?"selected": ""}}>True</option>
                        <option value="0" {{$user->isAdmin =="0"? "selected": ""}}>False</option>
                    </select>
                </div>
                <!-- isPremium -->
                <label for="materialRegisterFormEmail">Is Premium?</label>
                <div class="md-form mt-0">
                    <select name="isPremium" class="form-control" id="">
                        <option value="1"  {{$user->isPremium =="1"?"selected": ""}} >True</option>
                        <option value="0" {{$user->isPremium =="0"?"selected": ""}}>False</option>
                    </select>
                </div>





                <!-- Sign up button -->
                <button class="btn btn-outline-purple btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Update </button>



            </form>
            <!-- Form -->

        </div>

    </div>
    <!-- Material form register -->
</x-adminlayout>