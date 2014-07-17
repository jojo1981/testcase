<?php
/**
 * @category Jojo1981
 * @package Predicate
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace Jojo1981\Predicate;

use Jojo1981\Entity\Person;

/**
 * @category Jojo1981
 * @package Predicate
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Jojo1981\Predicate\PersonPredicateOlderThan
 */
class PersonPredicateOlderThan implements PersonPredicateInterface
{
    /**
     * @var int
     */
    protected $age;

    /**
     * Constructor
     *
     * @param int $age
     */
    public function __construct($age)
    {
        $this->age = $age;
    }

    /**
     * {@inheritDoc}
     */
    public function apply(Person $person)
    {
        return ($person->getAge() > $this->age);
    }
}