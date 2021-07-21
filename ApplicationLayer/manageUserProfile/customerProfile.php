<?php
    require_once '../../BusinessLayer/controller/manageUserProfileController.php';

    $custID = $_GET['custID'];

    $user = new manageUserProfileController();
    $data = $user->viewCust($custID); 

    if(isset($_POST['update'])){
        $user->updateCust();
    }

    if(isset($_POST['delete'])){
        $user->deleteCust($custID);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Customer Profile</title>
        <link rel="stylesheet" type="text/css" href="ExternalCSS/topnav.css">
            <!----------Togglable Vertical Tabs CSS Here------------>
        <link rel="stylesheet" type="text/css" href="ExternalCSS/tab.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/3cc6771f24.js"></script>
        <style>
            td {
                padding-top: 10px;
                font-size: 18px;
            }
        </style>
    </head>
    <body>
        <div class="topnav">
            <a href="../manageOrder/customerHomePage.php?custID=<?=$_SESSION['custID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 100%; padding-right: 5px;">Homepage</label></a>
            <div class="topnav-right">
                <a href="./customerProfile.php?custID=<?=$_SESSION['custID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>  
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Customer Profile</h3>
        <div style="margin-top: 50px; margin-left: 1em;">
        

            
            <?php 

            //vanilla php code
            foreach($data as $row){
                $_SESSION['custID']=$row['custID'];
                
        ?>

                    <!----------Togglable Vertical Tabs Code Here------------>
                    <div class="tab">
                    <button class="tablinks" onclick="openType(event, 'Details')" id="defaultOpen">User Details</button>
                    <button class="tablinks" onclick="openType(event, 'Address')">Address</button>
                    <button class="tablinks" onclick="openType(event, 'Reset')">Change Password</button>
                    </div>

                    <form action="" method="POST">
                    <div id="Details" class="tabcontent">
                        <p>Username:&emsp;<br>
                        <p><input type="text" name="custusername" value="<?=$row['custusername']?>" readonly></p>

                        <!----------Add Full Name & ID----------->
                        <p>Full name:&emsp;<br>
                        <p><input type="text" name="custfname" value="<?=$row['custfname']?>" required></p>

                        <p>ID No:&emsp;<br>
                        <p><input type="text" name="custidno" value="<?=$row['custidno']?>" required></p>

                        <p>Phone Number:&emsp;&emsp;<br>
                        <input type="text" name="custhpnumber" value="<?=$row['custhpnumber']?>" required></p>

                        <p>Email:<br>
                        <input type="text" name="custemail" value="<?=$row['custemail']?>" required></p>
                    </div>

                    <div id="Address" class="tabcontent">
                        <p>Delivery Line 1:<br>
                        <input type="text" name="custaddress1" value="<?=$row['custaddress1']?>" required></p>

                        <p>Delivery Line 2:<br>
                        <input type="text" name="custaddress2" value="<?=$row['custaddress2']?>" required></p>

                        <p>Delivery Line 3:<br>
                        <input type="text" name="custaddress3" value="<?=$row['custaddress3']?>" required></p>


                        <p>Delivery Line 4:<br>
                        <input type="text" name="custaddress4" value="<?=$row['custaddress4']?>" required></p>

                    </div>

                    <!----------Change Password Content----------->
                    <div id="Reset" class="tabcontent">
                        <p>New Password:<br>
                        <input type="password" name="custpassword" id="myInput1" value=""></p>

                        <p>Confirm New Password:<br>
                        <input type="password" name="custpassword" id="myInput2" value=""></p>
                        <br><br>
                        <input type="checkbox" onclick="myFunction()">Show Password

                    <!----------Show Password JS Here----------->
                    <script src="Script/pass.js"></script>

                    <!----------Show Password Checker JS Here----------->
                    <script src="Script/passchecker.js"></script>

                    </div>

                    
                    <!----------Togglable Vertical Tabs JS Here------------>
                    <script src="Script/tab.js"></script>

                        <td colspan="2" style="text-align: right;">
                        <br>
                            <button type="submit" class="btn btn-danger" name="delete">Delete Profile</button>&emsp;
                            <button type="submit" class="btn btn-primary" name="update" onclick="return myValidate()">Update Profile</button>
                        </td>
                        </center>
                        
                <?php 
            } ?>             
            </form>
        </div>
    </body>
</html>




























































































































































