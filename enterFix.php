<?php
include_once("header.php");
include_once("slider.php");
include_once("navBar.php");
if(!isset($_SESSION['loggedin'])){
    header('Location: index.php');
}
if(isset($_POST['fixNr'])){
    try{
        require_once 'includes/connect.php';
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
        $connect->set_charset("utf8");
        if($connect->connect_errno!=0){
            throw new Exception(mysqli_connect_errno());
        }else{
            $allOk=true;

                $fixNr=$_POST['fixNr'];
                $team1=$_POST['team1'];
                $team2=$_POST['team2'];
                $team3=$_POST['team3'];
                $team4=$_POST['team4'];
                $team5=$_POST['team5'];
                $team6=$_POST['team6'];
                $team7=$_POST['team7'];
                $team8=$_POST['team8'];
                $team9=$_POST['team9'];
                $team10=$_POST['team10'];
                $team11=$_POST['team11'];
                $team12=$_POST['team12'];
                $team13=$_POST['team13'];
                $team14=$_POST['team14'];
                $team15=$_POST['team15'];
                $team16=$_POST['team16'];



            if($allOk==true){

                $connect->query("INSERT INTO `match` VALUES (NULL, '$fixNr', '$team1', '$team2', '0', '0');");
                $connect->query("INSERT INTO `match` VALUES (NULL, '$fixNr','$team3','$team4',0,0)");
                $connect->query("INSERT INTO `match` VALUES (NULL, '$fixNr','$team5','$team6',0,0)");
                $connect->query("INSERT INTO `match` VALUES (NULL, '$fixNr','$team7','$team8',0,0)");
                $connect->query("INSERT INTO `match` VALUES (NULL, '$fixNr','$team9','$team10',0,0)");
                $connect->query("INSERT INTO `match` VALUES (NULL, '$fixNr','$team11','$team12',0,0)");
                $connect->query("INSERT INTO `match` VALUES (NULL, '$fixNr','$team13','$team14',0,0)");
                $connect->query("INSERT INTO `match` VALUES (NULL, '$fixNr','$team15','$team16',0,0)");
                echo "Kolejka została dodana do bazy";



            }
            $connect->close();
        }


    }
    catch (Exception $e){
        echo "Błąd serwera.";
    }
}


?>
<div class="inputContainer">
    <form class="addMatches" method="post">
        Numer kolejki <input type="number" min="1" max="30" name="fixNr" class="fixNr"><br>
        Mecz 1. <input type="text" name="team1" class="fixInput"> vs. <input type="text" name="team2" class="fixInput"><br>
        Mecz 2. <input type="text" name="team3" class="fixInput"> vs. <input type="text" name="team4" class="fixInput"><br>
        Mecz 3. <input type="text" name="team5" class="fixInput"> vs. <input type="text" name="team6" class="fixInput"><br>
        Mecz 4. <input type="text" name="team7" class="fixInput"> vs. <input type="text" name="team8" class="fixInput"><br>
        Mecz 5. <input type="text" name="team9" class="fixInput"> vs. <input type="text" name="team10" class="fixInput"><br>
        Mecz 6. <input type="text" name="team11" class="fixInput"> vs. <input type="text" name="team12" class="fixInput"><br>
        Mecz 7. <input type="text" name="team13" class="fixInput"> vs. <input type="text" name="team14" class="fixInput"><br>
        Mecz 8. <input type="text" name="team15" class="fixInput"> vs. <input type="text" name="team16" class="fixInput"><br>
        <input type="submit" value="Zatwierdź" class="inputButton">


    </form>
</div>
<?php
include_once("footer.php");
