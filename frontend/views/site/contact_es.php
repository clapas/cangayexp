<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfRFzcceD5lu_7mAOCrK9uAiEJMzgD77DNbT-IkBc410Tg5Lw/viewform?embedded=true" style="margin-top: -20px; margin-bottom: -95px" width="100%" height="2180px" frameborder="0" marginheight="0" marginwidth="0" onload="resizeIframe(this)"><?=Yii::t('app', 'Loading...')?></iframe>
<?php
$script = <<< JS
    function resizeIframe(obj) {
        var cw = document.documentElement.clientWidth;
        if (cw < 572) obj.height = '2350px';
        if (cw < 422) obj.height = '2660px';
        if (cw < 342) obj.height = '3360px';
    }
JS;
$this->registerJs($script, yii\web\View::POS_END);
?>
