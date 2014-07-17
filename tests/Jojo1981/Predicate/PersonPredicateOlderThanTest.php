<?php
/**
 * @category Jojo1981
 * @package Test
 * @subpackage TestLibrary
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace Test\Jojo1981\Predicate;

use Jojo1981\Entity\Person;
use Jojo1981\Predicate\PersonPredicateOlderThan;

/**
 * @category Jojo1981
 * @package Test
 * @subpackage TestLibrary
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Test\Jojo1981\Predicate\PersonPredicateOlderThanTest
 */
class PersonPredicateOlderThanTest extends \PHPUnit_Framework_TestCase
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
     * testPredicateOlderThan30ShouldReturnTrueForTheFirstPerson
     */
    public function testPredicateOlderThan30ShouldReturnTrueForTheFirstPerson()
    {
        $predicate = new PersonPredicateOlderThan(30);

        $this->assertTrue($predicate->apply($this->persons[0]));
        $this->assertFalse($predicate->apply($this->persons[1]));
        $this->assertFalse($predicate->apply($this->persons[2]));
    }

    /**
     * testPredicateOlderThan40ShouldReturnFalseForAllPersons
     */
    public function testPredicateOlderThan40ShouldReturnFalseForAllPersons()
    {
        $predicate = new PersonPredicateOlderThan(40);

        $this->assertFalse($predicate->apply($this->persons[0]));
        $this->assertFalse($predicate->apply($this->persons[1]));
        $this->assertFalse($predicate->apply($this->persons[2]));
    }

    /**
     * testPredicateOlderThan13ShouldReturnTrueForAllPersons
     */
    public function testPredicateOlderThan13ShouldReturnTrueForAllPersons()
    {
        $predicate = new PersonPredicateOlderThan(12);

        $this->assertTrue($predicate->apply($this->persons[0]));
        $this->assertTrue($predicate->apply($this->persons[1]));
        $this->assertTrue($predicate->apply($this->persons[2]));
    }
}
