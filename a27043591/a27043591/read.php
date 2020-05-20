
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
  <body class="">
    
    <div class="container">
      <div class="alert alert-dark" role="alert">
        <a href="index.php" type="button" class="btn btn-primary btn-md btn-block">Back</a>
      </div>
<?php
        require 'db.php';
        ini_set("display_errors", "off");

       
        $location = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $location_components = parse_url($location);


        if (!$location_components['query']) {
          
          echo("<script>location.href = 'read.php?SCP_ID=0';</script>");
        }        
        parse_str($location_components['query'], $params);

            
        
        $SCP_ID = mysqli_real_escape_string($mysqli,$params['SCP_ID']);
        $_SESSION['scpid'] = $SCP_ID;
        $array = mysqli_query($mysqli,"SELECT * FROM SCP_LIST WHERE SCP_ID=$SCP_ID"); 
        if (mysqli_num_rows($array) > 0) {
          $row = mysqli_fetch_array($array);


                
          if($row["Special_Containment_Procedure"]){
            echo <<<EOL
                <p class="text-justify" >
                <h3 >Special Containment Procedures (SCP-$SCP_ID)</h3>                
                $row[2]
                </p>
                         
EOL;
          
          }

          if($row["Description"]){          
          echo <<<EOL
                <p class="text-justify" >
                <h3 >Description</h3>                
                $row[3]
                </p>
                         
EOL;
          }

          if($row["Reference"]){
          echo <<<EOL
                <p class="text-justify" >
                <h3 >Reference</h3>                
                $row[4]
                </p>
                         
EOL;
          }
          if($row["Addendum"]){
         echo <<<EOL
                <p class="text-justify" >
                <h3 >Addendum</h3>                
                $row[5]
                </p>
                         
EOL;
          }

          if($row["Chronological_History"]){
            echo <<<EOL
                <p class="text-justify" >
                <h3 >Chronological History</h3>                
                $row[6]
                </p>
                         
EOL;
          }

          if($row["Space_Time_Anomalies"]){
          echo <<<EOL
                <p class="text-justify" >
                <h3 >Space Time Anomalies</h3>                
                $row[7]
                </p>
                         
EOL;
          }

          if($row["Additional_Notes"]){
           echo <<<EOL
                <p class="text-justify" >
                <h3 >Additional Notes</h3>                
                $row[8]
                </p>
                         
EOL;
          }
        }

        ?>

