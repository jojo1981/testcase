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
 * Jojo1981\Predicate\PersonPredicateByNameThatStartWith
 */
class PersonPredicateByNameThatStartWith implements PersonPredicateInterface
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function apply(Person $person)
    {
        return (strpos($person->getName(), $this->name) === 0);
    }
}
