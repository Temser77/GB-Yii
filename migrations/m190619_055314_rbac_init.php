<?php

use yii\db\Migration;

/**
 * Class m190619_055314_rbac_init
 */
class m190619_055314_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $authManager = Yii::$app->authManager;

        $permissionTaskCreate = $authManager->createPermission('TaskCreate');
        $permissionTaskUpdate = $authManager->createPermission('TaskUpdate');
        $permissionTaskDelete = $authManager->createPermission('TaskDelete');

        $authManager->add($permissionTaskCreate);
        $authManager->add($permissionTaskUpdate);
        $authManager->add($permissionTaskDelete);

        $admin = $authManager->createRole('admin');
        $user = $authManager->createRole('user');

        $authManager->add($admin);
        $authManager->add($user);

        $authManager->addChild($admin, $permissionTaskCreate);
        $authManager->addChild($admin, $permissionTaskUpdate);
        $authManager->addChild($admin, $permissionTaskDelete);
        $authManager->addChild($user, $permissionTaskCreate);
        $authManager->addChild($user, $permissionTaskUpdate);

        $authManager->assign($admin, 1);
        $authManager->assign($user, 2);
        $authManager->assign($user, 3);
        $authManager->assign($user, 4);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190619_055314_rbac_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190619_055314_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
