<?php
/**
 * @category Jojo1981
 * @package Visitor
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace Jojo1981\Visitor;

use Jojo1981\Entity\PersonInterface;
use Jojo1981\Entity\Person;

/**
 * @category Jojo1981
 * @package Visitor
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Jojo1981\Visitor\SendMailVisitor
 */
class SendMailPersonVisitor implements PersonVisitorInterface
{
    /**
     * {@inheritDoc}
     */
    public function visit(PersonInterface $person)
    {
        /* Do some introspection here because JAVA supports function overloading and PHP not */
        switch (get_class($person)) {
            case 'Jojo1981\Entity\Person':
                /** @var Person $person */
                $result = "Mail send to: '{$person->getName()}'";
                break;
            case 'Jojo1981\Entity\UnknownPerson':
                $result = 'No mail can be send to an unknown person';
                break;
            default:
                throw new \Exception('invalid person object');
                break;
        }

        return $result;
    }
}
