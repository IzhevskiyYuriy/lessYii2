<?php
/**
 * Created by PhpStorm.
 * User: Yuriy
 * Date: 25.11.2017
 * Time: 2:58
 */

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Articles;
use yii\web\UploadedFile;
use yii\web\User;

class UserController extends Controller
{
    public function actionEdit()
    {

        if (Yii::$app->request->isPost) {

            // $idUser = (Yii::$app->request->get()['id'] > 0 ? intval(Yii::$app->request->get()['id']) : 0);
            $idUser = Yii::$app->user->id;// получение значение текущего авторизованого пользователя
            $user = User::find()
                ->where(['id' => $idUser])
                ->one();

            (Yii::$app->request->post()["User"]['email'] ? $user->email = Yii::$app->request->post()["User"]['email'] : "");
            (Yii::$app->request->post()["User"]['name'] ? $user->name = Yii::$app->request->post()["User"]['name'] : "");
            (Yii::$app->request->post()["User"]['surname'] ? $user->surname = Yii::$app->request->post()["User"]['surname'] : "");
            (Yii::$app->request->post()["User"]['age'] ? $user->age = Yii::$app->request->post()["User"]['age'] : "");
            (Yii::$app->request->post()["User"]['sex'] ? $user->sex = Yii::$app->request->post()["User"]['sex'] : "");
            (Yii::$app->request->post()["User"]['about'] ? $user->about = Yii::$app->request->post()["User"]['about'] : "");
            (Yii::$app->request->post()["User"]['tags'] ? $user->tags = Yii::$app->request->post()["User"]['tags'] : "");
            (Yii::$app->request->post()["User"]['country'] ? $user->country = Yii::$app->request->post()["User"]['country'] : "");
            (Yii::$app->request->post()["User"]['city'] ? $user->city = Yii::$app->request->post()["User"]['city'] : "");

            $user->save();
            ($_FILES["User"]["name"]["avatar"] ? $user->avatar = UploadedFile::getInstance($user, 'avatar') : '');

            if ($user->avatar && $user->validate() ) {
                $model = new Avatars;
                $user->avatar->saveAs(Yii::getAlias('@frontend/web/img/avatars/'.
                        $idUser . '/') . $user->avatar->baseName . '.' .
                    $user->avatar->extension);

                $model->img = $user->avatar->baseName . '.' . $user->avatar->extension;
                $model->data = date("Y-m-d");
                $model->id_user = Yii::$app->request->get()['id'];
                $model->save();

                Yii::$app->getResponse()->redirect(Yii::$app->getRequest()->getUrl()); //Перезагружаем страницу после post запроса

            }

            $userInfo = User::find()
                ->where(['id' => Yii::$app->request->get()['id']])
                ->one;
            $avatars= Avatars::find()
                ->where(['id_user' => Yii::$app->request->get()['id']])
                ->all();

            return $this->render('edit', [
                'avatars' => $avatars,
                'userInfo' => $userInfo
            ]);


        }
    }

}