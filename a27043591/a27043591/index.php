<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>SCP</title>
  </head>
  <body class="bg-secondary">
    
    <div class="container ">
      <div class=" row p-2 container fixed-bottom mx-auto justify-content-center mb-0 bg-dark text-white">
             <form method="POST" action="" class="form-inline my-2 my-lg-0" >
              <label class="h4 ">Special Containment Procedures</label>
              
                   
          </div>
      <div class="row justify-content-center">
           
          
          <?php
           
            if(isset($_SESSION['user'])){
              $ssuser = $_SESSION['user'];
              echo <<<EOL
                <div class="alert alert-secondary role="alert">
                Welcome: $ssuser 
               <a href="logout.php"  class="btn btn-danger btn-sm ml-2">Logout</a>
              </div>                          
EOL;
            }          
              
?>
      <div class="alert alert-secondary " role="alert">
            
            <a href="create.php"  class="btn btn-success btn-sm float-right">Create New SCP</a>

          </div>
      </div>
      <div class="row justify-content-center">   
            <?php            
            if(isset($_SESSION['msg'])){
              $ssMSG = $_SESSION['msg'];
              echo <<<EOL
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                $ssMSG
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

                           
EOL;
unset($_SESSION['msg']);
            }          
                
            ?>
          
      </div>

      <?php             
              require 'db.php';              

              $result = mysqli_query($mysqli,"SELECT SCP_ID FROM SCP_LIST");             
             
             

              if (mysqli_num_rows($result) > 0) {
                
                while($row = mysqli_fetch_assoc($result)) {
                  $scpidtmp = $row["SCP_ID"];
                  echo <<<EOL
                
                <div class="alert alert-secondary p-0 pt-1 pb-1" role="alert">
                <label class="h5 ml-3">SCP-$scpidtmp</label>
                <a href="read.php?SCP_ID=$scpidtmp"  class="btn btn-success btn-sm float-right ml-1">Read</a>
                <a href="delete.php?SCP_ID=$scpidtmp"  class="btn btn-danger btn-sm float-right ml-1">Delete</a>                
                <a href="update.php?SCP_ID=$scpidtmp"  class="btn btn-warning btn-sm float-right ml-1">Update</a>                
                
                
              </div>               
EOL;
                }
              } else {
                echo "0 results";
              }
                            
    ?>
  

  

    </div>



    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>

    
