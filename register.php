<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Upson Hall</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- for toggle-->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <img src = "img/cu_logo.png" height = "50" width = "50" style = "padding-top: 5px"></img>
            <a class="navbar-brand topnav" href = "index.html">Upson Energy Control</a>

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">


            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>

        <!-- /.container -->
    </nav>
    <!-- END NAV --> 

    <!-- REGISTER -->
    <!-- LOGIN -->
    <div class = "register">
    <div class="container">

      <form class="form-signin" action='register.php' method='post' accept-charset='UTF-8'>
          <img src = "img/currents-logo.png" height = "120" width = "260" ></img>

          <h4 class="form-signin-heading">Please Register</h4>
        
        <label for="first_name" class="sr-only">First Name</label>
        <input type="text" name ="first_name" id="first_name" class="form-control" placeholder="First Name" required autofocus>
        <br>
        <label for="last_name" class="sr-only">Last Name</label>
        <input type="text" id="last_name" name ="last_name" class="form-control" placeholder="Last Name" required autofocus>
        <br>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name ="email" class="form-control" placeholder="Email address" required autofocus>
        <br>
        <label for="inputRoom" class="sr-only">Room Number</label>
        <input type="text" id="inputRoom" name ="roomnumber" class="form-control" placeholder="Primary Office Room Number" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name ="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword" class="sr-only">Repeat Password</label>
        <input type="password" id="inputPassword" name ="repeatPassword" class="form-control" placeholder="Repeated Password" required>
        <br>
        <button class="btn btn-lg btn btn-default btn-block" name ="submit" type="submit">Register</button>
        <?php
    
            if (isset($_POST['submit'])){
                $firstName=$_POST['first_name'];
                $lastName=$_POST['last_name'];
                $email=$_POST['email'];
                $room=$_POST['roomnumber'];
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                $password2=filter_input(INPUT_POST, 'repeatPassword', FILTER_SANITIZE_STRING);
                $validinput=true;

                if (empty($firstName) || empty($lastName) || empty($email) ||empty($room) || empty($password) ||empty($password2)){
                    $validinput=false;
                    echo "*please enter all the required fields";
                }

                if ($password2!=$password){
                    $validinput=false;
                    echo "Passwords do not match";
                }

                if (!preg_match("/[0-9]+[A-z]*/", $room)){
                    print($room);
                    $validinput=false;
                    echo "please enter a vaild room number";
                }
                if ($validinput){
                    echo "registration complete";
                    Stormpath\Client::$apiKeyFileLocation = '.stormpath/apiKey.properties';
                    $client = Stormpath\Client::getInstance();
                    $application = Stormpath\Resource\Application::get('https://api.stormpath.com/v1/applications/6hxxp8DkvSaOkrMdTgxZ2o');
                    $account = \Stormpath\Resource\Account::instantiate([
                      'givenName' => '$firstName',
                      'surname' => '$lastName',
                      'email' => '$email',
                      'password' => '$password'
                    ]);

                    $account = $application->createAccount($account);
                }

            }
        ?>
      </form>
    </div> 
    <!-- /container -->
    </div>
    <!-- END LOGIN -->
    <!-- END REGISTER -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

