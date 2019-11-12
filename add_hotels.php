<?php 

require 'inc/mail/PHPMailer.php';
require 'inc/mail/SMTP.php';
require 'inc/mail/Exception.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
  $msg = "ok";
  $mail->isSMTP();
  $mail->SMTPDebug = 1;   
  $mail->CharSet = "UTF-8";                                          
  $mail->SMTPAuth   = true;
  // Настройки вашей почты
  $mail->Host       = ''; // SMTP сервера GMAIL
  $mail->Username   = ''; // Логин на почте
  $mail->Password   = ''; // Пароль на почте
  $mail->SMTPSecure = 'ssl';
  $mail->Port       = 698;
  $mail->setFrom('partner@vidpochivai.com.ua', 'YOUR NAME'); // Адрес самой почты и имя отправителя
  // Получатель письма
  $mail->addAddress('pelegrin2puk@gmail.com');  
  $mail->addAddress('marginbit@gmail.com'); // Ещё один, если нужен
  // Прикрипление файлов к письму
	if (!empty($_FILES['myfile']['name'][0])) {
    for ($ct = 0; $ct < count($_FILES['myfile']['tmp_name']); $ct++) {
      $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['myfile']['name'][$ct]));
      $filename = $_FILES['myfile']['name'][$ct];
      if (move_uploaded_file($_FILES['myfile']['tmp_name'][$ct], $uploadfile)) {
        $mail->addAttachment($uploadfile, $filename);
      } else {
        $msg .= 'Неудалось прикрепить файл ' . $uploadfile;
      }
    }   
  }
  // -----------------------
  // Само письмо
  // -----------------------
  $mail->isHTML(true);

  $mail->Subject = 'Заголовок письма';
  $mail->Body    = 'Тело';
	// Проверяем отравленность сообщения
	if ($mail->send()) {
	  echo "Успешно";
	} else {
		echo "Сообщение не было отправлено. Неверно указаны настройки вашей почты";
	}
} catch (Exception $e) {
	echo "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

?>