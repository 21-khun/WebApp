<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social App</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <!--  toastr css link -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">


</head>

<body>





  <!--Navbar -->
    <x-navbar/>
    <!--/.Navbar -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-12 mt-5">
                <div class="list-group">

                    <a href="{{route('manage_premium_user')}}" class="list-group-item btn btn-lg  list-group-item-action {{request()->path()==="admin/manage_premium_user"? "active":""}}"> Manage Premium User</a>
                    <a href="{{route('message_box')}}" class="list-group-item btn btn-lg  list-group-item-action  {{request()->path()==="admin/message_box"? "active":""}}">Message Box</a>

                </div>
            </div>
            <div class="col-md-9 col-sm-12 mt-5">
               {{$slot}}

            </div>
        </div>

    </div>




    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
      <!-- toastr js link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    <script>
        @if(Session('message'))
        let message = "{{Session('message')}}";
        toastr.info(message);
        @endif
        @if(Session('error'))
        let message = "{{Session('error')}}";
        toastr.info(message);
        @endif
    </script>
</body>

</html>