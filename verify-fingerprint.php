<?php
include "./includes/config.php";

function verifyFingerprint($fingerprint){
    //match fingerprint with db
    
    $verifyStatus = in_array($fingerprint, FINGERPRINT);
    
    if($verifyStatus){
        //verified
        return true;
    }
    else{
        //unverified
        return false;
    }
}

function displayResponse($status, $msg, $response_data=[]) {
    //response headers
    header("Content-Type: application/json");
    
    $response = array(
        "status" => $status,
        "msg" => $msg,
        "response_data" => $response_data
    );
    
    //display response
    echo json_encode($response);
}


if(isset($_REQUEST['fingerprint'])){
    //convert array to variables
    extract($_REQUEST);
    
    if(verifyFingerprint($fingerprint)){
        //verified
        displayResponse("success", "Verification Successful");
    }
    else{
        //unverified
        $response_data = array(
            "redirect_url" => "permission-denied.php"
        );
        
        displayResponse("error", "Verification Failed", $response_data);
    }
    
}
else{
    //unverified
    $response_data = array(
        "redirect_url" => "permission-denied.php"
    );

    displayResponse("error", "Verification Failed", $response_data);
}

?>
