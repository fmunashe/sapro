<html>
<head>
    <title>Sapro Registered Users </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0px;
            right: 0px;
            height: 60px;

            /** Extra personal styles **/
            background-color: #014c84;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        header p {
            font-size: 25px;
            margin-top: 8px;
            background-color: #014c84;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 60px;
            font-size: 20px !important;
            color: white;
        !important;

            /** Extra personal styles **/
            background-color: #014c84;
            text-align: center;
            line-height: 35px;
        }

        h4 {
            color: gray;
        }

    </style>
</head>
<body>
{{--<header>--}}
{{--    <p>Larabytes Solutions</p>--}}
{{--</header>--}}

<footer>
    <div style="margin-top: 8px !important">Copyright © <?php echo date("Y"); ?> . All rights reserved.</div>
</footer>
<img src="{{public_path('assets/images/sapro_logo.png')}}" style="margin-left: 10px;" height="170" width="auto">
<h4 class="text-center">{{ $title }} {{$date}}</h4>
<table class="table table-sm table-striped">
    <thead>
    <tr class="text-white" style="background-color: #014c84">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>SaproId</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->type }}</td>
            <td>{{ $user->saproId }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
