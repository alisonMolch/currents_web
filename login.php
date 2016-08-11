<!doctype html>
<html>

<?php
/*function check_password(){
    require_once('config.php');
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $hashed_password = hash('sha256', $password);
    $user_result= $mysqli->query("SELECT * FROM Admin WHERE username='$username'");
    $user = $user_result->fetch_row();
    if($user[2] == $hashed_password){
        $_SESSION['logged_user']=$username;
    }
    else {
        echo "The username or password you entered was incorrect";
    }
    unset($user);
    $mysqli->close();
}
    check_password();*/
    //for now, just set the session variable.
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $_SESSION['logged_user']=$username;

    ?>




<body>

<?php 
    if(isset($_SESSION['logged_user'])){
    //redirect to home page with correct DB
}
else{
    //redirect to login page

    ?>
<?php
}
?>


</body>

</html>