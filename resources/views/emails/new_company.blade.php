<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New company!</title>
</head>
<body>
<div class="container">
<div class="row create-wrap">
    <div class="col-md-8 col-md-offset-2">
        <div class="text-center">
            <br><br>
            <h2>There is a new company entered!</h2>
            <p>Here is a description of a company below.</p>
            <hr>
        </div>
        <div class="text-center">
            <p><b>Name: </b>{{$companyName}}</p>
            <p><b>Email: </b>{{$companyEmail}}</p>
            <p><b>Website: </b>{{$companyWebsite}}</p>
            <hr>
        </div>
    </div>
</div>
<!--/.row-->
</div>
<!--/.container-->
</body>
</html>
