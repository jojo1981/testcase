<?php
/**
 * @category Test
 * @package Jojo1981
 * @subpackage Service
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * PersonServiceMemory PHPUnit Test file
 */
namespace Test\Jojo1981\Service;

use Jojo1981\Service\PersonServiceMemory;
use Jojo1981\Collection\Persons;
use Jojo1981\Entity\Person;

/**
 * @category Test
 * @package Jojo1981
 * @subpackage Service
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Test\Jojo1981\Service\PersonServiceMemoryTest
 */
class PersonServiceMemoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PersonServiceMemory
     */
    protected $personServiceMemory;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $persons = new Persons();
        $persons[] = new Person('Joost', 32);
        $persons[] = new Person('Sietse', 30);
        $persons[] = new Person('Pietje', 25);

        $this->personServiceMemory = new PersonServiceMemory($persons);
    }

    /**
     * testFindPersonsOlderThanAge30
     */
    public function testFindPersonsOlderThanAge30()
    {
        $personsPOT30 = $this->personServiceMemory->findPersonsOlderThanAge(
            30
        );

        $this->assertInstanceOf('Jojo1981\Collection\Persons', $personsPOT30);
        $this->assertEquals(1, $personsPOT30->count());

        /** @var Person $person */
        $person = $personsPOT30[0];
        $this->assertInstanceOf('Jojo1981\Entity\Person', $person);
        $this->assertEquals('Joost', $person->getName());
        $this->assertEquals(32, $person->getAge());
    }

    /**
     * testFindPersonsOlderThanAge40
     */
    public function testFindPersonsOlderThanAge40()
    {
        $personsPOT30 = $this->personServiceMemory->findPersonsOlderThanAge(
            40
        );

        $this->assertInstanceOf('Jojo1981\Collection\Persons', $personsPOT30);
        $this->assertEquals(0, $personsPOT30->count());
    }

    /**
     * testFindPersonsYoungerThanAge35
     */
    public function testFindPersonsYoungerThanAge35()
    {
        $personsPYT35 = $this->personServiceMemory->findPersonsYoungerThanAge(
            35
        );

        $this->assertInstanceOf('Jojo1981\Collection\Persons', $personsPYT35);
        $this->assertEquals(3, $personsPYT35->count());

        $personsExpecting = array(
            'Joost'  => 32,
            'Sietse' => 30,
            'Pietje' => 25
        );

        $index = 0;
        foreach ($personsExpecting as $personName => $personAge) {
            /** @var Person $person */
            $person = $personsPYT35[$index];
            $this->assertEquals($personName, $person->getName());
            $this->assertEquals($personAge, $person->getAge());
            $index++;
        }
    }

    /**
     * testFindPersonsMatchingAge40
     */
    public function testFindPersonsMatchingAge40()
    {
        $personsM40 = $this->personServiceMemory->findPersonsMatchingAge(40);

        $this->assertInstanceOf('Jojo1981\Collection\Persons', $personsM40);
        $this->assertEquals(0, $personsM40->count());
    }

    /**
     * testFindPersonsMatchingAge30
     */
    public function testFindPersonsMatchingAge30()
    {
        $personsM30 = $this->personServiceMemory->findPersonsMatchingAge(30);

        $this->assertInstanceOf('Jojo1981\Collection\Persons', $personsM30);
        $this->assertEquals(1, $personsM30->count());

        /** @var Person $person */
        $person = $personsM30[0];
        $this->assertInstanceOf('\Jojo1981\Entity\Person', $person);
        $this->assertEquals('Sietse', $person->getName());
        $this->assertEquals(30, $person->getAge());
    }

    /**
     * testFindPersonsByNamesThatStartWithSie
     */
    public function testFindPersonsByNamesThatStartWithSieShouldReturnArrayObjectWithOnePersonObjectWithNameStartingWith()
    {
        $persons = $this->personServiceMemory
            ->findPersonsByNamesThatStartWith('Sie')
        ;

        $this->assertEquals(1, $persons->count());
        $this->assertEquals('Sietse', $persons[0]->getName());
    }

    /**
     * testFindPersonsByNamesThatStartWithKa
     */
    public function testFindPersonsByNamesThatStartWithKaShouldReturnEmptyArrayObjectWhenNoPersonHaveANameStartingWith()
    {
        $persons = $this->personServiceMemory
            ->findPersonsByNamesThatStartWith('Ka')
        ;

        $this->assertEquals(0, $persons->count());
    }
}
