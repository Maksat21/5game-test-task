<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \app\models\TicketForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = Yii::t('site','HAPPY_TICKET');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-ticket">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('success')): ?>

        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success')?>
        </div>
    
    <?php else: ?>

        <p>
            Пожалуйста введите диапозон номеров билетов в следующую форму, чтобы узнать кол-во счастливых билетов.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'ticket-form']); ?>

                    <?= $form->field($model, 'firstNumber', ['inputOptions' =>
                        ['autofocus' => 'autofocus', 'type' => 'number', 'maxlength' => true, 'class' => 'form-control', 'tabindex' => '1']])?>
                    
                    <?= $form->field($model, 'secondNumber', ['inputOptions' =>
                        ['autofocus' => 'autofocus', 'type' => 'number', 'maxlength' => true, 'class' => 'form-control', 'tabindex' => '1']])?>
                    
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('site','SUBMIT'), ['class' => 'btn btn-primary', 'name' => 'ticket-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>
