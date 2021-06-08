<x-adminlayout>

    <div class="container">

        <div class="row text-center mt-2">


            <table class="table table-hover">
                <thead class="black white-text">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">IsAdmin</th>
                        <th scope="col">IsPremium</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><b>{{$user->isAdmin=="0" ? "False" : "True"}}</b></td>
                        <td><b>{{$user->isPremium=="0" ? "False" : "True"}}</b></td>

                        <td><a href="{{route('update_user',$user->id)}}" class="btn btn-sm btn-success">Update</a></td>
                        <td><a href="{{route('delete_user',$user->id)}}" class="btn btn-sm btn-danger">Delete</a></td>

                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-adminlayout>