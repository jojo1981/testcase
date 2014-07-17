<?php
/**
 * @category Test
 * @package Jojo1981
 * @subpackage Predicate
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * PersonFilterByNameThatStartWithTest PHPUnit tests
 */
namespace Test\Jojo1981\Predicate;

use Jojo1981\Entity\Person;
use Jojo1981\Predicate\PersonPredicateByNameThatStartWith;

/**
 * @category Test
 * @package Jojo1981
 * @subpackage Predicate
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Test\Jojo1981\Predicate\PersonPredicateByNameThatStartWithTest
 */
class PersonPredicateByNameThatStartWithTest extends \PHPUnit_Framework_TestCase
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
     * testPersonPredicateByNameThatStartWithSieShouldOnlyTrueForPersonWithNameSietse
     */
    public function testPersonPredicateByNameThatStartWithSieShouldOnlyReturnTrueForPersonWithNameSietse()
    {
        $predicate = new PersonPredicateByNameThatStartWith('Sie');

        $this->assertFalse($predicate->apply($this->persons[0]));
        $this->assertTrue($predicate->apply($this->persons[1]));
        $this->assertFalse($predicate->apply($this->persons[2]));
    }

    /**
     * testPersonPredicateByNameThatStartWithHanShouldReturnFalseForAllPersons
     */
    public function testPersonPredicateByNameThatStartWithHanShouldReturnFalseForAllPersons()
    {
        $predicate = new PersonPredicateByNameThatStartWith('Han');

        $this->assertFalse($predicate->apply($this->persons[0]));
        $this->assertFalse($predicate->apply($this->persons[1]));
        $this->assertFalse($predicate->apply($this->persons[2]));
    }

    /**
     * testPersonPredicateByNameThatStartWithJShouldReturnTrueForAllPersons
     */
    public function testPersonPredicateByNameThatStartWithJShouldReturnTrueForAllPersons()
    {
        $predicate = new PersonPredicateByNameThatStartWith('J');

        $this->assertTrue($predicate->apply(new Person('Joost', 32)));
        $this->assertTrue($predicate->apply(new Person('Jan', 30)));
        $this->assertTrue($predicate->apply(new Person('Jaap', 25)));
    }
}
