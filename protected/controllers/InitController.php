<?php 
class InitController extends Controller
{
	public function actionRun(){
    //Este codigo me permite saber el rol de un determinado usuario. 
		/*if(Yii::app()->user->isGuest) echo "guest";
		else echo Yii::app()->user->role;
		*/
	$auth=Yii::app()->authManager;
	$auth->createOperation('createUsers','create a user');
	$bizRule='return Yii::app()->user->id==$params["post"]->authID;';
	$task=$auth->createTask('updateOwnPasswords','update a post by author himself',$bizRule);
	$role=$auth->createRole('superadmin');
    $role->addChild('createUsers');
	$auth->assign('superadmin','4');
	echo "done";

	}
	public function actionCheckAccess(){

		if(Yii::app()->user->checkAccess('createUsers')){
			echo "Authorized";
		}
		else{
			echo "not Authorized";
		}
	}

}
 ?>