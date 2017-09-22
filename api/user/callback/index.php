<?php
include_once($_SERVER['DOCUMENT_ROOT']."/api/db/Db.php");
header('Content-Type: text/html; charset=utf-8');
$email = trim($_GET['email']);
$message = trim($_GET['message']);


try {
  $db = Db::getConnection();
	$sql = 'INSERT INTO callback (email,message) VALUES (:email, :message)';

	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	$result = $db->prepare($sql);
	
	$result->bindParam(':email', $email, PDO::PARAM_STR);
	$result->bindParam(':message', $message, PDO::PARAM_STR);
	
	if($result->execute()) {
		echo "Успешно сохранено<br/>";
		/*Отправка на email*/
		$to      = 'dauren.alzhanov@bshg.com,support@naturecool.kz';
		$subject = 'Обратная связь!';
		$message = "От:$email  Сообщение:$message";
		$headers = 'From: bosсh@naturecool.kz' . "\r\n" .
		'Reply-To: bosсh@naturecool.kz' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		mail($to, $subject, $message, $headers);
		/*Отправка на email*/
		
	} else {
		echo "Ошибка сохранения<br/>";
		
		$result->errorInfo();
	}

	
} catch (PDOException $e) {
	
    echo 'Подключение не удалось: ' . $e->getMessage();
	
}
