<?php
    use yii\bootstrap\ButtonGroup;
    use yii\helpers\Url;
    echo ButtonGroup::widget([
        'options' => [
            'class' => 'btn-group-vertical btn-block'
        ],
        'buttons' => [
            ['label' => 'Meloneras', 'tagName' => 'a', 'options' => ['href' => Url::to(['offer/meloneras']), 'class' => 'btn-primary' . (isset($active['meloneras']) ? ' active' : '')]],
            ['label' => 'Playa del Inglés', 'tagName' => 'a', 'options' => ['href' => Url::to(['offer/playa_del_ingles']), 'class' => 'btn-primary']],
            ['label' => 'Campo de Golf', 'tagName' => 'a', 'options' => ['href' => Url::to(['offer/maspalomas']), 'class' => 'btn-primary']],
            ['label' => 'San Agustín', 'tagName' => 'a', 'options' => ['href' => Url::to(['offer/san_agustin']), 'class' => 'btn-primary']],
            ['label' => 'Puerto Rico', 'tagName' => 'a', 'options' => ['href' => Url::to(['offer/puerto_rico']), 'class' => 'btn-primary']],
            ['label' => 'Gran Canaria', 'tagName' => 'a', 'options' => ['href' => Url::to(['offer/all']), 'class' => 'btn-primary']],
            ['label' => 'Mapa', 'tagName' => 'a', 'options' => ['class' => 'btn-primary']],
        ]
    ]);
?>

