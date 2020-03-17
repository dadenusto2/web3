<?php
// Подключаемся к базе данных
require_once "config.php";
$arr = array(
    'Не все значения заполнены.',
    'email - не верно написан',
    'Поздравляем! Вы успешно зарегистрированы.', 
    'Пожалуйста, ознакомьтесь с контрактом!',
);


if($_POST['go'] == 'Отправить'){
	// Проверяем галочку
	if ($_POST['check'] == ''){
        $error = $arr[3];
	}
	
    foreach($_POST as $key => $val){
        // Проверяем, чтоб все поля были заполнены.
        if(empty($val)){
            $error = $arr[0];
        }
    }
    
    extract($_POST);
    
    // Проверяем email на соответствие шаблону
    if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)){
        $error = $arr[1];
    } 
    
    // Если ошибок нет - 
    // заносим нового пользователя в БД
    if(empty($error)){
        $query = mysql_query("INSERT INTO anketa VALUES('".$name."', '".$email."', '".$date."', '".$gender."', '".$limb."', '".$super."', '".$message."')");
        if(!$query){$error = mysql_error();}
        $error = $arr[2];
    }
    
}
echo $error;    
?>