<!DOCTYPE html>
<html lang="ko">
<head>
    <title>Global CMS Service</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- JQUERY UI -->
    <script src="js/jquery-ui-1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="js/jquery-ui-1.12.1/jquery-ui.min.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- Custom -->
    <script src="js/main.js"></script>
    <link rel="stylesheet" href="http://bootstrapk.com/examples/signin/signin.css" />
</head>
<body>
    <div class="container">

        <form class="form-signin" id="login_form">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="login_id" class="sr-only">login_id</label>
            <input type="text" id="login_id" class="form-control" placeholder="ID" required="" autofocus="">
            <label for="login_pass" class="sr-only">Password</label>
            <input type="password" id="login_pass" class="form-control" placeholder="Password" required="">            
            <button class="btn btn-lg btn-primary btn-block" onclick="login(); return false;">Sign in</button>
            <p class="pull-left" id="login_support">

            </p>
        </form>
    </div>    
</body>
</html>