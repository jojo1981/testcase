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
 * Jojo1981\Entity\UnknownPerson
 *
 * Unknown person entity
 */
class UnknownPerson implements PersonInterface
{
    /**
     * @var PersonVisitorInterface
     */
    protected $visitor;

    /**
     * {@inheritDoc}
     */
    public function accept(PersonVisitorInterface $visitor)
    {
        $this->visitor = $visitor;
    }
}
