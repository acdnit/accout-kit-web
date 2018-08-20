<!DOCTYPE html>
<html>

<head>
    <title></title>
    <!-- HTTPS required. HTTP will give a 403 forbidden response -->
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
    <link rel="shortcut icon" href="ak-icon.png">
    <link rel="stylesheet" href="css.css">
</head>

<body>
    <h1 class="ac">Login with Account Kit</h1>
    <h4 class="ac" id="code"></h4>
    <div class="buttons">
        <button onclick="smsLogin();">Login via SMS</button>
        <!-- <button onclick="emailLogin();">Login via Email</button> -->
    </div>
    <script>
    // initialize Account Kit with CSRF protection
    AccountKit_OnInteractive = function() {
        AccountKit.init({
            appId: "866176276915925",
            state: "acdnit",
            version: "v1.1",
            fbAppEventsEnabled: true
        });
    };

    // login callback
    function loginCallback(response) {
        if (response.status === "PARTIALLY_AUTHENTICATED") {
            document.getElementById("code").innerHTML = response.code;
            // Send code to server to exchange for access token
        } else if (response.status === "NOT_AUTHENTICATED") {
            // handle authentication failure
        } else if (response.status === "BAD_PARAMS") {
            // handle bad parameters
        }
    }

    // phone form submission handler
    function smsLogin() {
        AccountKit.login('PHONE', { countryCode: "+84" }, loginCallback);
    }


    // email form submission handler
    function emailLogin() {
        AccountKit.login('EMAIL', {},loginCallback);
    }
    </script>    
    <script>
        function loginCallback(response) {
            if (response.status === "PARTIALLY_AUTHENTICATED") {
                document.getElementById("code").innerHTML = response.code;
            }
        }
    </script>
</body>

</html>