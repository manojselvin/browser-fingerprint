/* 
 * @author: Manoj Selvin
 * @description: Generate fingerprint and send to server
 */

//client js initialization
var client = new ClientJS();

//generate fingerprint
let fingerprint = client.getFingerprint();

//send fingerprint to server for verification
$.ajax({
    url: "verify-fingerprint.php",
    type: "POST",
    data: {fingerprint},
    dataType: "json",
    success: (response) => {
        if(response.status === "success"){
            $("#verify-status").text(response.msg);
            console.log("Verified");
            console.log("Show login page");
        }
        else{
            console.log("Verification failed!");
            console.log("Show error page");
            console.log("Redirecting to Error Page")
            window.location.replace(response.response_data.redirect_url);
        }
    }
});

