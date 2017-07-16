<?php

/**
 * контроллер SiteController
 */
class SiteController
{
	
	/**
	 * Action для главной страницы
	 */
	public function actionIndex()
	{
		//Получаем комментарии из БД
		$comments = Comments::getComments();
		
		// Подключаем вид
		require_once(ROOT . '/views/site/index.php');
		
		return true;
	}
	
	/**
	 * Action для добавления комментариев
	 */
	public function actionComment()
	{
		// Обработка формы
		if (!empty($_POST)) {
			// Если данные из форм переданы
			
			// Получаем данные
			$name = $_POST['name'];
			$email = $_POST['email'];
			$text = $_POST['text'];
			
			// Флаг ошибок
			$errors = false;
			
			// Валидация полей
			if (!User::checkName($name)) {
				$errors['name'] = 'Имя не должно быть короче 2-х символов !';
			}
			
			if (!User::checkEmail($email)) {
				$errors['email'] = 'Неправильный email !';
			}
			
			if (!User::checkText($text)) {
				$errors['text'] = 'Необходимо добавить комментарий (минимум 10 символов) !';
			}
			
			if ($errors == false) {
				// Если ошибок нет
				
				//Добавляем комментрий в БД
				Comments::createComments($name, $email, $text);
				
				//Получаем последний комментарий из БД в виде массива для добавления его на страницу
				$lastComment = Comments::getLastComment();
				//Конвертируем массив в строку и передаем ее на страницу для дальнейшей обработки c помощью javaScript
				echo json_encode($lastComment);
			} else {
				//Добавляем к массиву ошибок маркер в виде свойства 'errors' чтобы при обработке на странице javaScript
				//мог отличить массив комментариев от массива ошибок
				$errors['errors'] = 'true';
				//Конвертируем массив ошибок в строку и передаем ее на страницу для дальнейшей обработки c помощью javaScript
				echo json_encode($errors);
			}
			return true;
		}
		return false;
	}
	
}
