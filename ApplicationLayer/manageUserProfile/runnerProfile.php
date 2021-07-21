<?php
    require_once '../../BusinessLayer/controller/manageUserProfileController.php';

    $runnerID = $_GET['runnerID'];

    $user = new manageUserProfileController();
    $data = $user->viewRun($runnerID); 

    if(isset($_POST['update'])){
        $user->updateRun();
    }

    if(isset($_POST['delete'])){
        $user->deleteRun($runnerID);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Runner Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <a href="../manageTracking/runnerHomePage.php?runnerID=<?=$_SESSION['runnerID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 100%; padding-right: 5px;">Homepage</label></a>
            <div class="topnav-right">
                <a href="./runnerProfile.php?runnerID=<?=$_SESSION['runnerID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>  
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Runner Profile</h3>
        <div style="margin-top: 50px; margin-left: 1em;">
            
                <?php foreach($data as $row) { 
                    $_SESSION['runnerID']=$row['runnerID'];
                ?>

                <!----------Togglable Vertical Tabs Code Here------------>
                <div class="tab">
                <button class="tablinks" onclick="openType(event, 'Details')"id="defaultOpen">User Details</button>
                <button class="tablinks" onclick="openType(event, 'Vehicles')">Vehicles Information</button>
                <button class="tablinks" onclick="openType(event, 'Location')">Location Information</button>
                <button class="tablinks" onclick="openType(event, 'Bank')">Bank Information</button>
                <button class="tablinks" onclick="openType(event, 'Reset')">Change Password</button>
                </div>

                <form action="" method="POST">
                    <div id="Details" class="tabcontent">
                        <p>Username:&emsp;<br>
                        <input type="text" name="runnerusername" value="<?=$row['runnerusername']?>" readonly></p>

                        <!----------Add Full Name & ID----------->
                       <p>Full name:&emsp;<br>
                       <p><input type="text" name="runnerfname" value="<?=$row['runnerfname']?>" required></p>
                       
                       <p>ID No:&emsp;<br>
                       <p><input type="text" name="runneridno" value="<?=$row['runneridno']?>" required></p>
 
                        <p>Phone Number:&emsp;&emsp;<br>
                        <input type="text" name="runnerhpnumber" value="<?=$row['runnerhpnumber']?>" required></p>

                        <p>Email:<br>
                        <input type="text" name="runneremail" value="<?=$row['runneremail']?>" required></p>
                    </div>

                    <div id="Vehicles" class="tabcontent">
                        <!----------License Number----------->
                        <p>License No:<br>
                        <input type="text" name="licensereg" value="<?=$row['licensereg']?>" required></p>

                        <p>Vehicle Model:<br>
                        <input type="text" name="runnervehiclemodel" value="<?=$row['runnervehiclemodel']?>" required></p>
 
                        <p>Vehicle Plate Number:<br>
                        <input type="text" name="runnervehicleplatenumber" value="<?=$row['runnervehicleplatenumber']?>"required></p>
                    </div>

                    <div id="Location" class="tabcontent">
                        <p>Delivery City:<br>
                        <input type="text" name="runnercity" value="<?=$row['runnercity']?>"required></p>
                    </div>


                    <div id="Bank" class="tabcontent">
                        <!----------Bank Type Selection (Drop Down Box)----------->
                        <p>Bank Type:<br>
                        <select name="runnerbanktype" value="<?=$row['runnerbanktype']?>"required>
                            <option value="islam"<?=$row['runnerbanktype'] == "islam" ? ' selected="selected"' : ''?>>Bank Islam</option>
                            <option value="rakyat"<?=$row['runnerbanktype'] == "rakyat" ? ' selected="selected"' : ''?>>Bank Rakyat</option>
                            <option value="bsn"<?=$row['runnerbanktype'] == "bsn" ? ' selected="selected"' : ''?>>Bank Simpanan Nasional</option>
                            <option value="cimb"<?=$row['runnerbanktype'] == "cimb" ? ' selected="selected"' : ''?>>CIMB</option>                         
                            <option value="maybank"<?=$row['runnerbanktype'] == "maybank" ? ' selected="selected"' : ''?>>Maybank</option>
                        </select></p><br>
  
                        <p>Bank Account Number:<br>
                        <input type="text" name="runnerbankaccountnumber" value="<?=$row['runnerbankaccountnumber']?>"required></p>
                    </div>

                     <!----------Change Password Content----------->
                     <div id="Reset" class="tabcontent">
                         <p>New Password:<br>
                         <input type="password" name="runnerpassword" id="myInput1" value=""></p>
                         <p>Confirm New Password:<br>
                         <input type="password" name="runnerpassword" id="myInput2" value=""></p>
                         <br><br>
                         <input type="checkbox" onclick="myFunction()">&emsp;Show Password

                     <!----------Show Password JS Here----------->
                     <script src="Script/pass.js"></script>

                     <!----------Password Checker JS Here----------->
                     <script src="Script/passchecker.js"></script>

                     </div>
 
                     <!----------Togglable Vertical Tabs JS Here------------>
                     <script src="Script/tab.js"></script>

                        <td colspan="2" style="text-align: right;">
                        <br>
                            <button type="submit" class="btn btn-danger" name="delete">Delete Profile</button>&emsp;
                            <button type="submit" class="btn btn-primary" name="update" onclick="return myValidate()">Update Profile</button>
                        </td>
                <?php } ?>             
            </form>
        </div>
        </center>
    </body>
</html>