<?php
namespace app\controllers;

use app\models\Posts;
use app\models\User;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;

class PostController extends Controller
{
    public function actionIndex()
    {
        $query = Posts::find()
        ->joinWith('user')
        ->where(['is_published' => 1])
        ->orderBy(['created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        $model = Posts::findOne(['id' => $id]);

        if ($model) {
            $author = User::findOne(['id' => $model->user_id]);
            return $this->render('view', [
                'model' => $model, 'author' => $author
            ]);
        } else {
            throw new HttpException(404, 'Страница не найдена');
        }
    }

    public function actionUser($id)
    {
        var_dump($id);
        die;
        $model = Posts::findOne(['id' => $id]);

        if ($model) {
            $author = User::findOne(['id' => $model->user_id]);
            return $this->render('view', [
                'model' => $model, 'author' => $author
            ]);
        } else {
            throw new HttpException(404, 'Страница не найдена');
        }
    }
}
