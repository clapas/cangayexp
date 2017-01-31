<iframe src="https://docs.google.com/forms/d/1beQM_Fvoz9lRwOMfgRVTV2fINr4tvj3v8W1NhTRJSjs/viewform?embedded=true" style="margin-top: -20px; margin-bottom: -95px" width="100%" height="2480px" frameborder="0" marginheight="0" marginwidth="0" onload="resizeIframe(this)"><?=Yii::t('app', 'Loading...')?></iframe>
<?php
$script = <<< JS
    function resizeIframe(obj) {
        var cw = document.documentElement.clientWidth;
        if (cw < 572) obj.height = '2650px';
        if (cw < 422) obj.height = '3040px';
        if (cw < 342) obj.height = '3660px';
    }
JS;
$this->registerJs($script, yii\web\View::POS_END);
?>

