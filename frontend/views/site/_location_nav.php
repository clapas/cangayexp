<?php
    use yii\bootstrap\ButtonGroup;
    use yii\helpers\Url;
    echo ButtonGroup::widget([
        'options' => [
            'class' => 'btn-group-vertical btn-block'
        ],
        'buttons' => [
            ['label' => 'Meloneras', 'tagName' => 'a', 'options' => ['href' => Url::to(['site/meloneras']), 'class' => 'btn-primary' . (isset($active['meloneras']) ? ' active' : '')]],
            ['label' => 'Maspalomas', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
            ['label' => 'Campo de Golf', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
            ['label' => 'San Agustín', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
            ['label' => 'Puerto Rico', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
            ['label' => 'Gran Canaria', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
            ['label' => 'Mapa', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
        ]
    ]);
?>

