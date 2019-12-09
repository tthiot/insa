<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Triangle.php';

/**
 * Classe de test de gestion de poneys
 */
class TriangleTest extends TestCase
{
    public function negativeProvider()
    {
        return [
            [-1,1,1,'négatif'],
            [1,-1,1,'négatif'],
            [1,1,-1,'négatif']            
        ];
    }

    public function zeroProvider(){
        return[
            [0,1,1,'nul'],
            [1,0,1,'nul'],
            [1,1,0,'nul'],
            [1,0,0,'nul'],
            [0,1,0,'nul'],
            [0,0,1,'nul'],
            [0,0,0,'nul']
        ];
    }

    public function above9Provider(){
        return[
            [10,1,1,'trop grand'],
            [1,11,1,'trop grand'],
            [1,1,12,'trop grand'],
            [15,15,15,'trop grand'],
        ];
    }

    public function letterProvider(){
        return[
            [T,1,1,'letter instead of int'],
            [1,T,1,'letter instead of int'],
            [1,1,T,'letter instead of int'],
        ];
    }

    public function charProvider(){
        return[
            [':',1,1,'char instead of int'],
            [1,'.',1,'char instead of int'],
            [1,1,'/','char instead of int'],
        ];
    }

    public function lessThanThreeProvider(){
        return [[1,2],'not enough arguments'];
    }

    public function moreThanThreeProvider(){
        return [[2,4,5,8,'too many arguments']];
    }

    public function combinationProvider(){
        return [
            ["1A",3,4,'combination of inputs'],
            [4,"/W",8,'combination of inputs'],
            [2,4,':','combination of inputs']
        ];
    }

}
?>