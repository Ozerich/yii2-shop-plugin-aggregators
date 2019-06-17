<? /** @var \ozerich\shop\plugins\aggregators\forms\OnlinerSettingsForm $formModel */ ?>

<?php $form = \yii\widgets\ActiveForm::begin([
    'enableClientValidation' => false,
    'enableAjaxValidation' => true,
]); ?>

<? ozerich\admin\widgets\FormPage::begin([
    'isCreate' => false,
    'boxTitle' => 'Каталог Onliner.BY',
]); ?>

  <div class="col-xs-12">
      <?= $form->field($formModel, 'enabled')->checkbox(); ?>
  </div>

  <div class="col-xs-6">
      <?= $form->field($formModel, 'clientId')->textInput(); ?>
  </div>

  <div class="col-xs-6">
      <?= $form->field($formModel, 'clientSecret')->textInput(); ?>
  </div>

<?php
ozerich\admin\widgets\FormPage::end();
\yii\widgets\ActiveForm::end();
?>