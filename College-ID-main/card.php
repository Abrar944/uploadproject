
<?php
session_start();
include("db_connect.php");
require "vendor/autoload.php";
if(!isset($_COOKIE['adminid'])&&$_COOKIE['adminemail']){ header('location:index.php');
      exit;}
	

$serial="0001";
$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
$code = $Bar->getBarcode($serial, $Bar::TYPE_CODE_128);
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>card</title>
<style>
  body{
		  	background:#ffffff;
		  }
#bg {
  width: 1000px;
  height: 450px;
 
  margin:60px;
 	float: left; 
 		
}

#id {
  width:250px;
  height:450px;
  position:absolute;
  opacity: 0.88;
font-family: sans-serif;

		  	transition: 0.4s;
		  	background-color: #54eb36;
		  	border-radius: 2%;
		  	border: 1px solid grey;
		}

#id::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url('images/background.png');   /*if you want to change the background image replace logo.png*/
  background-repeat:repeat-x;
  background-size: 250px 450px;
  opacity: 0.2;
  z-index: -1;
  text-align:center;
 
}
.profileimg{
	border-radius: 5px;
	margin-top: 50px;
}
.isl{
	width: 100%;
	height: 25%;
	border-radius: 2%;
}

 .container{
		  	font-size: 12px;
		  	font-family: sans-serif;
		  	height: 250px;
		  	margin-top: 50px;
		  	margin-left:20px;
		   
		  }

		  .container p{
		  	color: white;
		  	font-size: small;
		  }
		 .id-1{
		  	transition: 0.4s;
		  	width:250px;
		  	height:450px;
		  	background: #FFFFFF;
		  	text-align:center;
		  	font-size: 16px;
		  	font-family: sans-serif;
		  	float: left;
		  	margin:auto;		  	
		  	margin-left:270px;
		  	border-radius:2%;

		  	
		  }
}
</style>
	</head>
<?php 
include_once("db_connect.php");

$sqluse ="SELECT * FROM Inorg WHERE id=1 ";
$retrieve = mysqli_query($db,$sqluse);
    $numb=mysqli_num_rows($retrieve); 
	while($foundk = mysqli_fetch_array($retrieve))
	                                     {
                                              $profile= $foundk['pname'];
											  $name = $foundk['name'];
		                                  }
?>
	<body>
		<script type="text/javascript">	
 		
 	window.print();
 </script>
 
      <div id="bg">
            <div id="id">


         <img src="images/ISL.png" alt="Avatar" class="isl"  width="70px" height="70px"> 
<center>
        <?php  
     $idx = $_GET['id'];
      $sqlmember ="SELECT * FROM Users WHERE id='$idx' ";
			       $retrieve = mysqli_query($db,$sqlmember);
				                    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                       $title=$found['Mtitle'];$firstname=$found['Firstname'];$sirname=$found['Sirname'];$rank=$found['Rank'];
                       $id=$found['id'];$dept=$found['Department'];$contact=$found['Email'];
			                $count=$count+1;  $get_time=$found['Time']; $time=time(); $pass=$found['Staffid'];
			              $names=$firstname." ".$sirname;
						  $profile= $found['Picname'];
					 }  	 

             	 	
             	 	if($profile!=""){          
										   echo"<img class='profileimg' src='images/$profile' height='200px' width='100px' alt='' style='border: 1px solid black;'>";	   
									    }
								else{
									echo"<img class='profileimg' src='admin/images/profile.jpg' height='100px' width='80px' alt='' style='border: 1px solid black;'>";	   
														     	
									} 
             	 	 ?>   </center>        

             	 	       <div class="container">
      
<p style="margin-top:2%;display: inline ">Name:</p>
      	<p style="font-weight: bold;margin-top:-4%; display: inline"><?php if(isset($names)){ $namez=$title.' '.$names;echo$namez;} ?></p>
<br>
<br>
<p style="margin-top:1%;display: inline">Rank:</p>
      	<p style="font-weight: bold;margin-top:-4%;display: inline"><?php if(isset($rank)){ echo$rank;} ?></p>
<br>
<br>
 <p style="margin-top:-4%;display: inline">STAFF ID:</p>
        <p style="font-weight: bold;margin-top:-4%; display: inline"><?php if(isset($pass)){ echo$pass;} ?></p>

<br>
<br>
<p style="margin-top:-4%;display: inline">DEARTMENT:</p>
      	<p style="font-weight: bold;margin-top:-4%; display: inline"><?php if(isset($dept)){ echo$dept;} ?></p> 

<br>
<br>
<p style="margin-bottom: 50px;margin-left: 170px;display: inline">Principal</p>
              
      </div>

            </div>
<!--             <div class="id-1">
    	 
                     	 <center><img src="images/malawi.png" alt="Avatar" width="200px" height="175px" >        
       <div class="container" align="center">
      <p style="margin:auto">The bearer whose photograph appears overleaf is a staff of</p>
      	<h2 style="color:#00BFFF;margin-left:2%">THE STATE GOVERNMENT OF MALAWI </h2>
      <p style="margin:auto">If lost and found please return to the nearest police station</p>
        <hr align="center" style="border: 1px solid black;width:80%;margin-top:13%"></hr> 

      	<p align="center" style="margin-top:-2%">Authorised Signature</p>
      		<p> <?php if(isset($code)){ echo$code;}?>
      			</p>
      		 <?php if(isset($name)){ echo"Property of ".$name;}?> </center>
     </div>
</div> -->

        </div>
	</body>
</html>
