<html>
<head>
    <title>New Client Request</title>
    <style>

        .parent {
            display: grid;
            grid-template-rows: 50px 2fr 50px;
            border: 1px solid #014c84;
            width: 100%;
        }

        .header, .footer {
            background-color: #014c84;
            color: white;
            text-align: center;
        }

        .footer {
            padding-top: 15px;
        }

        .body {
            margin: 50px;
        }
    </style>
</head>
<body>
<div class="parent">
    <div class="header">
        <h4 class="">New Client Request</h4>
    </div>
    <div class="body">
        <p>Good day {{$user->name ." ".$user->surname}},</p>

        <p>Please note that {{$data->client->name??""}}  {{$data->client->surname??""}} has created a new request
            below.</p>

        <p>{{$data->description}}</p>

        <p>Regards </p>
        <p>
            {{Config('app.name')}}
        </p>
    </div>
    <div class="footer">
        Copyright © <?php echo date("Y"); ?> . All rights reserved.
    </div>
</div>

</body>
</html>
