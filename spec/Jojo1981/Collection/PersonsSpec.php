<?php
/**
 * @category spec
 * @package Jojo1981
 * @subpackage Collection
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace spec\Jojo1981\Collection;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Jojo1981\Collection\Persons;
use Jojo1981\Entity\Person;

/**
 * @category spec
 * @package Jojo1981
 * @subpackage Collection
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * @mixin Persons
 *
 * spec\Jojo1981\Collection\PersonsSpec
 */
class PersonsSpec extends ObjectBehavior
{
    /**
     * @var array
     */
    private $invalidData;

    /**
     * @var array
     */
    private $validData;

    function let(
        Person $person1,
        Person $person2,
        Person $person3,
        \ArrayObject $arrayObject
    ) {
        $this->invalidData = array(
            $person1,
            $arrayObject
        );

        $this->validData = array(
            $person1,
            $person2,
            $person3
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Jojo1981\Collection\Persons');
    }

    function it_is_a_traversable()
    {
        $this->shouldImplement('\Traversable');
    }

    function it_should_implement_array_access()
    {
        $this->shouldImplement('\ArrayAccess');
    }

    function it_should_be_countable()
    {
        $this->shouldImplement('\Countable');
    }

    function it_should_return_a_traversable()
    {
        $this->getIterator()->shouldHaveType('\Traversable');
    }

    function it_should_return_zero_when_the_collection_is_empty()
    {
        $this->count()->shouldReturn(0);
    }

    function it_should_return_the_tight_count_when_the_collection_has_some_persons()
    {
        $this->beConstructedWith($this->validData);

        $this->count()->shouldReturn(3);
    }

    function it_should_can_be_constructed_with_an_empty_array()
    {
        $this->beConstructedWith(array());
    }

    function it_should_thrown_an_exception_when_constructing_with_an_array_containing_a_not_person_object()
    {
        $exception = new \InvalidArgumentException(
            'Only Jojo1981\Entity\Person objects can be passed'
        );

        $this->shouldThrow($exception)->during__Construct($this->invalidData);
    }

    function it_should_thrown_an_exception_when_setting_persons_with_an_array_containing_a_not_person_object()
    {
        $exception = new \InvalidArgumentException(
            'Only Jojo1981\Entity\Person objects can be passed'
        );

        $this->shouldThrow($exception)->during('setPersons', array($this->invalidData));
    }

    function it_should_thrown_an_exception_when_adding_persons_with_an_array_containing_a_not_person_object()
    {
        $exception = new \InvalidArgumentException(
            'Only Jojo1981\Entity\Person objects can be passed'
        );

        $this->shouldThrow($exception)->during('addPersons', array($this->invalidData));
    }

    function it_should_thrown_an_exception_when_removing_persons_with_an_array_containing_a_not_person_object()
    {
        $exception = new \InvalidArgumentException(
            'Only Jojo1981\Entity\Person objects can be passed'
        );

        $this->shouldThrow($exception)->during('removePersons', array($this->invalidData));
    }

    function it_should_return_true_when_asserting_if_a_person_exist_when_exists_in_the_collection()
    {
        $this->beConstructedWith($this->validData);

        $this->has($this->validData[0])->shouldReturn(true);
    }

    function it_should_return_false_when_asserting_if_a_person_exist_when_not_exists_in_the_collection(
        Person $person
    ) {
        $this->beConstructedWith($this->validData);

        $this->has($person)->shouldReturn(false);
    }

    function it_should_remove_an_existing_person()
    {
        $this->beConstructedWith($this->validData);
        $this->removePerson($this->validData[0]);

        $this->count()->shouldReturn(2);
    }

    function it_should_remove_an_existing_persons()
    {
        $this->beConstructedWith($this->validData);
        $this->removePersons(array($this->validData[0], $this->validData[2]));

        $this->count()->shouldReturn(1);
    }

    function it_should_add_a_new_person(
        Person $person
    ) {
        $this->beConstructedWith($this->validData);
        $this->addPerson($person);

        $this->count()->shouldReturn(4);
    }

    function it_should_add_a_new_persons(
        Person $person1,
        Person $person2
    ) {
        $this->beConstructedWith($this->validData);
        $this->addPersons(array($person1, $person2));

        $this->count()->shouldReturn(5);
    }

    function it_should_return_count_zero_when_collection_will_be_cleared()
    {
        $this->beConstructedWith($this->validData);
        $this->clear();

        $this->count()->shouldReturn(0);
    }

    function it_should_should_return_an_array_with_all_the_persons_in_the_collection()
    {
        $this->beConstructedWith($this->validData);

        $this->getPersons()->shouldReturn($this->validData);
    }

    function it_should_have_array_access()
    {
        $this->beConstructedWith($this->validData);

        $this->offsetExists(0)->shouldReturn(true);
        $this->offsetExists(1)->shouldReturn(true);
        $this->offsetExists(2)->shouldReturn(true);

        $this->offsetGet(0)->shouldReturn($this->validData[0]);
        $this->offsetGet(1)->shouldReturn($this->validData[1]);
        $this->offsetGet(2)->shouldReturn($this->validData[2]);

        $this[0]->shouldReturn($this->validData[0]);
        $this[1]->shouldReturn($this->validData[1]);
        $this[2]->shouldReturn($this->validData[2]);
    }
}
