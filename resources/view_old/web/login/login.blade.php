<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ALIF SANI TRADERS</title>

    <!-- Bootstrap CSS CDN -->

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{url('/')}}/assets/css/style.css">

</head>

<body>
<div class=" text-center loginscreen ">
    <div class="login-box">
        <h3>Welcome to Alif Sani Traders</h3>
        <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
        </p>
        <p>Login in. To see it in action.</p>
        {{Form::open(array('url'=> 'auth/user','method'=>'POST','enctype'=>"multipart/form-data"))}}
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Username" required="">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-primary" href="#">Create an account</a>
        {{Form::close()}}
    </div>
</div>




</body>

</html>