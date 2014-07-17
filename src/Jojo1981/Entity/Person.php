<?php
/**
 * @category Jojo1981
 * @package Entity
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace Jojo1981\Entity;

use Jojo1981\Visitor\PersonVisitorInterface;

/**
 * @category Jojo1981
 * @package Entity
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * @SuppressWarnings(PHPMD.UnusedLocalVariable)
 *
 * Jojo1981\Entity\Person
 *
 * Person entity
 */
class Person implements PersonInterface
{
    /**
     * Gender constants
     */
    const PERSON_GENDER_UNKNOWN = 0;
    const PERSON_GENDER_MALE    = 1;
    const PERSON_GENDER_FEMALE  = 2;

    /**
     * @var PersonVisitorInterface
     */
    protected $visitor;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $age;

    /**
     * @var int
     */
    protected $gender;

    /**
     * Constructor
     *
     * @param string $name
     * @param int $age
     * @param int $gender
     */
    public function __construct(
        $name,
        $age,
        $gender = self::PERSON_GENDER_UNKNOWN
    ) {
        $this->setName($name);
        $this->setAge($age);
        $this->setGender($gender);
    }

    /**
     * @param string $name
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $age
     * @return Person
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $gender
     * @return Person
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return bool
     */
    public function isMale()
    {
        return ($this->getGender() === self::PERSON_GENDER_MALE);
    }

    /**
     * @return bool
     */
    public function isFemale()
    {
        return ($this->getGender() === self::PERSON_GENDER_FEMALE);
    }

    /**
     * @return bool
     */
    public function isGenderUnknown()
    {
        return ($this->getGender() === self::PERSON_GENDER_UNKNOWN);
    }

    /**
     * {@inheritDoc}
     */
    public function accept(PersonVisitorInterface $visitor)
    {
        $this->visitor = $visitor;

        return $this->visitor->visit($this);
    }
}
