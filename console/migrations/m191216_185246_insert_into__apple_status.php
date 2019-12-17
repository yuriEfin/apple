<?php

use yii\db\Migration;

/**
 * Class m191216_185246_insert_into__apple_status
 */
class m191216_185246_insert_into__apple_status extends Migration
{
    private static $t = 'status';
    private static $data = [
        [
            'name' => 'Bисит на дереве',
            'alias' => 'handing_tree',
            'is_default' => 1,
        ],
        [
            'name' => 'Упало/лежит на земле',
            'alias' => 'fail_to_ground',
            'is_default' => 0,
        ],
        [
            'name' => 'Гнилое яблоко',
            'alias' => 'rotten',
            'is_default' => 0,
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $time = time();
        foreach (self::$data as $dataItem) {
            $hasItemWithStatusName = $this->db->createCommand(
                'SELECT id FROM ' . self::$t . ' WHERE name=:name',
                [':name' => $dataItem['name']]
            )->queryScalar();
            if (!$hasItemWithStatusName) {
                $dataItem['created_at'] = $time;
                $dataItem['created_by'] = 0;
                $this->insert(
                    self::$t,
                    $dataItem
                );
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->db->createCommand()->delete(
            self::$t,
            [
                'name' => array_map(
                    function ($itemStatus) {
                        return $itemStatus['name'];
                    },
                    self::$data
                ),
            ]
        )->execute();
    }
}
