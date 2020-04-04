<?php


namespace app\models;


use core\BaseModel;

class BookModel extends BaseModel
{
	public $id;
	public $userId;
	public $firstName;
	public $lastName;
	public $phone;
	public $photo;
	public $email;
	public $organization;
	public $comment;

	protected $table = 'books';
	protected $primaryKey = 'id';

	public function applyAttribute()
	{
		return [
			'id',
			'userId',
			'firstName',
			'lastName',
			'phone',
			'photo',
			'email',
			'organization',
			'comment',
		];
	}

	public function getPhoneNumberDisplay()
	{
		$result = preg_replace(
			'/^(\d)(\d{3})(\d{3})(\d{2})(\d{2})$/',
			'\1(\2)\3-\4-\5',
			 $this->phone);

		if (substr($this->phone,0, 1) == 7) {
			$result = "+" . $result;
		}

		return $result;

	}
}