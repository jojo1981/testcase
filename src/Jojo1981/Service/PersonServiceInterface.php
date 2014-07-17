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

/**
 * @category Jojo1981
 * @package Service
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Jojo1981\Service\PersonServiceInterface
 */
interface PersonServiceInterface
{
    /**
     * @param int $age
     * @return \ArrayObject
     */
    public function findPersonsOlderThanAge($age);

    /**
     * @param int $age
     * @return \ArrayObject
     */
    public function findPersonsYoungerThanAge($age);

    /**
     * @param $name
     * @return \ArrayObject
     */
    public function findPersonsByNamesThatStartWith($name);
}
