<?php

if($_POST['send'] == 'Отправить'){

    foreach($_POST as $key => $val){
        if(empty($val)){
			print('Вы пропустили поля, pаполните недостающие');
			exit();
        }
    }

    if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['inEmail'])){
        print('Email введен неверно');
        exit();
    }
	 
	if ($_POST['check'] == ''){
		print('Пожалуйста, ознакомьтесь с контрактом!');
		exit();
	}
    
    extract($_POST);
	$user = 'u20295';
	$pass = '7045626';
	$db = new PDO('mysql:host=localhost;dbname=u20295', $user, $pass);

	$name = $_POST['inName'];
	$email = $_POST['inEmail'];
	$date = $_POST['inDate'];
	$gender = $_POST['inGender'];
	$limb = $_POST['inLimb'];
	$super = $_POST['inSuperpowers'];
	$message = $_POST['inMessage'];
	try {
		$stmt = $db->prepare("INSERT INTO anketa (name, email, date, gender, limb, super, message) VALUES (:name, :email, :date, :gender, :limb, :super, :message)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':date', $date);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':limb', $limb);
		$stmt->bindParam(':super', $super);
		$stmt->bindParam(':message', $message);
		$stmt->execute();
		print('Спасибо, результаты сохранены.');
		exit();
	}
	catch(PDOException $e){
		print('Error : ' . $e->getMessage());
		exit();
	}
}

header('Location: /web3');
?>