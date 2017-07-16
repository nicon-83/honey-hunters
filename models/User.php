<?php

/**
 * Класс User - модель для работы с информацией передаваемой пользователями
 */
class User
{

	/**
	 * Проверяет длину имени: не меньше, чем 2 символа
	 * @param string $name <p>Имя</p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public static function checkName($name)
	{
		if (strlen($name) >= 2) {
			return true;
		}
		return false;
	}
	
	/**
	 * Проверяет длину текста поля комментарий: не меньше, чем 10 символов
	 * @param string $text <p>Текст комментария</p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public static function checkText($text)
	{
		if (strlen($text) >= 10) {
			return true;
		}
		return false;
	}

	/**
	 * Проверяет email
	 * @param string $email <p>E-mail</p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public static function checkEmail($email)
	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		return false;
	}

}