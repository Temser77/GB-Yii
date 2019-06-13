<?php

use yii\db\Migration;

/**
 * Class m190607_005131_add_column_translation_status
 */
class m190607_005131_add_column_translation_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('statuses', 'translation_id', 'integer');
        $this->addForeignKey('fk_statuses_translations_translation_id', 'statuses', 'translation_id', 'translations', 'translation_id');


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_statuses_translations_translation_id', 'statuses');
        $this->dropColumn('statuses', 'translation_id');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190607_005131_add_column_translation_status cannot be reverted.\n";

        return false;
    }
    */
}
