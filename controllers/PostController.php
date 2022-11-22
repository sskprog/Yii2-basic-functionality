<?php
namespace app\controllers;

use app\models\Posts;
use yii\data\ActiveDataProvider;

class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $query = Posts::find()
        ->joinWith('user')
        ->where(['is_published' => 1])
        ->orderBy(['created_at' => SORT_DESC])
        ->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
}
