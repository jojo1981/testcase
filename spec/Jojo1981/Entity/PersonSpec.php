<?php
/**
 * @category spec
 * @package Jojo1981
 * @subpackage Entity
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace spec\Jojo1981\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Jojo1981\Entity\Person;
use Jojo1981\Visitor\PersonVisitorInterface;

/**
 * @category spec
 * @package Jojo1981
 * @subpackage Entity
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * @mixin Person
 *
 * spec\Jojo1981\Entity\PersonSpec
 */
class PersonSpec extends ObjectBehavior
{
    /**
     * @var string
     */
    private $name = 'Joost';

    /**
     * @var int
     */
    private $age = 33;

    function let()
    {
        $this->beConstructedWith($this->name, $this->age);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Jojo1981\Entity\Person');
    }

    function it_should_be_a_person()
    {
        $this->shouldImplement('Jojo1981\Entity\PersonInterface');
    }

    function it_should_return_the_right_name_set_by_the_constructor()
    {
        $this->getName()->shouldReturn($this->name);
    }

    function it_should_return_the_right_name_after_using_the_setter()
    {
        $this->setName('Sietse');
        $this->getName()->shouldReturn('Sietse');
    }

    function it_should_return_the_right_age_set_by_the_constructor()
    {
        $this->getAge()->shouldReturn($this->age);
    }

    function it_should_return_the_right_age_after_using_the_setter()
    {
        $this->setAge(31);
        $this->getAge()->shouldReturn(31);
    }

    function it_should_return_gender_unknown_because_this_is_not_set()
    {
        $this->getGender()->shouldReturn(Person::PERSON_GENDER_UNKNOWN);
    }

    function it_should_return_the_gender_after_using_the_setter()
    {
        $this->setGender(Person::PERSON_GENDER_MALE);
        $this->getGender()->shouldReturn(Person::PERSON_GENDER_MALE);
    }

    function it_should_be_a_male()
    {
        $this->setGender(Person::PERSON_GENDER_MALE);
        $this->isMale()->shouldReturn(true);
    }

    function it_should_be_a_female()
    {
        $this->setGender(Person::PERSON_GENDER_FEMALE);
        $this->isFemale()->shouldReturn(true);
    }

    function it_should_be_a_unknown_gender()
    {
        $this->setGender(Person::PERSON_GENDER_UNKNOWN);
        $this->isGenderUnknown()->shouldReturn(true);
    }

    function it_should_return_false_for_is_male_and_is_female_because_gender_is_unknown()
    {
        $this->setGender(Person::PERSON_GENDER_UNKNOWN);
        $this->isMale()->shouldReturn(false);
        $this->isFemale()->shouldReturn(false);
    }

    function it_should_return_false_because_gender_is_male()
    {
        $this->setGender(Person::PERSON_GENDER_MALE);
        $this->isGenderUnknown()->shouldReturn(false);
    }

    function it_should_return_false_because_gender_is_female()
    {
        $this->setGender(Person::PERSON_GENDER_FEMALE);
        $this->isGenderUnknown()->shouldReturn(false);
    }

    function it_should_accept_a_visitor_and_invoke_the_visiting_of_the_visitor(
        PersonVisitorInterface $visitor
    ) {
        $visitor->visit($this->getWrappedObject())->shouldBeCalled();
        $visitor->visit($this->getWrappedObject())->willReturn('visited');

        $this->accept($visitor)->shouldReturn('visited');
    }
}
