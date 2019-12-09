<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Poneys.php';

/**
 * Classe de test de gestion de poneys
 */
class PoneysTest extends TestCase
{
    protected $poneys;
    protected $taillechamp;
    protected $numberPoneys;

    protected function setUp(){
        $this->poneys = new Poneys();
        $this->taillechamp = taillechamp;
        $this->poneys->setCount(numberP);
    }

    protected function tearDown(){
        $this->poneys = null;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testRemovePoneyFromField()
    {
        // // Setup
        // $Poneys = new Poneys();

        // // Action
        // $Poneys->removePoneyFromField(3);

        // // Assert
        // $this->assertEquals(5, $Poneys->getCount());
        $this->poneys->removePoneyFromField(3);
        
        $this->assertEquals(7, $this->poneys->getCount());
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testAddPoneyToField()
    {
        //Setup
        $Poneys = new Poneys();

        //Action
        $Poneys->addPoneyToField(3);

        //Assert
        $this->assertEquals(11, $Poneys->getCount());
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testException()
    {
        //Assert
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('test');

        //Setup
        $Poneys = new Poneys();

        //Action
        $Poneys->addPoneyToField(-3);
    }


    public function removeProvider()
    {
        return [
            [5, 3],
            [0, 8],
            [4, 4],
            [10, -2]
        ];
    }

     /**
     * @dataProvider removeProvider
     */
    public function testRemovePoneyFromFieldFromProvider($number, $expected)
    {

        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->removePoneyFromField($number);

        // Assert
        $this->assertEquals($expected, $Poneys->getCount());
    }


    //mocker la fonction getNames()
    //TODO 
    public function testMockGetNames()
    {
        $poneys = $this->createMock(Poneys::class);

        $this->assertIsArray($poneys->getNames());
    }

    //mocker la fonction getNames()
    //TODO 
    public function testMockGetNames2()
    {
        $names=['Joe','William','Jack','Averell'];

        $this->poneys = $this->getMockBuilder('Poneys')->getMock();
        $this->poneys->expects($this->exactly(1))
            ->method('getNames')
            ->willReturn($names);

        $this->assertEquals($names, $this->poneys->getNames());

        
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIsFieldNotFull(){
        // Setup
        $Poneys = new Poneys();

        // Action
        $bool = $Poneys->isFieldNotFull();

        // Assert
        $this->assertTrue($bool);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testIsFieldFull(){
        // Setup
        $Poneys = new Poneys();
        $Poneys->addPoneyToField(7);

        // Action
        $bool = $Poneys->isFieldNotFull();

        // Assert
        $this->assertFalse($bool);
    }

}
?>
