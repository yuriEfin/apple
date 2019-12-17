<?php


namespace frontend\components;

use frontend\components\exceptions\InvalidItemProperty;
use frontend\components\interfaces\BiteOffPieceProcessInterface;
use frontend\components\interfaces\DeleteProcessInterface;
use frontend\components\interfaces\FailProcessInterface;
use frontend\components\interfaces\GameProcessInterface;
use frontend\components\interfaces\ItemInterface;
use frontend\components\interfaces\RandomObjectGenerateInterface;
use frontend\components\interfaces\RotenInterface;
use frontend\models\Apple;
use frontend\models\Color;
use yii\base\Component;
use yii\caching\DbDependency;
use yii\helpers\ArrayHelper;

/**
 * Class GameProcess
 */
class GameProcess extends Component implements GameProcessInterface, RandomObjectGenerateInterface,
                                               FailProcessInterface,
                                               DeleteProcessInterface, BiteOffPieceProcessInterface, RotenInterface
{
    const DEFAULT_QUANTITY_RANDOM_GEN = 5;

    /**
     * @throws InvalidItemProperty
     */
    public function processBiteOffPiece(ItemInterface $item, $params = [])
    {
        $percent = $params['percent'] ?? 0;
        $this->calculateBiteOfPercent($item, $percent);

        return $item->biteOffPiece();
    }

    /**
     * @param ItemInterface $item
     * @param float         $percent
     *
     * @return mixed|void
     */
    public function calculateBiteOfPercent(ItemInterface $item, float $percent)
    {
        if ($percent < 100) {
            $item->bite_off_size += $percent;
        } elseif ($percent > 100) {
            $item->bite_off_size = 0;
        }
        $this->controlBiteOfSize($item);

        return $item->bite_off_size;
    }

    /**
     * @param ItemInterface $item
     */
    private function controlBiteOfSize(ItemInterface $item): void
    {
        if ($item->bite_off_size < 0 || $item->bite_off_size > 100) {
            $item->bite_off_size = 100;
        }
    }

    /**
     * @throws InvalidItemProperty
     */
    public function processFailItem(ItemInterface $item, $params = [])
    {
        return $item->fail();
    }

    /**
     * @throws InvalidItemProperty
     */
    public function processRotten(ItemInterface $item, $params = [])
    {
        return $item->rotten();
    }

    /**
     * @param ItemInterface $item
     * @param array         $params
     *
     * @return mixed|void
     */
    public function processDeleteItem(ItemInterface $item, $params = [])
    {
        return $item->safeRemove();
    }

    /**
     * @param array $params
     *
     * @return array
     */
    public function randomGenerateItems($params = []): array
    {
        $arrayApple = [];
        $quantity = (int) ($params['quantity'] ?? self::DEFAULT_QUANTITY_RANDOM_GEN);
        for ($quantity; $quantity > 0; $quantity--) {
            $arrayApple[] = new Apple(
                [
                    'color_id' => $this->getRandomColor()['id'],
                    'size' => 100,
                    'bite_off_size' => 0,
                ]
            );
        }

        return $arrayApple;
    }

    /**
     * @return array
     */
    private function getRandomColor(): array
    {
        $key = md5(__METHOD__);
        if (!$colors = \Yii::$app->cache->get($key)) {
            $colors = ArrayHelper::map(Color::find()->all(), 'id', 'name');
            \Yii::$app->cache->set(
                $key,
                $colors,
                300, // @todo: move all cache key to Db stored
                new DbDependency(
                    ['sql' => 'SELECT CONCAT(MAX(created_at),MAX(updated_at)) FROM colors']
                )
            );
        }
        $arrayRand = array_rand($colors, 1);

        return $colors[$arrayRand];
    }
}