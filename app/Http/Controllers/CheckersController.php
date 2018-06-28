<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestResult;

class CheckersController extends Controller
{
    private $globalArray;
    private $fourArray = array();

    public function index()
    {
        return view('checkers');
    }

    public function arrayin(Request $request)
    {
        $this -> globalArray = $request->json()->all(); //$checkerArray[x][y] works as expected

        return response()->json($this->fourfinder()); //return JSON $testresult array ($fourArray) as response

    }

    public function fourfinder()
    {
        for ($i = 0; $i < 8; $i++){ //traverse row
            for ($j = 0; $j < 8; $j++){ //traverse column
                if ($this -> globalArray[$i][$j] == "R" || $this -> globalArray[$i][$j] == "B") { //if we are red or black
                    //check for four in every direction
                    $this->north($i, $j);
                    $this->northeast($i, $j);
                    $this->east($i, $j);
                    $this->southeast($i, $j);
                    $this->south($i, $j);
                    $this->southwest($i, $j);
                    $this->west($i, $j);
                    $this->northwest($i, $j);
                }
            }
        }
        return $this -> fourArray; //return current state of our array of $testresults
    }

    /*
     * Comments for North apply to the rest of the coordinates
     */
    public function north($nCoord1, $nCoord2)
    {
        $innerArray = $this -> globalArray; //need global array locally

        if (($nCoord1 - 3) < 0) {  //check that our end coordinates are not out of bounds
            return 0;
        }

        $color = $innerArray[$nCoord1][$nCoord2]; //get the color

        if ($innerArray [$nCoord1 - 1][$nCoord2] == $color && $innerArray [$nCoord1 - 2][$nCoord2] == $color && $innerArray [$nCoord1 - 3][$nCoord2] == $color) //check if color is the same in the desired direction
        {
            array_push($this -> fourArray, ["x" => $nCoord1, "y" => $nCoord2, "color" => $color, "direction" => "N"]); //push onto $fourArray
            return 1;
        }
        return 0; //if we get here we did not get four
    }

    public function northeast($neCoord1, $neCoord2)
    {
        $innerArray = $this -> globalArray;

        if (($neCoord1- 3) < 0 || ($neCoord2 + 3) > 7){
            return 0;
        }

        $color = $innerArray[$neCoord1][$neCoord2];

        if($innerArray [$neCoord1 - 1][$neCoord2 + 1] == $color && $innerArray [$neCoord1 - 2][$neCoord2 + 2] == $color && $innerArray [$neCoord1 - 3][$neCoord2 + 3] == $color)
        {
            array_push($this -> fourArray, ["x" => $neCoord1, "y" => $neCoord2, "color" => $color, "direction" => "NE"]);
            return 1;
        }
        return 0;
    }

    public function east($eCoord1, $eCoord2)
    {
        $innerArray = $this -> globalArray;
        if (($eCoord2 + 3) > 7){
            return 0;
        }

        $color = $innerArray[$eCoord1][$eCoord2];

        if($innerArray [$eCoord1][$eCoord2 + 1] == $color && $innerArray [$eCoord1][$eCoord2 + 2] == $color && $innerArray [$eCoord1][$eCoord2 + 3] == $color)
        {
            array_push($this -> fourArray, ["x" => $eCoord1, "y" => $eCoord2, "color" => $color, "direction" => "E"]);
            return 1;
        }
        return 0;
    }

    public function southeast($seCoord1, $seCoord2)
    {
        $innerArray = $this -> globalArray;
        if (($seCoord1 + 3) > 7 || ($seCoord2 + 3) > 7){
            return 0;
        }

        $color = $innerArray[$seCoord1][$seCoord2];

        if($innerArray [$seCoord1 + 1][$seCoord2 + 1] == $color && $innerArray [$seCoord1 + 2][$seCoord2 + 2] == $color && $innerArray [$seCoord1 + 3][$seCoord2 + 3] == $color)
        {
            array_push($this -> fourArray, ["x" => $seCoord1, "y" => $seCoord2, "color" => $color, "direction" => "SE"]);
            return 1;
        }
        return 0;
    }

    public function south($sCoord1, $sCoord2)
    {
        $innerArray = $this -> globalArray;
        if (($sCoord1 + 3) > 7){
            return 0;
        }

        $color = $innerArray[$sCoord1][$sCoord2];

        if($innerArray [$sCoord1 + 1][$sCoord2] == $color && $innerArray [$sCoord1 + 2][$sCoord2] == $color && $innerArray [$sCoord1 + 3][$sCoord2] == $color)
        {
            array_push($this -> fourArray, ["x" => $sCoord1, "y" => $sCoord2, "color" => $color, "direction" => "S"]);
            return 1;
        }
        return 0;
    }

    public function southwest($swCoord1, $swCoord2)
    {
        $innerArray = $this -> globalArray;
        if (($swCoord1 + 3 > 7) || ($swCoord2 - 3) < 0){
            return 0;
        }

        $color = $innerArray[$swCoord1][$swCoord2];

        if($innerArray [$swCoord1 + 1][$swCoord2 - 1] == $color && $innerArray [$swCoord1 + 2][$swCoord2 - 2] == $color && $innerArray [$swCoord1 + 3][$swCoord2 - 3] == $color)
        {
            array_push($this -> fourArray, ["x" => $swCoord1, "y" => $swCoord2, "color" => $color, "direction" => "SW"]);
            return 1;
        }
        return 0;
    }

    public function west($wCoord1, $wCoord2)
    {
        $innerArray = $this -> globalArray;

        if (($wCoord2 - 3) < 0) {
            echo "in \n";
            return 0;
        }

        $color = $innerArray [$wCoord1][$wCoord2];

        if($innerArray [$wCoord1][$wCoord2 - 1] == $color && $innerArray [$wCoord1][$wCoord2 - 2] == $color && $innerArray [$wCoord1][$wCoord2 - 3] == $color)
        {
            array_push($this -> fourArray, ["x" => $wCoord1, "y" => $wCoord2, "color" => $color, "direction" => "W"]);
            return 1;
        }
        return 0;
    }

    public function northwest($nwCoord1, $nwCoord2)
    {
        $innerArray = $this -> globalArray;
        if (($nwCoord1 - 3) < 0 || ($nwCoord2 - 3) < 0){
            return 0;
        }

        $color = $innerArray[$nwCoord1][$nwCoord2];

        if($innerArray [$nwCoord1 - 1][$nwCoord2 - 1] == $color && $innerArray [$nwCoord1 - 2][$nwCoord2 - 2] == $color && $innerArray [$nwCoord1 - 3][$nwCoord2 - 3] == $color)
        {
            array_push($this -> fourArray, ["x" => $nwCoord1, "y" => $nwCoord2, "color" => $color, "direction" => "NW"]);
            return 1;
        }
        return 0;
    }
}

