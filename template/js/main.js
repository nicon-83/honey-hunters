/*
* Скрипт для добавления асинхронным запросом нового комментария на страницу, назначения необходимых стилей для четных и нечетных комментариев.
*/

//Объявляем переменные для хранения информации комментария и ошибок заполнения форм
var comment;
var errors;

//устанавливаем цвета четных и нечетных карточек
setColor();

//асинхронным запросом передаем информацию в БД и возвращаем обработанную информацию из БД
$(document).ready(function () {
	$("#add-comment").click(function () {

		//получаем информацию из формы
		var name = $('input[name="name"]').val();
		var email = $('input[name="email"]').val();
		var text = $('textarea[name="text"]').val();

		//асинхронным запросом передаем информацицию из формы на сервер для обработки и получаем ответ в виде строки
		$.post("comment", {name: name, email: email, text: text}, function (data) {

			//проверяем наличие в строке маркера ошибок
			if (!~data.indexOf('errors')) {
				//если нет маркера, значит в строке содержится информация комментария
				//конвертируем строку с информацией комментария в массив
				comment = JSON.parse(data);
				//добавляем на страницу новый комментарий
				$("#comments-item").prepend(createItem());
				//Очищаем поля инпутов
				clearInputs();
				//устанавливаем цвета четных и нечетных карточек
				setColor();

			} else {
				//конвертируем строку с информацией об ошибках в массив
				errors = JSON.parse(data);
				//удаляем маркер 'errors' из массива ошибок
				delete errors['errors'];
				//выводим ошибки на экран
				createErrorsItem();
			}
		});
		return false;
	});
});

//создаем ноду для новой карточки комментария и заполняем ее информацией из БД
function createItem() {
	//очищаем экран от информации об ошибках заполнения форм
	$('.error').remove();
	//создаем ноду и заполняем ее информацией
	var name = $('<p class="name"></p>').text(comment['user_name']);
	var email = $('<p class="email"></p>').text(comment['user_email']);
	var text = $('<p class="text"></p>').text(comment['text']);
	var date = $('<p class="date"></p>').text(comment['date']);
	var wrap = $('<div class="item"></div>');
	var container = $('<div class="comment_wrap col-xs-12 col-sm-6 col-md-4 col-lg-3"></div>');
	return container.append(wrap.append(name).append(email).append(text).append(date));
}

//устанавливаем цвета четных и нечетных карточек
function setColor() {
	$('.item:even').css('background-color', '#e9eef3');
	$('.item:odd').css('background-color', '#deebde');
	$('.name:even').css('background-color', '#4b596c');
	$('.name:odd').css('background-color', '#58ad52');
	$('.email:even').css('color', '#6d737b');
	$('.email:odd').css('color', '#58ad52');
	$('.text:even').css('color', '#767582');
	$('.text:odd').css('color', '#768275');
	$('.date:even').css('color', '#6d737b');
	$('.date:odd').css('color', '#58ad52');
}

//Создаем ноды для вывода ошибок и помещаем в них информацию об ошибках
function createErrorsItem() {

	//очищаем экран от информации об ошибках заполнения форм
	$('.error').remove();

	//выводим на экран полученные ошибки
	if (errors['name']) {
		var name = $('<p class="error"></p>').text(errors['name']);
		$('input[name="name"]').before(name);
	}

	if (errors['email']) {
		var email = $('<p class="error"></p>').text(errors['email']);
		$('input[name="email"]').before(email);
	}

	if (errors['text']) {
		var text = $('<p class="error"></p>').text(errors['text']);
		$('textarea[name="text"]').before(text);
	}
}

//Очищаем поля инпутов
function clearInputs() {
	$('input[name="name"]').val('');
	$('input[name="email"]').val('');
	$('textarea[name="text"]').val('');
}