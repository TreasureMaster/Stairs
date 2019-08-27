<?php
// Настройки соединения
$host = '127.0.0.1';
$db = 'test_pdo';
$user = 'root';
$password = '';
$charset = 'utf8';
// Параметры базы данных
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// Массив атрибутов подключения
// Нужен для того, чтобы не устанавливать их каждый раз в методах
// [атрибут]           ATTR_ERRMODE            - Режим сообщений об ошибках
// [значение атрибута] ERRMODE_EXCEPTION       - генерировать исключения
// [атрибут]           ATTR_DEFAULT_FETCH_MODE - Устанавливает режим выборки данных по умолчанию
// [значение атрибута] FETCH_ASSOC             - возвращает ассоциативный массив
// [атрибут]           ATTR_EMULATE_PREPARES   - Включение\выключение эмуляции подготовленных запросов
// [значение атрибута] FALSE                   - использовать собственные подготовленные запросы
$opt = [
  PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES    => false
];
// Соединение с базой данных
try {
  // Создаем соединение от имени глобального пользователя
  // $pdo = new PDO('mysql:host=localhost;dbname=test_pdo;charset=utf8', 'root', '');
  $pdo = new PDO ($dsn, $user, $password, $opt);
  // Переключение в режим генерации исключений (можно в качестве допюпараметра при объявлении объекта PDO)
  // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
  echo "Невозхможно установить соединение с базой данных";
}
?>