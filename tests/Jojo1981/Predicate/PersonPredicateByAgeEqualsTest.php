<?php
/**
 * @category Test
 * @package Jojo1981
 * @subpackage Predicate
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace Test\Jojo1981\Predicate;

use Jojo1981\Entity\Person;
use Jojo1981\Predicate\PersonPredicateByAgeEquals;

/**
 * @category Test
 * @package Jojo1981
 * @subpackage Predicate
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Test\Jojo1981\Predicate\PersonPredicateByAgeEqualsTest
 */
class PersonPredicateByAgeEqualsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $persons;

    /**
     * {@inheritDoc}
     */
    public function setUp()
    {
        $this->persons = array(
            new Person('Joost', 32),
            new Person('Sietse', 30),
            new Person('Pietje', 25)
        );
    }

    /**
     * testPersonPredicateByAgeEquals25ShouldReturnFalseForEveryPersonsAndTrueForTheThirdPerson
     */
    public function testPersonPredicateByAgeEquals25ShouldReturnFalseForEveryPersonsAndTrueForTheThirdPerson()
    {
        $predicate = new PersonPredicateByAgeEquals(25);

        $this->assertFalse($predicate->apply($this->persons[0]));
        $this->assertFalse($predicate->apply($this->persons[1]));
        $this->assertTrue($predicate->apply($this->persons[2]));
    }

    /**
     * testPersonPredicateByAgeEquals40ShouldReturnFalseForEveryPersons
     */
    public function testPersonPredicateByAgeEquals40ShouldReturnFalseForEveryPersons()
    {
        $predicate = new PersonPredicateByAgeEquals(40);

        $this->assertFalse($predicate->apply($this->persons[0]));
        $this->assertFalse($predicate->apply($this->persons[1]));
        $this->assertFalse($predicate->apply($this->persons[2]));
    }
}
