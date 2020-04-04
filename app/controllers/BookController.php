<?php


namespace app\controllers;


use app\models\BookModel;
use core\BaseController;

class BookController extends BaseController
{
	const FILE_SIZE = 1024 * 1024 * 2;

	public $type = [
		'image/jpeg',
		'image/png',
		];


	public function updateAction()
	{
		if ($this->isAjax()) {

			$err = [];
			$fileName = "";
			if ($_FILES['photo']['name']) {
				if (self::FILE_SIZE < $_FILES['photo']['size']) {
					$err[] = 'Файл слишком большой';
				}

				if (!in_array($_FILES['photo']['type'], $this->type)) {
					$err[] = 'Файл имеет некоректное разрешение';
				}

				$fileName = PIC_PATH.'/'.rand(1,1000).$_FILES['photo']['name'];
				if (!move_uploaded_file($_FILES['photo']['tmp_name'], ENGINE_PATH .$fileName)) {
					$err[] = 'Файл не загружен';
				}
			}

			$bookRecord = new BookModel();
			$bookRecord->userId = $_SESSION['user']['userId'];
			$bookRecord->setAttribute($_POST);

			if (!$fileName) {
				$fileName = $_POST['photoOld'];
			}

			$bookRecord->photo = $fileName;

			if (count($err) == 0) {
				if ($bookRecord->save()) {
					$row = [
						$bookRecord->id,
						$bookRecord->photo,
						$bookRecord->firstName,
						$bookRecord->lastName,
						$bookRecord->getPhoneNumberDisplay(),
						$bookRecord->email,
						$bookRecord->organization,
						$bookRecord->comment
					];

					echo json_encode([
						'status' => 'ok',
						'msg'    => 'Сохранили',
						'record' => $row
					]);
					exit();
				}
			} else {
				echo json_encode([
					'status' => 'error',
					'msg'    => $err
				]);
				exit();
			}

		}

	}

	public function searchRecordAction()
	{
		if ($this->isAjax()) {

			$bookRecord = new BookModel();
			$bookRecord->findOne($_POST['id']);

			echo json_encode([
				'status' => 'ok',
				'msg'    => 'Сохранили',
				'record' => $bookRecord,
			]);
			exit();
		}
	}
}