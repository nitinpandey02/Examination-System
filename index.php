<?php
session_start();

$con=mysqli_connect("localhost","root","","examination_system");
if(!isset($con))
{
    die("Database Not Found");
}


if(isset($_REQUEST["u_sub"]))
{
    
 $id=$_POST['u_id'];
 $pwd=$_POST['u_ps'];
 if($id!=''&&$pwd!='')
 {
   $query=mysqli_query($con ,"select * from t_user_data where s_id='".$id."' and s_pwd='".$pwd."'");
   $res=mysqli_fetch_row($query);
   $query1=mysqli_query($con ,"select * from t_user where s_id='".$id."'");
   $res1=mysqli_fetch_row($query1);

   if($res)
   {
    $_SESSION['user']=$id;
    header('location:admsnform.php');
   }
   else
   {
    
    echo '<script>';
    echo 'alert("Invalid username or password")';
    echo '</script>';
   }
   
   if($res1)
   {
    $_SESSION['user']=$id;
    header('location:homepageuser.php');
   }
   else
   {
    
    echo '<script>';
    echo 'alert("Invalid username or password")';
    echo '</script>';
   }
  }
 else
 {
     echo '<script>';
    echo 'alert("Enter both username and password")';
    echo '</script>';
 
 }
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="css/login.css"></link>
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/bootstrap-theme.min.css">
        <script src="bootstrap/jquery.min.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>

       
        <title></title>
        
        
        
    </head>
    <body  style="background-image: linear-gradient(to right, #36486b , #f18973);" >
        <form id="index" action="index.php" method="post">
            
            <div class="container-fluid">    
                <div style="border-style: solid; background-image: linear-gradient(to right, #034f84 , #4040a1);" class="row">
                  <div class="col-sm-12">
                        <h1 style="color:#fefbd8; text-align:center; font-size:50px;"><b>EXAMINATION SYSTEM</b></h1>
                        <!-- <img src="images/cutm.jpg" width="100%" style="box-shadow: 1px 5px 14px #999999; "></img> -->
                  </div>
                </div>    
             
        
            
            
                <div  id="divtop1" style="margin:0px 0px 0px 160px;">
                    
                        <br> <br> <br> <br> <br> <br>
                            <div id="dmain" style="background-image: linear-gradient(to right, #e06377 , #b8a9c9);" > 
                                <!-- <img src="./images/loginuser.png" width="120px" height="100px" ></img> -->
                               
                                  <center style="background-image: linear-gradient(to right, #ff7b25 , #d64161);"><h1><b style="">LOGIN</b></h1></center>                             
                                
                                <br>
                                    <input type="text" id="u_id" name="u_id" class="form-control" style="width:300px; margin-left: 76px;" placeholder="Enter Your User ID"><br>
                                    <input type="password" id="u_ps" name="u_ps" class="form-control" style="width:300px; margin-left: 76px;" placeholder="Enter Your Password"><br>
                                    <input type="submit" id="u_sub" name="u_sub" value="LOGIN" class="toggle btn btn-primary" style="width:100px; margin-left: 170px; font-weight: bold;"><br>
                                    <a href="signup.php" style="margin-left: 190px; color:#4040a1;"><b>SIGN UP</b> </a>
                            </div>
                     </div>
                    </div>
               </div>
            </div>  
            </div>
        </form>  
       </body>
</html>
