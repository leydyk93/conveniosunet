<?php

class CargarController extends Controller
{
	public $layout='//layouts/cargar';
	
	public function actionPaso1()
	{
		$this->render('paso1');
	}
	public function actionPaso2()
	{
		$this->render('paso2');
	}
	public function actionPaso3()
	{
		$this->render('paso3');
	}
	public function actionPaso4()
	{
		$this->render('paso4');
	}
	public function actionPaso5()
	{
		$this->render('paso5');
	}






	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}