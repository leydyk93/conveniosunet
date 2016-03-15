<?php 
class InitController extends Controller
{
	public function actionRun(){

		if(Yii::app()->user->isGuest) echo "guest";
		else echo Yii::app()->user->role;

	}

}
 ?>