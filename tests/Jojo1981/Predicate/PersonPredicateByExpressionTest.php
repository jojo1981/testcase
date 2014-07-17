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
use Jojo1981\Predicate\PersonPredicateByExpression;

/**
 * @category Test
 * @package Jojo1981
 * @subpackage Predicate
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Test\Jojo1981\Predicate\PersonPredicateByExpressionTest
 */
class PersonPredicateByExpressionTest extends \PHPUnit_Framework_TestCase
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
     * test predicate apply should return true
     */
    public function testPredicateApplyShouldReturnTrue()
    {
        $predicate = new PersonPredicateByExpression(
            'Person.getName() == "Sietse" & Person.getAge() == 30'
        );
        $this->assertTrue($predicate->apply($this->persons[1]));

        $predicate->setExpression(
            'Person.getName() == "Joost" & Person.getAge() != 30'
        );
        $this->assertTrue($predicate->apply($this->persons[0]));
    }

    /**
     * test predicate apply should return false
     */
    public function testPredicateApplyShouldReturnFalse()
    {
        $predicate = new PersonPredicateByExpression(
            'Person.getName() == "Joost"'
        );
        $this->assertFalse($predicate->apply($this->persons[1]));

        $predicate->setExpression(
            'Person.getAge() == 30'
        );
        $this->assertFalse($predicate->apply($this->persons[0]));
    }
}
 