<?php


class Bet{

    var $playerId;
    var $fixtureNr;
    var $homeScore;
    var $awayScore;

    function Bet($pId, $fNr, $hS, $aS){
        $this ->playerId= $pId;
        $this -> fixtureNr=$fNr;
        $this ->homeScore=$hS;
        $this ->awayScore=$aS;
    }








        function printId(){

        echo $this->playerId."<br>";
    }
      function printFixture(){

        echo $this->fixtureNr."<br>";
    }
      function printHs(){

        echo $this->homeScore."<br>";
    }
      function printAs(){

        echo $this->awayScore."<br>";
    }

}

////////////////////////////////////////////////////////////////

class Match{
    var $matchId;
    var $fixtureNr;
    var $homeScore;
    var $awayScore;

    function Match($mId, $fNr, $hS, $aS){
        $this->matchId = $mId;
        $this->fixtureNr = $fNr;
        $this->homeScore =$hS;
        $this->awayScore = $aS;



    }





}