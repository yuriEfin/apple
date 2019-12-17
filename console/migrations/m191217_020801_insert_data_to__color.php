<?php

use yii\db\Migration;

/**
 * Class m191217_020801_insert_data_to__color
 */
class m191217_020801_insert_data_to__color extends Migration
{
    private static $t = 'color';
    private static $data = [
        [
            'title' => 'Красный',
            'alias' => 'red',
        ],
        [
            'title' => 'Синий',
            'alias' => 'blue',
        ],
        [
            'title' => 'Зеленый',
            'alias' => 'green',
        ],
        [
            'title' => 'Желтый',
            'alias' => 'yellow',
        ],
        [
            'title' => 'Оранжевый',
            'alias' => 'orange',
        ],
        [
            'title' => 'Фиолетовый',
            'alias' => 'purple',
        ],
        [
            'title' => 'Черный',
            'alias' => 'black',
        ],
        [
            'title' => 'Белый',
            'alias' => 'white',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $time = time();
        foreach (self::$data as $dataItem) {
            $hasItemWithColorName = $this->db->createCommand(
                'SELECT id FROM ' . self::$t . ' WHERE title=:title',
                [':title' => $dataItem['title']]
            )->queryScalar();
            if (!$hasItemWithColorName) {
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
                'title' => array_map(
                    function ($itemStatus) {
                        return $itemStatus['title'];
                    },
                    self::$data
                ),
            ]
        )->execute();
    }
}
