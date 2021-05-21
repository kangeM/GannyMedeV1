<?php
namespace backend\controllers;

use Yii;
use backend\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\libraries\Commons;
use backend\libraries\Statuses;
use backend\libraries\Audits;
use backend\models\UserGroups;
use app\models\UserGroupsSearch;
use app\models\PermissionsSearch; 
use backend\libraries\RBAC;
use backend\libraries\Notify;
use yii\filters\AccessControl;

Class newSignups extends Controller
{

   public function behaviours(){
	   
	   
   }
   
   public function actionIndex()
   {
    if(!RBAC::can(RBAC::manage_users)){throw new NotFoundHttpException(Notify::access_message);}

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->post());

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

   }
}

?>