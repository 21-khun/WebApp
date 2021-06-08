<x-pagelayout>


    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th scope="col">From</th>
                        <th scope="col">Message</th>
                        <th scope="col">Time</th>
                        <th scope="col">Delete Message</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($mails as $mail )
                    <tr>

                        <td>{{$mail->email}}</td>
                        <td>{{$mail->message}}</td>
                        <td>{{$mail->created_at}}</td>
                        <td><a href="{{route('delete_mail',$mail->id)}}" class="btn btn-sm btn-danger">Delete</a></td>

                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-pagelayout>