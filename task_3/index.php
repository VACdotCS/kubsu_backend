<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

function checkEmail($email) {
   $find1 = strpos($email, '@');
   $find2 = strpos($email, '.');
   return ($find1 !== false && $find2 !== false && $find2 > $find1);
}

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }
  // Включаем содержимое файла form.php.
  include('form.php');
  // Завершаем работу скрипта.
  exit();
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.

// Проверяем ошибки.
$errors = FALSE;
if (empty($_POST['fullname'])) {
  print('Заполните имя.<br/>');
  $errors = TRUE;
}

if (!is_numeric($_POST['telephone'])) {
  print('Заполните номер телефона верно.<br/>');
  $errors = TRUE;
}

if (empty($_POST['date']) || !DateTime::createFromFormat('Y-m-d', $_POST['date'])) {
  print('Заполните год.<br/>');
  $errors = TRUE;
}

if (!checkEmail($_POST['email'])) {
  print('Заполните почту правильно. <br/>');
  $errors = TRUE;
}

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}

// Сохранение в базу данных.

$user = 'u67396'; // Заменить на ваш логин uXXXXX
$pass = '4055854'; // Заменить на пароль, такой же, как от SSH
$db = new PDO('mysql:host=localhost;dbname=u67396', $user, $pass,
  [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); // Заменить test на имя БД, совпадает с логином uXXXXX

// Подготовленный запрос. Не именованные метки.
try {
  $stmt = $db->prepare("INSERT INTO MyBestForm SET fullname = ?, telephone = ?, birth_date = ?, sex = ?, bio = ?");
  $stmt->execute([$_POST['fullname'], $_POST['telephone'], $_POST['date'], $_POST['answer'], $_POST['biography']]);
  
  $fio = $_POST['fullname'];
  $stmt1 = $db->prepare("SELECT id FROM MyBestForm WHERE fullname = ? ORDER BY id DESC LIMIT 1");
  $stmt1->execute([$fio]);
  $user_id = $stmt1->fetchColumn();

  foreach ($_POST['programming_lang'] as $lang) {
	  $stmt2 = $db->prepare("SELECT languageId FROM Languages WHERE language = ?");
          $stmt2->execute([$lang]);
	  $id = $stmt2->fetchColumn();

          $stmt3 = $db->prepare("INSERT INTO PersonLanguages (personId, languageId) VALUES(?, ?)");
          $stmt3->execute([$user_id, $id]);
  }
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

//  stmt - это "дескриптор состояния".
 
//  Именованные метки.
//$stmt = $db->prepare("INSERT INTO test (label,color) VALUES (:label,:color)");
//$stmt -> execute(['label'=>'perfect', 'color'=>'green']);
 
//Еще вариант
/*$stmt = $db->prepare("INSERT INTO users (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);
$firstname = "John";
$lastname = "Smith";
$email = "john@test.com";
$stmt->execute();
*/

// Делаем перенаправление.
// Если запись не сохраняется, но ошибок не видно, то можно закомментировать эту строку чтобы увидеть ошибку.
// Если ошибок при этом не видно, то необходимо настроить параметр display_errors для PHP.
header('Location: ?save=1{$user_id}');
