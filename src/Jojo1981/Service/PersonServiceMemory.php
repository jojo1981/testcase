<?php
/**
 * @category Jojo1981
 * @package Service
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace Jojo1981\Service;

use Jojo1981\Collection\Persons;
use Jojo1981\Filter\PersonFilter;
use Jojo1981\Predicate\PersonPredicateByAgeEquals;
use Jojo1981\Predicate\PersonPredicateByNameThatStartWith;
use Jojo1981\Predicate\PersonPredicateInterface;
use Jojo1981\Predicate\PersonPredicateOlderThan;
use Jojo1981\Predicate\PersonPredicateYoungerThan;

/**
 * @category Jojo1981
 * @package Service
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Jojo1981\Service\PersonServiceMemory
 */
class PersonServiceMemory implements PersonServiceInterface
{
    /**
     * @var Persons
     */
    protected $persons;

    /**
     * Constructor
     *
     * @param Persons $persons
     */
    public function __construct(Persons $persons)
    {
        $this->persons = $persons;
    }

    /**
     * {@inheritDoc}
     */
    public function findPersonsOlderThanAge($age)
    {
        $predicate = new PersonPredicateOlderThan($age);

        return $this->applyPredicate($predicate);
    }

    /**
     * {@inheritDoc}
     */
    public function findPersonsYoungerThanAge($age)
    {
        $predicate = new PersonPredicateYoungerThan($age);

        return $this->applyPredicate($predicate);
    }

    /**
     * @param string $name
     * @return Persons
     */
    public function findPersonsByNamesThatStartWith($name)
    {
        $predicate = new PersonPredicateByNameThatStartWith($name);

        return $this->applyPredicate($predicate);
    }

    /**
     * Get persons with matching age.
     *
     * @param int $age
     * @return Persons
     */
    public function findPersonsMatchingAge($age)
    {
        $predicate = new PersonPredicateByAgeEquals($age);

        return $this->applyPredicate($predicate);
    }

    /**
     * @param PersonPredicateInterface $predicate
     * @return Persons
     */
    protected function applyPredicate(PersonPredicateInterface $predicate)
    {
        $filter = new PersonFilter();
        $filter->addPredicate($predicate);

        return $filter->filter($this->persons);
    }
}
