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
 * Jojo1981\Visitor\PersonVisitorInterface
 */
interface PersonVisitorInterface
{
    /**
     * @param PersonInterface $person
     * @throws \Exception
     * @return string
     */
    public function visit(PersonInterface $person);
}
