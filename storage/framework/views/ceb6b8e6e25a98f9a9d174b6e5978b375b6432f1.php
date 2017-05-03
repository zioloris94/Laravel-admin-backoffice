<!DOCTYPE html>
<html>
<head>


    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
</head>
<body>
<center>
    <form action="/loginme" method="post" >
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        EMAIL : <input type="text" name="email"><br/>
        PASSWORD : <input type="password" name="password"><br/>
        <input type="submit" name="login" value="Login">
    </form>

</center>
</body>
</html>