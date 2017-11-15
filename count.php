<?php

// Указываем кодировку, в которой будет получена информация из базы
@mysql_query ($db, 'set character_set_results = "utf8"');

//Получаем IP-адрес посетителя и сохраняем текущую дату
$visitor_ip = $_SERVER['REMOTE_ADDR'];
$date = date("Y-m-d");

// Узнаем, были ли посещения за сегодня
$res = mysql_query("SELECT `visit_id` FROM `visits` WHERE `date`='$date'");// or die ("Проблема при подключении к БД");

// Если сегодня еще не было посещений
if (mysql_num_rows($res) == 0)
{
    // Очищаем таблицу  ips
    mysql_query("DELETE FROM `ips`");

    // Заносим в базу IP-адрес текущего посетителя
    mysql_query("INSERT INTO `ips` SET `ip_address`='$visitor_ip'");

    // Заносим в базу дату посещения и устанавливаем кол-во просмотров и уник. посещений в значение 1
    $res_count = mysql_query("INSERT INTO `visits` SET `date`='$date', `hosts`=1,`views`=1");
}

// Если посещения сегодня уже были
else
{
// Проверяем, есть ли уже в базе IP-адрес, с которого происходит обращение
    $current_ip = mysql_query("SELECT `ip_id` FROM `ips` WHERE `ip_address`='$visitor_ip'");

    // Если такой IP-адрес уже сегодня был (т.е. это не уникальный посетитель)
    if (mysql_num_rows($current_ip) == 1)
    {
      // Добавляем для текущей даты +1 просмотр (хит)
        mysql_query("UPDATE `visits` SET `views`=`views`+1 WHERE `date`='$date'");
    }

      // Если сегодня такого IP-адреса еще не было (т.е. это уникальный посетитель)
    else
    {
   // Заносим в базу IP-адрес этого посетителя
        mysql_query("INSERT INTO `ips` SET `ip_address`='$visitor_ip'");

  // Добавляем в базу +1 уникального посетителя (хост) и +1 просмотр (хит)
        mysql_query("UPDATE `visits` SET `hosts`=`hosts`+1,`views`=`views`+1 WHERE `date`='$date'");
    }
}
?>