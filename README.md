# browser-fingerprint

#Instructions

#Step - 1 - Download or clone the repository

#Step - 2 - Include the following scripts inside the head/body of the login page 

           <script src="./js/client.min.js"></script>
           <script src="./js/jquery.min.js"></script>
           <script src="./js/browser-fingerprint.js"></script>
           
#Step - 3 - Modify the config.php file in includes/config.php as below

           //replace the array with your browser fingerprint code
           (To know your browser's fingerprint run my-fingerprint.html)
           
            define(FINGERPRINT, [91846356, 3253375281]);

            //verification failed file url
            define(UNAUTHORIZED_URL, "permission-denied.php"
