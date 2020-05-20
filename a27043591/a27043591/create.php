<?php
session_start();
require 'db.php';

    if(isset($_POST['save'])){
      $SCP_text_ID   = mysqli_real_escape_string($mysqli,$_POST['SCPID']);
      $SCP_text    = mysqli_real_escape_string($mysqli,$_POST['SCP_text']);      
      $Addendum = mysqli_real_escape_string($mysqli,$_POST['Addendum_text']);      
      $space    = mysqli_real_escape_string($mysqli,$_POST['Space_text']);
      $Additional = mysqli_real_escape_string($mysqli,$_POST['Additional_text']);
      $Description= mysqli_real_escape_string($mysqli,$_POST['Description_text']);
      $History  = mysqli_real_escape_string($mysqli,$_POST['History_text']);
      $Reference  = mysqli_real_escape_string($mysqli,$_POST['Reference_text']);

      
          if($SCP_text_ID  > 0){
              $query = "INSERT INTO SCP_LIST (SCP_ID,Special_Containment_Procedure,Description,Reference,Addendum, Chronological_History,Space_Time_Anomalies,Additional_Notes) VALUES ($SCP_text_ID,'$SCP_text','$Description','$Reference','$Addendum','$History','$space','$Additional') ";

                if (mysqli_query($mysqli, $query)) {      
                      $_SESSION['msg'] = "Saved:SCP ID-".$SCP_text_ID." ";
                      header('location: index.php');
                }else {
                      $_SESSION['msg'] = "Save Error:".mysqli_error($mysqli);                  
                      header('location: index.php');
                }
          }
          else{
                $_SESSION['msg'] = "Invalid SCP ID (Valid 1 onwards) ";
                header('location: index.php');


          }        
      }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Add New SCP</title>
  </head>
  <body class="bg-secondary">
    
  <div class="container alert-success">
           <div class="alert alert-dark" role="alert">
            <a href="index.php" type="button" class="btn btn-primary btn-md btn-block">Back</a>
          </div>
        
         
          <div class=" row p-2 container fixed-bottom mx-auto justify-content-center mb-0 bg-dark text-white">
             <form method="POST" action="" class="form-inline my-2 my-lg-0" >
              <label ><strong class="mr-2 ">Enter new SCP ID</strong></label>
              <input required="true" class="form-control mr-sm-2" name="SCPID" value="" type="text" placeholder="Input Number" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" name="save" value="true" type="submit">Create </button>
                   
          </div>
             
          
          

   
        <div class="content">
       
              <div class="db_col_divider">
                <div class="alert alert-warning " role="alert">
                  <div class="alert alert-success" role="alert">
                    (1): Special Containment Procedures:
                  </div>

                      <div class="input-group">
                      
                      <textarea required class="form-control"  name="SCP_text"  value="" type="text" aria-label="With textarea" rows="6" ></textarea>
                      </div>

                </div>
                 
              </div>
              <div class="db_col_divider">
                <div class="alert alert-warning " role="alert">
                  <div class="alert alert-success " role="alert">
                     (2): Description:
                  </div>

                      <div class="input-group">
                      
                      <textarea class="form-control"  name="Description_text"  value="" type="text" aria-label="With textarea" rows="6" ></textarea>
                      </div>

                </div>
                 
              </div>

              <div class="db_col_divider">
                <div class="alert alert-warning " role="alert">
                  <div class="alert alert-success " role="alert">
                     (3): Reference:
                  </div>

                      <div class="input-group">
                      
                      <textarea class="form-control"  name="Reference_text"  value="" type="text" aria-label="With textarea" rows="6" ></textarea>
                      </div>

                </div>
                 
              </div>
              <div class="db_col_divider">
                <div class="alert alert-warning " role="alert">
                  <div class="alert alert-success " role="alert">
                     (4): Addendum:
                  </div>

                      <div class="input-group">
                      
                      <textarea class="form-control"  name="Addendum_text"  value="" type="text" aria-label="With textarea" rows="6" ></textarea>
                      </div>

                </div>
                 
              </div>
              <div class="db_col_divider">
                <div class="alert alert-warning " role="alert">
                  <div class="alert alert-success " role="alert">
                     (5):  Chronological History:
                  </div>

                      <div class="input-group">
                      
                      <textarea class="form-control"  name="History_text"  value="" type="text" aria-label="With textarea" rows="6" ></textarea>
                      </div>

                </div>
                 
              </div>
              <div class="db_col_divider">
                <div class="alert alert-warning " role="alert">
                  <div class="alert alert-success " role="alert">
                     (6): Space Time Anomalies:
                  </div>

                      <div class="input-group">
                      
                      <textarea class="form-control"  name="Space_text"  value="" type="text" aria-label="With textarea" rows="6" ></textarea>
                      </div>

                </div>
                 
              </div>

              <div class="db_col_divider">
                <div class="alert alert-warning " role="alert">
                  <div class="alert alert-success " role="alert">
                     (7): Additional Notes:
                  </div>

                      <div class="input-group">
                      
                      <textarea class="form-control"  name="Additional_text"  value="" type="text" aria-label="With textarea" rows="6" ></textarea>
                      </div>

                </div>
                 
              </div>

              



              <div class="db_col_divider">
                <div class="alert alert-success " >
                  
                      <div class="input-group">
                          <br><br>
                      </div>

                </div>
                 
              </div>





            </form>
        </div> <!--  content-->


  </div>  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>