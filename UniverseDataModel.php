<?php
/*
 * MODEL
 */
/**
 * Universe Data Model. This class takes a given universe array and returns its next state as an array.
 * 
 * Property: $initialArray-- private array. 
 * 
 * Functions:   getLength()--returns length of $initialArray
 *              returnNextState()--returns the array of the next state of the universe
 *              getNextCellState()--returns the next state of an individual cell in the array
 *              getNumLiveNeighbors()--calculates number of live neighbors of a given cell
 *
 * Author:  Elizabeth Avery
 * Date:    05/02/2017
 */
class UniverseDataModel {
   
    private $initialArray = [];    
    
    public function __construct($initialArray){
        $this->initialArray = $initialArray;
    }
    
    function getLength(){
        return count($this->initialArray);
    }
    
    public function returnNextState(){
        $len = $this->getLength();
        $nextState = [];
        for ($i = 0; $i < $len; $i++){
            for ($j = 0; $j < $len; $j++){
                $nextState[$i][$j] = $this->getNextCellState($i, $j, $this->initialArray[$i][$j]);
            }
        }
        return $nextState;
    }
    
    function getNextCellState($i, $j, $initState){
        $numLiveNeighbors = $this->getNumLiveNeighbors($i, $j, $initState);
        if ($initState == 1){
            if ($numLiveNeighbors < 2){
                $nextCellState = 0;
            }
            else if ($numLiveNeighbors > 3){
                $nextCellState = 0;
            }
            else{
                $nextCellState = 1;
            }
        }        
        else{
            if ($numLiveNeighbors == 3){
                $nextCellState = 1;
            }
            else {
                $nextCellState = 0;
            }
        }        
        return $nextCellState;
    }
    
    function getNumLiveNeighbors($i, $j, $initState){
        $numLiveNeighbors = 0;
        for ($a = $i - 1; $a < $i + 2; $a++){
            for ($b = $j - 1; $b < $j + 2; $b++){
                if (isset($this->initialArray[$a][$b])){
                    if ($this->initialArray[$a][$b] == 1){
                        $numLiveNeighbors++;
                    }              
                }                               
            }
        }
        //subtract one live neighbor if the cell itself is live
        if ($initState == 1){
             $numLiveNeighbors--;
        }
        return $numLiveNeighbors;
    }
}
