<x-adminlayout>

<div class="container">
    
    <div class="row text-center mt-2">

        <table class="table table-hover">
            <thead class="black white-text">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Reply Message</th>
                    <th scope="col">Delete Message</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($messages as $message )
                            <tr>
                    <th scope="row">{{$message->id}}</th>
                    <th scope="row">{{$message->user_id}}</th>
                    <th scope="row">{{$message->name}}</th>
                    <th scope="row">{{$message->email}}</th>
                    <th scope="row">{{$message->message}}</th>


                   
                    <td>
                        <a class="btn btn-sm btn-success" href="{{route('reply_message',$message->user_id)}}">Reply </a>

                    </td>
                    <td>
                        <a class="btn btn-sm btn-danger" href="{{route('delete_message',$message->id)}}">Delete</a>
                    </td>
                </tr>
                
            @endforeach


            </tbody>
        </table>
    </div>
</div>

</x-adminlayout>
