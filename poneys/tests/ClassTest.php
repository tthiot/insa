<?php
use PHPUnit\Framework\TestCase;

/**
 * Classe de test 
 */
class ClassTest extends TestCase
{
    public function testTrue(){
        $bool = (2>1);
        $this->assertTrue($bool);
    }
}
?>