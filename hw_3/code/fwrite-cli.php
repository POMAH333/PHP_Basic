<?php

$address = '/code/birthdays.txt';

$name = readline("Введите имя: ");
$date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");

if (validate($date)) {
    $data = $name . ", " . $date . "\r\n";

    $fileHandler = fopen($address, 'a');

    if (fwrite($fileHandler, $data)) {
        echo "Запись $data добавлена в файл $address";
    } else {
        echo "Произошла ошибка записи. Данные не сохранены";
    }

    fclose($fileHandler);
} else {
    echo "Введена некорректная информация";
}

// 1. Обработка ошибок. Посмотрите на реализацию функции в файле fwrite-cli.php в исходниках. Может ли пользователь ввести некорректную информацию (например, дату в виде 12-50-1548)? Какие еще некорректные данные могут быть введены? Исправьте это, добавив соответствующие обработки ошибок.

function validate(string $date): bool
{
    $dateBlocks = explode("-", $date);

    if (count($dateBlocks) != 3) { // исключаем некоректный ввод даты вроде(ДД.ММ.ГГГГ или ДД/ММ/ГГГГ и т.д)
        return false;
    } else {
        $dayCur = (int) date('d');
        $monthCur = (int) date('m');
        $yearCur = (int) date('Y');
        if ($dateBlocks[2] > $yearCur || $dateBlocks[2] < ($yearCur - 150)) { // проверка года рождения
            return false;
        } else if ($dateBlocks[1] > 12 || $dateBlocks[1] < 1 || ($dateBlocks[2] == $yearCur && $dateBlocks[1] > $monthCur)) { // проверка месяца рождения
            return false;
        } else if (($dateBlocks[2] == $yearCur && $dateBlocks[1] == $monthCur) && $dateBlocks[0] > $dayCur) { // проверка на превышение дня рождения
            return false;
        } else if ($dateBlocks[0] < 1) {// проверка указанного для рождения
            return false;
        } else if (($dateBlocks[1] == 4 || $dateBlocks[1] == 6 || $dateBlocks[1] == 9 || $dateBlocks[1] == 11) && $dateBlocks[0] > 30) {
            return false;
        } else if (
            ($dateBlocks[1] == 1 || $dateBlocks[1] == 3 || $dateBlocks[1] == 5 || $dateBlocks[1] == 7 ||
                $dateBlocks[1] == 8 || $dateBlocks[1] == 10 || $dateBlocks[1] == 12) && $dateBlocks[0] > 31
        ) {
            return false;
        } else if ($dateBlocks[1] == 2 && $dateBlocks[0] > 28) {
            return false;
        } else if (($dateBlocks[1] == 2) && ($dateBlocks[2] % 4 == 0) && ($dateBlocks[0] > 29)) {
            return false;
        } else {
            return true;
        }
    }
}