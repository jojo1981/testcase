<?php
/**
 * @category Jojo1981
 * @package Collection
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace Jojo1981\Collection;

use Jojo1981\Entity\Person;

/**
 * @category Jojo1981
 * @package Collection
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * @SuppressWarnings(PHPMD.TooManyMethodsUnusedLocalVariable)
 *
 * Jojo1981\Collection\Persons
 *
 * Persons collection class which is a collection of Person objects and is
 * iteratable, countable and provide array access.
 * In JAVA this is much easier to write because of the concept Generics.
 */
class Persons implements \IteratorAggregate, \ArrayAccess, \Countable
{
    /**
     * @var Person[]
     */
    private $persons;

    /**
     * Constructor
     *
     * @param Person[] $persons [optional]
     */
    public function __construct(array $persons = array())
    {
        $this->setPersons($persons);
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->persons);
    }

    /**
     * Return true if Person exists in this collection
     * otherwise return false.
     *
     * @deprecated
     * @param Person $person
     * @return bool
     */
    public function contains(Person $person)
    {
        return $this->has($person);
    }

    /**
     * @param Person[] $persons
     * @return $this
     */
    public function setPersons(array $persons)
    {
        $this->persons = array();

        return $this->addPersons($persons);
    }

    /**
     * @return Person[]
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * @param Person[] $persons
     * @return $this
     */
    public function addPersons(array $persons)
    {
        $this->testPersons($persons);
        array_walk($persons, array($this, 'addPerson'));

        return $this;
    }

    /**
     * Check if the passed person exists in this collection
     *
     * @param Person $person
     * @return bool
     */
    public function has(Person $person)
    {
        return array_search($person, $this->persons) !== false;
    }

    /**
     * @param Person $person
     */
    public function addPerson(Person $person)
    {
        $this->persons[] = $person;
    }

    /**
     * @param Person $person
     * @return $this
     */
    public function removePerson(Person $person)
    {
        $index = array_search($person, $this->persons);
        if ($index !== false) {
            unset($this->persons[$index]);
        }

        return $this;
    }

    /**
     * @param array $persons
     * @return $this
     */
    public function removePersons(array $persons)
    {
        $this->testPersons($persons);
        array_walk($persons, array($this, 'removePerson'));

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->persons[$offset]);
    }

    /**
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        return isset($this->persons[$offset])
            ? $this->persons[$offset]
            : null;
    }

    /**
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->persons[] = $value;
        } else {
            $this->persons[$offset] = $value;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function offsetUnset($offset)
    {
        unset($this->persons[$offset]);
    }

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return count($this->persons);
    }

    /**
     * Delete all persons from this collection
     */
    public function clear()
    {
        $this->persons = array();
    }

    /**
     * @param object[] $persons
     */
    private function testPersons(array $persons)
    {
        foreach ($persons as $person) {
            $this->testPerson($person);
        }
    }

    /**
     * @param object $object
     * @throws \InvalidArgumentException
     */
    private function testPerson($object)
    {
        if (!$object instanceof Person) {
            throw new \InvalidArgumentException(
                'Only Jojo1981\Entity\Person objects can be passed'
            );
        }
    }
}
