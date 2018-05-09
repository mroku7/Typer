<?php


    include('header.php');
    include('navBar.php');
    include ('slider.php');
    require_once 'includes/connect.php';
    mysqli_report(MYSQLI_REPORT_STRICT);



try{
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($connect->connect_errno!=0){
        throw new Exception(mysqli_connect_errno());
    }else{
        $login = $_POST['nick'];
        $password = $_POST['password'];

        $sql= "SELECT * FROM users WHERE user='$login'";

        if($result = $connect->query($sql)){
            $howManyUsers = $result->num_rows;

            if($howManyUsers>0){
                $row = $result->fetch_assoc();

                if(password_verify($password, $row['pass'])) {
                    $_SESSION['loggedin']=true;
                    echo "Udało ci się poprawnie zalogować za chwilę zostaniesz przekierowany do strony głównej";
                    $_SESSION['playerId']= $row['id'];
                    $_SESSION['email']= $row['email'];
                    $_SESSION['admin']= $row['admin'];

                    header( 'refresh: 5; url=index.php' );

                }else{
                    echo "<h2> Haslo nie prawidłowe";
                }


                $result->free();
            }else{
                echo "<h2> Haslo nie prawidłowe";
            }
        }

        $connect->close();
    }


}
catch (Exception $e){
    echo "Błąd serwera. Prosimy o zalogowanie się w innym terminie";
}


include('footer.php');
?>