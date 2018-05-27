
<div id="navBar">
    <ul>
        <?php
        include_once("includes/arrays.php");
        foreach ($navItems as $item){
            echo "<li class=\"navBar\"><a href=\"".$item['link']."\">".$item['title']."</a></li>";
        }

        if(isset($_SESSION['loggedin'])){
            if($_SESSION['admin']==1) {
                echo "<span class=\"navBarLogin\" onclick=\"enterMatch()\">Wprowadź kolejkę</span>";
                echo "<li class=\"navBar\"><a href=\"enterScore.php\">Wprowadź wynik</a></li>";
            }
            echo "<span class=\"navBarLogin\" onclick=\"logout()\">Wyloguj</span>";
        }else{
            echo "<span class=\"navBarLogin\" onclick=\"openNav()\">Zaloguj</span>";
        }

?>
    </ul>


</div>



