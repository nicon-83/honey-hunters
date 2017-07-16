<?php

/**
 * Класс Comments - модель для работы с комментариями
 */
class Comments
{
	/**
	 * Получаем все комментарии из БД
	 * @return array <p>Массив с информацией о всех комментариях</p>
	 */
	public static function getComments()
	{

		// Соединение с БД
		$db = Db::getConnection();

		// Запрос к БД
		$result = $db->query('SELECT id, user_name, user_email, text, date FROM comments ORDER BY date DESC');

		// Получение и возврат результатов
		$commentsList = array();
		$i = 0;
		while ($row = $result->fetch()) {
			$commentsList[$i]['id'] = $row['id'];
			$commentsList[$i]['name'] = $row['user_name'];
			$commentsList[$i]['email'] = $row['user_email'];
			$commentsList[$i]['text'] = $row['text'];
			$commentsList[$i]['date'] = $row['date'];
			$i++;
		}
		return $commentsList;
	}
	
	/**
	 * Получаем последний комментарий из БД
	 * @return array <p>Массив информации содержащейся в последнем комментарии</p>
	 */
	public static function getLastComment()
	{

		// Соединение с БД
		$db = Db::getConnection();

		// Запрос к БД
		$result = $db->query('SELECT id, user_name, user_email, text, date FROM comments ORDER BY date DESC');

		//получаем запрос в виде ассоциативного массива
		$result->setFetchMode(PDO::FETCH_ASSOC);

		// Получение и возврат результатов
		$lastComment = $result->fetch();

		return $lastComment;

	}
	
	/**
	 * Добавляем комментарий в БД
	 * @param string $name <p>Имя пользователя</p>
	 * @param string $email <p>E-mail пользователя</p>
	 * @param string $text <p>Текст комментария</p>
	 * @return boolean <p>Результат выполнения метода</p>
	 */
	public static function createComments($name, $email, $text)
	{

		// Соединение с БД
		$db = Db::getConnection();
		
		// Текст запроса к БД
		$sql = "INSERT INTO comments (user_name, user_email, text) VALUES (:name, :email, :text)";

		// Получение и возврат результатов. Используется подготовленный запрос
		$result = $db->prepare($sql);
		$result->bindParam(':name', $name, PDO::PARAM_STR);
		$result->bindParam(':email', $email, PDO::PARAM_INT);
		$result->bindParam(':text', $text, PDO::PARAM_INT);
		return $result->execute();

	}
}


