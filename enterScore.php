<?php
include_once("header.php");
include_once("slider.php");
include_once("navBar.php");
require("classes.php");
if(!isset($_SESSION['loggedin'])){
    header('Location: index.php');
}

$matchScoreTab = array();
function calculateScore($matchTab, $bet ){

        echo $matchTab->matchId;









}
try{
    require_once 'includes/connect.php';
    $connect = new mysqli($host, $db_user, $db_password, $db_name);
    if($connect->connect_errno!=0){
        throw new Exception(mysqli_connect_errno());
    }else{
        $result = $connect->query("SELECT DISTINCT `FixtureNr` FROM `match`");
        if($result->num_rows>0) {
            $array = array();
            foreach ($result as $id){
                array_push($array, $id['FixtureNr']);
            }
        }
        $connect->close();
    }
}catch (Exception $e){
    echo "Błąd serwera.";
}

if(isset($_POST['0'])){

        $scoreTab=array();
        array_push($scoreTab, $_POST['0'], $_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'], $_POST['5'], $_POST['6'], $_POST['7'], $_POST['8'],
        $_POST['9'], $_POST['10'], $_POST['11'], $_POST['12'], $_POST['13'], $_POST['14'], $_POST['15']);


    try{
        require_once 'includes/connect.php';
        $connect = new mysqli($host, $db_user, $db_password, $db_name);
        if($connect->connect_errno!=0){
            throw new Exception(mysqli_connect_errno());
        }else{
            $a=0;
            for($i=0; $i<sizeof($_SESSION['idm']); $i++){
                $id=$_SESSION['idm'][$i];
                $pid=$_SESSION['playerId'];
                $fid = $_GET['sel'];
                $hs=$scoreTab[$a++];
                $as=$scoreTab[$a++];
                $match = new Match($id,$fid, $hs, $as);
                array_push($matchScoreTab, $match);

                $connect->query("UPDATE `match` SET HomeScore='$hs', AwayScore='$as' WHERE id='$id';");
            }


            echo "Wyniki zostały dodane do bazy<br>";

            ///////////////////////////////////////////////////////obliczanie wyniku///////////////////////////////////

            $result = $connect->query("SELECT id, user FROM `users`");
            if($result->num_rows>0) {
                $playersArray = array();
                foreach ($result as $player){
                    $id = $player['id'];
                    $name = $player['user'];
                    $playersArray[$id] = $name;
                }
            }
            foreach($playersArray as $key => $value)
            {
                $fx = $_GET['sel'];
                $result = $connect->query("SELECT matchId, homeScore, awayScore FROM `bet` WHERE userId='$key' AND fixtureNr='$fx'");
                if($result->num_rows>0) {
                    $playerScore = 0;
                    while($row = $result->fetch_assoc()) {
                        $o = $key;
                        $t = $fx;
                        $tr = $row['homeScore'];
                        $fo = $row['awayScore'];

                        $bet = new Bet($o, $t, $tr, $fo);
                        $playerScore += calculateScore($matchScoreTab, $bet);

                    }

                   }

            }



            $connect->close();
        }


    }
    catch (Exception $e){
        echo "Błąd serwera.";
    }
}



?>

    <select name="fixNr" id="select" onchange="myFn(this.value)">
        <option selected hidden>Wybierz</option>
        <?php
        foreach ($array as $add){
            echo "<option value=\"$add\">$add</option>";
        }
        ?>
    </select>
    <div id="div">
        <form class="addMatches" method="post">
            <?php
            if(isset($_GET['sel'])){
                $idd=array();
                require_once 'includes/connect.php';
                $sel = $_GET['sel'];
                $connect = new mysqli($host, $db_user, $db_password, $db_name);
                $connect->set_charset("utf8");
                if($connect->connect_errno!=0){
                    throw new Exception(mysqli_connect_errno());
                }else{
                    $result = $connect->query("SELECT * FROM `match` WHERE FixtureNr='$sel'");
                    if($result->num_rows>0) {
                        $a=-1;
                        while($row = $result->fetch_assoc()){
                            echo $row['HomeTeam']. "      <input name=".++$a." type=\"number\" min=\"0\" max=\"9\">"." vs "."<input name=".++$a." type=\"number\" min=\"0\" max=\"9\">      ".$row['AwayTeam']."<br>";
                            array_push($idd, $row['id']);


                        }
                        $_SESSION['idm']=$idd;
                        $connect->close();
                        $_SESSION['created']=1;
                    }
                }


            }
            ?>
            <input type="submit">
        </form>
    </div>
    <script>


        function myFn() {
            window.location.href="enterScore.php?sel="+arguments[0];
            console.log(arguments[0]);



        }

    </script>

















<?php
include_once("footer.php");
?>