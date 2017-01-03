<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdQqxoLZrtGYdpJ9BuX863o65MK9BAw-2j9kM9ig2ctf1uNbw/viewform?embedded=true&entry.244341617=<?=$activity?>&entry.1177643984=<?=$start_ts?>" width="100%" height="2980px" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" style="margin-top: -20px; margin-bottom: -95px" onload="resizeIframe(this)"><?=Yii::t('app', 'Loading...')?></iframe>
<?php
$script = <<< JS
    function resizeIframe(obj) {
        var cw = document.documentElement.clientWidth;
        if (cw < 572) obj.height = '3150px';
        if (cw < 422) obj.height = '3460px';
        if (cw < 342) obj.height = '4160px';
    }
JS;
$this->registerJs($script, yii\web\View::POS_END);
?>
