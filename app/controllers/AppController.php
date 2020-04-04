<?php


namespace app\controllers;


use app\models\BookModel;
use app\models\UserModel;
use core\BaseController;

class AppController extends BaseController
{
	public function indexAction()
	{
		$user = new UserModel();
		if ($user->isAuth()) {
			$user->findOne($_SESSION['user']['userId']);
			$book = new BookModel();
			$bookModels = $book->where('userId', $user->userId)->get();
			$books = [];
			/** @var BookModel $bookItem */
			foreach ($bookModels as $bookItem) {
				$books[] = [
					$bookItem->id,
					$bookItem->photo,
					$bookItem->firstName,
					$bookItem->lastName,
					$bookItem->getPhoneNumberDisplay(),
					$bookItem->email,
					$bookItem->organization,
					$bookItem->comment
				];
			}
			$this->setVars([
				'user' => $user,
				'books' => $books,
			]);
			$this->view = 'book';
		} else {
			$users = $user->findAll();
			$this->setVars(['users' => $users]);
		}
	}
}