<?php ob_start();session_start();?>

<!doctype html>
<html lang="en">
  <head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/custom.css" rel="stylesheet" >
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Login</title>
  </head>
  <body>
    

<?php
            
            
            if (isset($_POST['username']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'Admin123' && $_POST['password'] == 'Admin123') {
                  $_SESSION['loggedin'] = true;                  
                  $_SESSION['user'] = 'Admin';
                  header("location: index.php");                  
               }else {                  
                  $_SESSION['loggedin'] = false;
                   echo <<<EOL
                 <div class="alert alert-danger" role="alert">
                    username/password  Error!
                  </div>

EOL;
               }
            }
?>
   

  <div class="container ">
    <div class="row ">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto ">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Administration</h5>
            
            <form class="form-signin" method="post" action="">
              <div class="form-label-group">
                <input type="username" id="inputEmail" class="form-control" placeholder="Username " name="username" required autofocus>
                <label for="inputEmail">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Log in</button>
              <hr class="my-4">
              
            </form>
            <p class="text-secondary text-center"> Username: Admin123 <br> Password: Admin123</p>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>