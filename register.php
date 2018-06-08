<?php
session_start();
include('header.php');
include('navBar.php');
include ('slider.php');

    if(isset($_POST['email'])){
        $allOk = true;

        ///////////////////////Poprawnosc nickname//////////////////////////////////
        $nick = $_POST['nick'];
        if((strlen($nick)<3) ||(strlen($nick)>20)){
            $allOk=false;
            $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków";
        }
        if(ctype_alnum($nick)==false){
            $allOk=false;
            $_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr";
        }
        ///////////////////////Poprawnosc email///////////////////////////////////////
        $email=$_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

        if(filter_var($emailB, FILTER_VALIDATE_EMAIL)==false || ($emailB!=$email)){
            $allOk=false;
            $_SESSION['e_email']='Podaj poprawyny email';
        }

        ///////////////////////Poprawnosc hasla///////////////////////////////////////
        $pass=$_POST['password'];
        $pass2=$_POST['password2'];
        if((strlen($pass)<8) || (strlen($pass)>20)){
            $allOk=false;
            $_SESSION['e_pass']='Hasło musi posiadać od 8 do 20 znaków';
        }
        if($pass!=$pass2){
            $allOk=false;
            $_SESSION['e_pass']='Hasła nie są identyczne';
        }
        $passHash = password_hash($pass, PASSWORD_DEFAULT);

        ///////////////////////Check box///////////////////////////////////////

        if(!(isset($_POST['reg']))){
            $allOk=false;
            $_SESSION['e_reg']='Zaakceptuj regulamin';
        }

        ///////////////////////CAPTCHA///////////////////////////////////////
        $secret='6Lf3o0UUAAAAAEViVXCxlTiRihgwSYgxISKCJuMZ';
        $check=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $answ=json_decode($check);

        if($answ->success==false){
            $allOk=false;
            $_SESSION['e_bot']='Jesteś botem?';
        }

        ///////////////////////POLACZENIE DO BAZY///////////////////////////////////////
        require_once 'includes/connect.php';
        mysqli_report(MYSQLI_REPORT_STRICT);


        ///////////////////////MAIL W DB///////////////////////////////////////
        try{
            $connect = new mysqli($host, $db_user, $db_password, $db_name);
            if($connect->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }else{
                $result = $connect->query("SELECT ID FROM USERS WHERE email='$email'");
                if(!$result) throw new Exception(($connect->error));
                $howManyMails = $result->num_rows;
                if($howManyMails>0){
                    $allOk=false;
                    $_SESSION['e_email']='Istnieje konto z takim adresem email';
                }


                $result = $connect->query("SELECT ID FROM USERS WHERE user='$nick'");
                if(!$result) throw new Exception(($connect->error));
                $howManyNicks = $result->num_rows;
                if($howManyNicks>0){
                    $allOk=false;
                    $_SESSION['e_nick']='Istnieje konto z takim nickname';
                }



                if($allOk==true){
                    if($connect->query("INSERT INTO users VALUES (NULL,'$nick','$passHash','$email',0)")){
                        $_SESSION['registerDone']=true;



                    }else{
                        throw new Exception(($connect->error));
                    }
                    $result = $connect->query("SELECT MAX(id) AS id FROM `users`");
                    $row = mysqli_fetch_array($result);
                    $d = $row['id'];
                    $connect->query("INSERT INTO `score` VALUES('$d',99,0);");
                    header("Location: welcome.php");

                }
                $connect->close();
            }


        }
        catch (Exception $e){
            echo "Błąd serwera. Prosimy o rejestrację w innym terminie";
        }





    }//Koniec walidacji


?>
<div>
    <form method="post">

    Nickname: <br> <input type="text" name="nick"/><br>
    <?php
        if(isset($_SESSION['e_nick'])){
            echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
            unset($_SESSION['e_nick']);
        }
    ?>
    E-mail: <br> <input type="text" name="email"/><br>
        <?php
        if(isset($_SESSION['e_email'])){
            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
            unset($_SESSION['e_email']);
        }
        ?>
    Hasło: <br> <input type="password" name="password"/><br>
        <?php
        if(isset($_SESSION['e_pass'])){
            echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
            unset($_SESSION['e_pass']);
        }
        ?>
    Powtórz hasło: <br> <input type="password" name="password2"/><br>
    <label><input type="checkbox" name="reg" /> Akceptuję regulamin</label>
        <?php
        if(isset($_SESSION['e_reg'])){
            echo '<div class="error">'.$_SESSION['e_reg'].'</div>';
            unset($_SESSION['e_reg']);
        }
        ?>
    <div class="g-recaptcha" data-sitekey="6Lf3o0UUAAAAAKNPhJgJsFQR4UY2DLrGg-N5pXM3"></div>
        <?php
        if(isset($_SESSION['e_bot'])){
            echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
            unset($_SESSION['e_bot']);
        }
        ?>
    <br><input type="submit" value="Zarejestruj">


    </form>
</div>
<?php
include('footer.php');
?>