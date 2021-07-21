<?php
    require_once '../../BusinessLayer/controller/manageUserProfileController.php';

    $spID = $_GET['spID'];

    $user = new manageUserProfileController();
    $data = $user->viewSP($spID); 

    if(isset($_POST['update'])){
        $user->updateSP();
    }

    if(isset($_POST['delete'])){
        $user->deleteSP($spID);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Profile</title>
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
            <a href="../manageService/serviceProviderServiceView.php?spID=<?=$_SESSION['spID']?>"><img src="Image/largerlogo.png" width="110px" height="70px"><label style="font-size: 100%; padding-right: 5px;">Homepage</label></a>
            <div class="topnav-right">
                <a href="./serviceProviderProfile.php?spID=<?=$_SESSION['spID']?>"><i class="fa fa-user" aria-hidden="true" style="font-size: 50px; padding-right: 5px; padding-left: 5px; padding-top: 22%; padding-bottom: 22%;"></i></a>
            </div>  
        </div>
        <center>
        <h3 style="margin-left: 1em; margin-top: 1em;text-decoration: underline;">Service Provider Profile</h3>
        <div style="margin-top: 50px; margin-left: 1em;">
                <?php foreach($data as $row) { 
                    $_SESSION['spID']=$row['spID'];
                ?>

                <!----------Togglable Vertical Tabs Code Here------------>
                <div class="tab">
                <button class="tablinks" onclick="openType(event, 'Details')"id="defaultOpen">User Details</button>
                <button class="tablinks" onclick="openType(event, 'Address')">Company Information</button>
                <button class="tablinks" onclick="openType(event, 'Bank')">Bank Information</button>
                <button class="tablinks" onclick="openType(event, 'Reset')">Change Password</button>
                </div>

                <form action="" method="POST">

                <div id="Details" class="tabcontent">
                        <p>Username:&emsp;<br>
                        <input type="text" name="spusername" value="<?=$row['spusername']?>" readonly></p>

                        <p>Phone Number:&emsp;&emsp;<br>
                        <input type="text" name="sphpnumber" value="<?=$row['sphpnumber']?>"required></p>

                        <p>Email:<br>
                        <input type="text" name="spemail" value="<?=$row['spemail']?>"required></p>
                    </div>

                    <div id="Address" class="tabcontent">
                    <!----------Add Company Reg No------------>
                        <p>Registration No:
                        <input type="text" name="regno" value="<?=$row['regno']?>" required></p>

                        <p>Company Name:
                        <input type="text" name="spcompanyname" value="<?=$row['spcompanyname']?>"required></p>

                        <p>Address Line 1:
                        <input type="text" name="spaddress1" value="<?=$row['spaddress1']?>"required></p>

                        <p>Address Line 2:
                        <input type="text" name="spaddress2" value="<?=$row['spaddress2']?>"required></p>

                        <p>Address Line 3:
                        <input type="text" name="spaddress3" value="<?=$row['spaddress3']?>"required></p>

                        <p>Address Line 4:
                        <input type="text" name="spaddress4" value="<?=$row['spaddress4']?>"required></p>
                    </div>

                    
                    <div id="Bank" class="tabcontent">
                        <!----------Bank Type Selection (Drop Down Box)----------->
                        <p>Bank Type:<br>
                        <select name="spbanktype" value="<?=$row['spbanktype']?>"required>
                            <option value="islam"<?=$row['spbanktype'] == "islam" ? ' selected="selected"' : ''?>>Bank Islam</option>
                            <option value="rakyat"<?=$row['spbanktype'] == "rakyat" ? ' selected="selected"' : ''?>>Bank Rakyat</option>
                            <option value="bsn"<?=$row['spbanktype'] == "bsn" ? ' selected="selected"' : ''?>>Bank Simpanan Nasional</option>
                            <option value="cimb"<?=$row['spbanktype'] == "cimb" ? ' selected="selected"' : ''?>>CIMB</option>                      
                            <option value="maybank"<?=$row['spbanktype'] == "maybank" ? ' selected="selected"' : ''?>>Maybank</option>
                        </select></p><br>

                        <p>Bank Account Number:<br>
                        <input type="text" name="spbankaccountnumber" value="<?=$row['spbankaccountnumber']?>"required></p>
                        </div>

                    <!----------Change Password Content----------->
                    <div id="Reset" class="tabcontent">
                        <p>New Password:<br>
                        <input type="password" name="sppassword" id="myInput1" value=""></p>

                        <p>Confirm New Password:<br>
                        <input type="password" name="sppassword" id="myInput2" value=""></p>
                        <br><br>
                        <input type="checkbox" onclick="myFunction()">&emsp;Show Password

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

                <?php } ?>             
            </form>
        </div>
        </center>
    </body>
</html>