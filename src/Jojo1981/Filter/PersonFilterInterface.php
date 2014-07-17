<?php
/**
 * @category Jojo1981
 * @package Filter
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace Jojo1981\Filter;

use Jojo1981\Collection\Persons;
use Jojo1981\Predicate\PersonPredicateInterface;

/**
 * @category Jojo1981
 * @package Filter
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Jojo1981\Filter\PersonFilterInterface
 */
interface PersonFilterInterface
{
    /**
     * Filter Persons collection an returned the filtered
     * persons collection
     *
     * @param Persons $persons
     * @return Persons
     */
    public function filter(Persons $persons);

    /**
     * @param PersonPredicateInterface $predicate
     * @return $this
     */
    public function addPredicate(PersonPredicateInterface $predicate);

    /**
     * @param PersonPredicateInterface $predicate
     * @return $this
     */
    public function removePredicate(PersonPredicateInterface $predicate);
}
