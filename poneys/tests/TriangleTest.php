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
            [1,1,-1,'négatif'],
            [-1,-1,-1,'négatif'],           
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
            [T,T,T,'letter instead of int'],
        ];
    }

    public function charProvider(){
        return[
            [':',1,1,'char instead of int'],
            [1,'.',1,'char instead of int'],
            [1,1,'/','char instead of int'],
            [':','.','/','char instead of int'],
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

    public function sum2Equals3Provider(){
        return [
            [2,4,6,'the sum of two sides is equal to the third side'],
            [4,9,5,'the sum of two sides is equal to the third side'],
            [8,4,4,'the sum of two sides is equal to the third side']
        ];
    }

    public function sum2LessThan3Provider(){
        return [
            [3,3,8,'the sum of two sides is less than the third side'],
            [2,5,1,'the sum of two sides is less than the third side'],
            [7,3,3,'the sum of two sides is less than the third side']
        ];
    }

    public function equilateralProvider(){
        return [[5,5,5]];
    }

    public function isocelesProvider(){
        return [
            [3,3,4],
            [7,8,7],
            [5,6,6]
        ];
    }

    public function scaleneProvider(){
        return [
            [3,4,5],
            [3,5,4],
            [5,4,3]
        ];
    }

    /*
    *@dataProvider negativeProvider
     */
    public function testNegatives($a,$b,$c,$expected){
        $triangle = new Triangle($a,$b,$c);
        $this->expectExceptionMessage($expected);
        $triangle->checkValidity();
    }
    
    /*
    *@dataProvider zeroProvider
     */
    public function testZero($a,$b,$c,$expected){
        $triangle = new Triangle($a,$b,$c);
        $this->expectExceptionMessage($expected);
        $triangle->checkValidity();
    }

    /*
    *@dataProvider above9Provider
     */
    public function testAbove9($a,$b,$c,$expected){
        $triangle = new Triangle($a,$b,$c);
        $this->expectExceptionMessage($expected);
        $triangle->checkValidity();
    }

    /*
    *@dataProvider letterProvider
     */
    public function testLetter($a,$b,$c,$expected){
        $triangle = new Triangle($a,$b,$c);
        $this->expectExceptionMessage($expected);
        $triangle->checkValidity();
    }

    /*
    *@dataProvider charProvider
     */
    public function testChar($a,$b,$c,$expected){
        $triangle = new Triangle($a,$b,$c);
        $this->expectExceptionMessage($expected);
        $triangle->checkValidity();
    }

    /*
    *@dataProvider sum2Equals3Provider
     */
    public function testSum2Equals3($a,$b,$c,$expected){
        $triangle = new Triangle($a,$b,$c);
        $this->expectExceptionMessage($expected);
        $triangle->checkValidity();
    }

    /*
    *@dataProvider sum2LessThan3Provider
     */
    public function testSum2LessThan3($a,$b,$c,$expected){
        $triangle = new Triangle($a,$b,$c);
        $this->expectExceptionMessage($expected);
        $triangle->checkValidity();
    }

    /*
    *@dataProvider équilateralProvider
     */
    public function testEquilateral($a,$b,$c){
        $triangle = new Triangle($a,$b,$c);
        $this->assertEquals("équilatéral", $triangle->getType());
    }

    /*
    *@dataProvider isocelesProvider
     */
    public function testIsoceles($a,$b,$c){
        $triangle = new Triangle($a,$b,$c);
        $this->assertEquals("isocèle", $triangle->getType());
    }

    /*
    *@dataProvider scaleneProvider
     */
    public function testScalene($a,$b,$c){
        $triangle = new Triangle($a,$b,$c);
        $triangle = new Triangle($a,$b,$c);
        $this->assertEquals("scalène", $triangle->getType());
    }

}
?>