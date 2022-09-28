<?php

namespace app\services;


use app\models\TicketForm;

class TicketCastService
{
    private int $firstNumber;
    private int $secondNumber;
    
    /**
     * @param  TicketForm  $ticketForm
     */
    public function __construct(TicketForm $ticketForm)
    {
        $this->firstNumber = $ticketForm->firstNumber;
        $this->secondNumber = $ticketForm->secondNumber;
    }
    
    /**
     * @return int
     */
    public function handle() : int
    {
        return $this->getHappyTicketCost();
    }
    
    /**
     * @return int
     */
    public function getHappyTicketCost() : int
    {
        $first = $this->firstNumber;
        $end = $this->secondNumber;
        
        $countHappyTicket = 0;
        
        for (; $first <= $end; $first++) {
            $result = $this->getDefinitionTicket($first);
            if ($result) $countHappyTicket++;
        }
        
        return $countHappyTicket;
    }
    
    /**
     * Определение счастливого билета
     * @param $value
     * @return bool
     */
    private function getDefinitionTicket($value) : bool
    {
        for($i = 0; strlen($value) <6; $i++) {
            $value = 0 .$value;
        }
    
        $list = str_split($value);
        
        $firstSum = 0;
        $secondSum = 0;
        foreach ($list as $key => $item) {
            if ($key < 3) {
                $firstSum += $item;
            } else {
                $secondSum += $item;
            }
        }
        
        if (strlen($firstSum) > 1) {
            $firstSum = array_sum(str_split(abs($firstSum), 1));
        }
        
        if (strlen($secondSum) > 1) {
            $secondSum = array_sum(str_split(abs($secondSum), 1));
        }
    
        if ($firstSum === $secondSum) {
            return true;
        }
        return false;
    }
}
