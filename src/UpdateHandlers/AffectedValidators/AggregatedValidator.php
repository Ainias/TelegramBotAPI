<?php
/**
 * Created by PhpStorm.
 * User: silas
 * Date: 21.08.16
 * Time: 11:55
 */

namespace Ainias\Library\TelegramBot\UpdateHandlers\AffectedValidators;


use Ainias\Library\TelegramBot\Bot;
use Ainias\Library\TelegramBot\Objects\Update;

class AggregatedValidator extends AbstractAffectedValidator
{
    const CONDITION_AND = 1;
    const CONDITION_OR = 2;

    /** @var  AbstractAffectedValidator[] */
    private $validators;

    private $condition;

    /**
     * AggregatedValidator constructor.
     * @param AbstractAffectedValidator[] $validators
     */
    public function __construct(array $validators = [], $condition = self::CONDITION_AND)
    {
        $this->validators = $validators;
        $this->condition = $condition;
    }


    public function addValidator(AbstractAffectedValidator $validator)
    {
        $this->validators[] = $validator;
    }

    public function isAffectedFromUpdate(Update $update, Bot $bot)
    {
       switch ($this->condition)
       {
           case self::CONDITION_AND:
           {
               return $this->conditionAnd($update, $bot);
           }
           case self::CONDITION_OR:
           {
               return $this->conditionOr($update, $bot);
           }
       }
       return false;
    }

    private function conditionAnd(Update $update, Bot $bot)
    {
        foreach ($this->validators as $validator)
        {
            if (!$validator->isAffectedFromUpdate($update, $bot))
            {
                return false;
            }
        }
        return count($this->validators) > 0;
    }

    private function conditionOr(Update $update, Bot $bot)
    {
        foreach ($this->validators as $validator)
        {
            if ($validator->isAffectedFromUpdate($update, $bot))
            {
                return true;
            }
        }
        return false;
    }

    /**
     * @return int
     */
    public function getCondition(): int
    {
        return $this->condition;
    }

    /**
     * @param int $condition
     */
    public function setCondition(int $condition)
    {
        $this->condition = $condition;
    }
}