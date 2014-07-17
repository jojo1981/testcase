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
 * Jojo1981\Predicate\PersonPredicateInterface
 */
interface PersonPredicateInterface
{
    /**
     * If returned true then the predicate has matched.
     *
     * @param Person $person
     * @return bool
     */
    public function apply(Person $person);
}
