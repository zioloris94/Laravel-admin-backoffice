<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>

<form class="form-horizontal" action='/insert' method="post">
    <fieldset>
        <div id="legend">
            <legend class="">Register</legend>
        </div>
        <?php echo e(csrf_field()); ?>

        <div class="control-group">
             <label class="control-label"  for="username">Name</label>
            <div class="controls">
                <input type="text" id="name" name="name" placeholder="" class="input-xlarge">

            </div>
        </div>

        <div class="control-group">

            <label class="control-label" for="email">E-mail</label>
            <div class="controls">
                <input type="text" id="email" name="email" placeholder="" class="input-xlarge">

            </div>
        </div>

        <div class="control-group">

            <label class="control-label" for="password">Password</label>
            <div class="controls">
                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">

            </div>
        </div>

        <div class="control-group">

            <div class="controls">
                <button type="submit" name="register" value="Add" class="btn btn-success">Register</button>
            </div>
        </div>
    </fieldset>
</form>
