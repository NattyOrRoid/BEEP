<?php
require_once '../../libs/database.php';
session_start();

class manageUserProfileModel{
    //Add Customer  fullname, identification no & password variable
    public $custID, $custusername, $custfname, $custidno, $custhpnumber, $custemail, $custaddress1, $custaddress2, $custaddress3, $custaddress4, $custpassword;
    //Add Service Provider registration no & password variable
    public $spID, $spusername, $sphpnumber, $spemail, $spcompanyname, $regno, $spaddress1, $spaddress2, $spaddress3, $spaddress4, $spbanktype, $spbankaccountnumber, $sppassword;
    //Add Runner  fullname, identification no, license registration & password variable
    public $runnerID, $runnerusername, $runnerfname, $runneridno, $runnerhpnumber, $runneremail, $licensereg, $runnervehiclemodel, $runnervehicleplatenumber, $runnercity, $runnerbanktype, $runnerbankaccountnumber, $runnerpassword;
    
    function viewCustomer(){
        $sql = "select * from customer where custID = :custID";
        $args = [':custID'=>$this->custID];
        return DB::run($sql, $args);
    }

    function updateCustomer(){
        //Add Customer fullname, identification no & password object
        $sql = "update customer set custusername=:custusername, custfname=:custfname, custidno=:custidno, custhpnumber=:custhpnumber, custemail=:custemail, custaddress1=:custaddress1, custaddress2=:custaddress2, custaddress3=:custaddress3, custaddress4=:custaddress4, custpassword=:custpassword where custID = :custID";
        $args = [':custID'=>$this->custID, ':custusername'=>$this->custusername, ':custfname'=>$this->custfname, ':custidno'=>$this->custidno, ':custhpnumber'=>$this->custhpnumber, ':custemail'=>$this->custemail, ':custaddress1'=>$this->custaddress1, ':custaddress2'=>$this->custaddress2, ':custaddress3'=>$this->custaddress3, ':custaddress4'=>$this->custaddress4, ':custpassword'=>$this->custpassword];
        return DB::run($sql, $args);
    }

    function deleteCustomer(){
        $sql = "delete from customer where custID=:custID";
        $args = [':custID'=>$this->custID];
        return DB::run($sql,$args);
    }

    function viewServiceProvider(){
        $sql = "select * from serviceprovider where spID = :spID";
        $args = [':spID'=>$this->spID];
        return DB::run($sql, $args);
    }

    function updateServiceProvider(){
        //Add Service Provider registration no & password object
        $sql = "update serviceprovider set spusername=:spusername, sphpnumber=:sphpnumber, spemail=:spemail,  spcompanyname=:spcompanyname, regno=:regno, spaddress1=:spaddress1, spaddress2=:spaddress2, spaddress3=:spaddress3, spaddress4=:spaddress4, spbanktype=:spbanktype, spbankaccountnumber=:spbankaccountnumber, sppassword=:sppassword where spID = :spID";
        $args = [':spID'=>$this->spID, ':spusername'=>$this->spusername, ':sphpnumber'=>$this->sphpnumber, ':spemail'=>$this->spemail, ':spcompanyname'=>$this->spcompanyname, ':regno'=>$this->regno, ':spaddress1'=>$this->spaddress1, ':spaddress2'=>$this->spaddress2, ':spaddress3'=>$this->spaddress3, ':spaddress4'=>$this->spaddress4, ':spbanktype'=>$this->spbanktype, ':spbankaccountnumber'=>$this->spbankaccountnumber, ':sppassword'=>$this->sppassword];
        return DB::run($sql, $args);
    }

    function deleteServiceProvider(){
        $sql = "delete from serviceprovider where spID=:spID";
        $args = [':spID'=>$this->spID];
        return DB::run($sql,$args);
    }

    function viewRunner(){
        $sql = "select * from runner where runnerID = :runnerID";
        $args = [':runnerID'=>$this->runnerID];
        return DB::run($sql, $args);
    }

    function updateRunner(){
        //Add Runner fullname, identification no, license registration  & password object
        $sql = "update runner set runnerusername=:runnerusername, runnerfname=:runnerfname, runneridno=:runneridno, runnerhpnumber=:runnerhpnumber, runneremail=:runneremail, licensereg=:licensereg, runnervehiclemodel=:runnervehiclemodel, runnercity=:runnercity, runnerbanktype=:runnerbanktype, runnerbankaccountnumber=:runnerbankaccountnumber, runnerpassword=:runnerpassword where runnerID = :runnerID";
        $args = [':runnerID'=>$this->runnerID, ':runnerusername'=>$this->runnerusername, ':runnerfname'=>$this->runnerfname, ':runneridno'=>$this->runneridno, ':runnerhpnumber'=>$this->runnerhpnumber, ':runneremail'=>$this->runneremail, 'licensereg'=>$this->licensereg, ':runnervehiclemodel'=>$this->runnervehiclemodel, ':runnercity'=>$this->runnercity, ':runnerbanktype'=>$this->runnerbanktype, ':runnerbankaccountnumber'=>$this->runnerbankaccountnumber, ':runnerpassword'=>$this->runnerpassword];
        return DB::run($sql, $args);
    }

    function deleteRunner(){
        $sql = "delete from runner where runnerID=:runnerID";
        $args = [':runnerID'=>$this->runnerID];
        return DB::run($sql,$args);
    }

}