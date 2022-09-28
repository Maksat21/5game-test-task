<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * TicketForm is the model behind the ticket form.
 */
class TicketForm extends Model
{
    public $firstNumber;
    public $secondNumber;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['firstNumber', 'secondNumber'], 'required'],
            [['firstNumber', 'secondNumber'], 'integer', 'max' => 999999],
            ['secondNumber', 'compare', 'compareAttribute' => 'firstNumber', 'operator' => '>'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'firstNumber' => Yii::t('site', 'FIRST_NUMBER'),
            'secondNumber' => Yii::t('site', 'SECOND_NUMBER'),
        ];
    }
}
