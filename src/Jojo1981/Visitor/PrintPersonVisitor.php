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

/**
 * @category Jojo1981
 * @package Visitor
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Jojo1981\Visitor\PrintPersonVisitor
 */
class PrintPersonVisitor implements PersonVisitorInterface
{
    /**
     * {@inheritDoc}
     */
    public function visit(PersonInterface $person)
    {
        switch (get_class($person)) {
            case 'Jojo1981\Entity\Person':
                $result = "Print person: '{$person->getName()}'";
                break;
            case 'Jojo1981\Entity\UnknownPerson':
                $result = 'Can\'t print the name of an unknown person';
                break;
            default:
                throw new \Exception('Unknown person object');
                break;
        }

        return $result;
    }
}
