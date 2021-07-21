function myValidate() {
    var password = document.getElementById("myInput1").value;
    var confirmPassword = document.getElementById("myInput2").value;

    if (password != confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    else if (password || confirmPassword == ""){ 
        return myValidate(undefined);
    }

    else {
        return true;
    }

}










































