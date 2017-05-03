<!doctype html>
<html>
<head>
    <title>Look at me Login</title>
</head>
<body>

<?php echo e(Form::open(array('url' => 'login'))); ?>

<h1>Login</h1>


<?php if(Session::get('loginError')): ?>
    <div class="alert alert-danger"><?php echo e(Session::get('loginError')); ?></div>
<?php endif; ?>

<p>
    <?php echo e($errors->first('email')); ?>

    <?php echo e($errors->first('password')); ?>

</p>

<p>
    <?php echo e(Form::label('email', 'Email Address')); ?>

    <?php echo e(Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com'))); ?>

</p>

<p>
    <?php echo e(Form::label('password', 'Password')); ?>

    <?php echo e(Form::password('password')); ?>

</p>

<p><?php echo e(Form::submit('Submit!')); ?></p>
<?php echo e(Form::close()); ?>


</body>
</html>