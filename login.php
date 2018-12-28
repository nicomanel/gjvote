<?php /* Template Name: CustomPageT1 */ ?>

<?php
    session_start();
    // print_r($_REQUEST);
    if (isset($_REQUEST['userID'])) {
        $_SESSION['userID'] = $_REQUEST['userID'];
        $_SESSION['email'] = $_REQUEST['email'];
        $_SESSION['picture'] = $_REQUEST['picture'];
        $_SESSION['name'] = $_REQUEST['name'];
        $_SESSION['accessToken'] = $_REQUEST['accessToken'];

        exit("success");
    }
?>


<html>
    <head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        var person = { userID: "", name: "", accessToken: "", picture: "", email: ""};

        function logIn() {
            FB.login(function (response) {
                if (response.status == "connected") {
                    person.userID = response.authResponse.userID;
                    person.accessToken = response.authResponse.accessToken;

        
                        FB.api('/me/groups', function (groupData) {
                            console.log("ici");
                            console.log(groupData);
                            $.ajax({
                           url: "https://35.177.149.49/test",
                           method: "POST",
                           data: person,
                           dataType: 'text',
                           success: function (serverResponse) {
                               console.log("la");
                               console.log(`'${serverResponse}'`);
                               if (serverResponse.trim() == "success")
                                  { console.log("c'est un sucess");
                                      window.location = "https://35.177.149.49/";}
                           }
                        });
                        });

        
                }
            }, {scope: 'groups_access_member_info'});
        }

        window.fbAsyncInit = function() {
            FB.init({
                appId            : '769847303362454',
                autoLogAppEvents : true,
                xfbml            : true,
                version          : 'v3.2'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    </head>
    <body>
        <h1>Gilet Jaune</h1>
        <div>
                <form>
                    <input type="button" onclick="logIn()" value="Log In With Facebook">
                </form>
        </div>
    </body>

</html>