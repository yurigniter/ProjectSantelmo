<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Allowance Tracker</title>
    <link href="<?php echo base_url();?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/css/home.css" type="text/css" rel="stylesheet" />
</head>
<body>  

<div class="login-block">
    <h1>Login</h1>
    <form  method="post" action="<?=base_url('controller/login_validate')?>"class="form-inline">
        <input type="text" name="username"  id="username" placeholder="Username">
        <input type="password" name="password"  id="password" placeholder="Password">
        <button>Submit</button>
    </form>
</div>

<div class="error">
<?php
    if (isset($message))
        echo '<div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>'
        .$message.
        '</div>';
?>
</div>
</body>
</html>
