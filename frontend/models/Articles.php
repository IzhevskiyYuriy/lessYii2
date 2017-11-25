<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 24.11.2017
 * Time: 17:01
 */

namespace frontend\models;

use yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Articles extends ActiveRecord
{


    public function getFullTitle($title)
    {
        return 'Статья: ' . $title;
    }

    /*
    * Получить короткий текст (чтобы статьи были почти одинаковы в размере)
    */
    public function getShortText($text)
    {
        $text = mb_substr($text, 0, 250);
        $firsRos = strripos($text, ' ');
        $text = mb_substr($text, 0, $firsRos);
        return $text. '...';
    }
    /*
    * Для дайков и просмотров
    */
    public function getDescription($hits, $value)
    {
        $description = [
            'like' => ['лайк', 'лайка', 'лайков'],
            'hit' => ['просмотр', 'просмотра', 'просмотров'],
        ];

        if (mb_substr($hits, -1) == 1 && mb_substr($hits, -2) != 11) {
            return $hits . ' ' . $description[$value][0];
        } else if (mb_substr($hits, -1) > 1 && mb_substr($hits, -1) < 5 && (mb_substr($hits, -2) < 5 || mb_substr($hits, -2) > 15)) {
            return $hits . ' ' . $description[$value][1];
        } else {
            return $hits . ' ' . $description[$value][2];
        }
    }
}