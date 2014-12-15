<?php
namespace backend\models;

use yii\base\Behavior;
use backend\models\BackendUser;
use common\models\LoginForm;

class BackendLoginForm extends LoginForm {
    /**
     * @inheritdoc
     */
    public function getUser() {
        if ($this->_user === false) {
            $this->_user = BackendUser::findByUsername($this->username);
        }

        return $this->_user;
    }
}
