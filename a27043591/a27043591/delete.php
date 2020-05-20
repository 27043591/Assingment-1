<?php
session_start();
require 'db.php';
error_reporting(0);
		
		if(isset($_SESSION['loggedin']) and $_SESSION['user']=='Admin'){

				$location = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$location_components = parse_url($location);
				if (!$location_components['query']) {

				echo("<script>location.href = 'index.php?SCP_ID=2';</script>");
				}        
				parse_str($location_components['query'], $params);                  
				$SCP_ID = mysqli_real_escape_string($mysqli,$params['SCP_ID']);
				$_SESSION['scpid'] = $SCP_ID;



				$query = "DELETE FROM `SCP_LIST` WHERE `SCP_LIST`.`SCP_ID` = $SCP_ID";
				if (mysqli_query($mysqli, $query)) {	    
					    $_SESSION['msg'] = "Deleted: SCP ID-".$SCP_ID;
					    header('location: index.php');
				} else {
					    $_SESSION['msg'] = "Error: " . $query . "<br>" . mysqli_error($mysqli);
				}

		}
		else{
			header("location: login.php");
		}
		

?>