<?php

    include('db.php');

    session_start();

    if (!empty($_SESSION['login_user'])) {
        header('Location: home.php');
    }

?>
<!doctype html>
<html>
    <head>
        <title>[ Soaicl Network ]</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" type="text/css" />
    </head>
    <style>

        body {
            padding-top: 20px;
        }

        input {
            margin: 10px;
        }

        #error {
            margin-bottom: 20px;
        }

    </style>
    <body>

        <div class="container">
            <form action="" method="POST">
                <div id="error">
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" />
                <input type="password" class="form-control" id="password" placeholder="Password" />
                <input type="submit" class="btn btn-primary" value="Log In" id="login" />
                <br />
                <br />
            </form>
        </div>

        <script src="//code.jquery.com/jquery-1.8.3.js"></script>
        <script src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

        <script type="text/javascript">

            $(document).ready(function() {
                $("#login").click(function() {
                    var username = $("#username").val();
                    var password = $("#password").val();
                    var datastring = 'username=' + username + "&password=" + password;

                    if ($.trim(username).length > 0 && $.trim(password).length > 0) {
                        $.ajax({
                            type: "POST",
                            url: "ajaxLogin.php",
                            data: datastring,
                            cache: false,
                            beforeSend: function() { $("#login").val('Connecting...'); },
                            success: function(data) {
                                //alert(datastring);
                                if (data) {
                                    window.location.href = "home.php";
                                } else {
                                    $("#login").val("Log In");
                                    $("#error").html("<span class='alert alert-danger'>There Was An Error Logging You In</span>")
                                }
                            }
                        });
                    } else {
                        $("#login").val("Log In");
                        $("#error").html("<span class='alert alert-danger'>Please Fill In All Fields</span>");
                    }
                    return false;
                });
            });

        </script>

    </body>
</html>
