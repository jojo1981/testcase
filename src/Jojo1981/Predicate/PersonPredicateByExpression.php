<?php
/**
 * @category Jojo1981
 * @package Predicate
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 */
namespace Jojo1981\Predicate;

use Jojo1981\Entity\Person;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/**
 * @category Jojo1981
 * @package Predicate
 * @author Joost Nijhuis <jnijhuis81@gmail.com>
 * @author Sietse ten Hoeve <sietse.tenhoeve@sqills.com>
 * @copyright Copyright (c) 2014, Joost Nijhuis & Sietse ten Hoeve
 * @license MIT
 *
 * Jojo1981\Predicate\PersonPredicateByExpression
 */
class PersonPredicateByExpression implements PersonPredicateInterface
{
    /**
     * @var string
     */
    private $expression;

    /**
     * Constructor
     *
     * @param string $expression
     */
    public function __construct($expression)
    {
        $this->setExpression($expression);
    }

    /**
     * @param string $expression
     * @return $this
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function apply(Person $person)
    {
        $language = new ExpressionLanguage();

        return (bool) $language->evaluate(
            $this->expression,
            array('Person' => $person)
        );
    }
}
 