<?php

/**
 * Description of BAccessRule
 *
 * @author crowdmb
 */

namespace backend\components;

use yii\filters\AccessRule;
use common\models\User;

class BAccessRule extends AccessRule {

    protected function matchRole($user)
    {
        if (empty($this->roles)) {
            return true;
        }
        foreach ($this->roles as $role) {
            if ($role === User::ROLE_ADMIN) {
                if ($user->identity->isAdmin()) {
                    return true;
                }
            }
        }

        return false;
    }

}
