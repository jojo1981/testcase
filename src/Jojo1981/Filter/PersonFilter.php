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
use Jojo1981\Entity\Person;
use Jojo1981\Predicate\PersonPredicateInterface;

/**
 * @category Jojo1981
 * @package Filter
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Jojo1981\Filter\PersonFilter
 *
 * Person filter class which can be used by injecting predicates
 * and apply them on a PersonCollection object
 */
class PersonFilter implements PersonFilterInterface
{
    /**
     * @var PersonPredicateInterface[]
     */
    protected $predicates;

    /**
     * {@inheritDoc}
     */
    public function filter(Persons $persons)
    {
        $matchedPersons = new Persons();

        /** @var Person $person */
        foreach ($persons as $person) {
            if ($this->applyPredicates($person)) {
                $matchedPersons[] = $person;
            }
        }

        return $matchedPersons;
    }

    /**
     * {@inheritdoc}
     */
    public function addPredicate(PersonPredicateInterface $predicate)
    {
        $this->predicates[] = $predicate;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removePredicate(PersonPredicateInterface $predicate)
    {
        $index = array_search($predicate, $this->predicates);
        if ($index !== false) {
            unset($this->predicates[$index]);
        }

        return $this;
    }

    /**
     * @param Person $person
     * @return bool
     */
    private function applyPredicates(Person $person)
    {
        foreach ($this->predicates as $predicate) {
            if (!$predicate->apply($person)) {
                return false;
            }
        }

        return true;
    }
}
