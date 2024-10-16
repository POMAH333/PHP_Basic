<!-- Выполните код в контейнере PHP CLI и объясните, что выведет данный код и почему: -->

<?php
$a = 5;
$b = '05';
var_dump($a == $b);                     // bool(true) - нестрогое сравнение без учёта тип переменных
var_dump((int)'012345');                // int(12345) - преобразование строковой переменной в целочисленную
var_dump((float)123.0 === (int)123.0);  // bool(false) - строгое сравнение с учётом типа переменной
var_dump(0 == 'hello, world');          // bool(false) - нестрогое сравнение, значение строки не равно нулю
?>

<!-- В контейнере с PHP CLI поменяйте версию PHP с 8.2 на 7.4. Изменится ли вывод? -->

<?php
$a = 5;
$b = '05';
var_dump($a == $b);                     // bool(true) - соответствует версии 8.2
var_dump((int)'012345');                // int(12345) - соответствует версии 8.2
var_dump((float)123.0 === (int)123.0);  // bool(false) - соответствует версии 8.2
var_dump(0 == 'hello, world');          // bool(true) - нестрогое сравнение, значение строки в версии 7.4 приравневается нулю
?>

<!-- Используя только две числовые переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо, чтобы получилось: b = 1, a = 2. Дополнительные переменные, функции и конструкции типа list() использовать нельзя. -->

<?php
$a = 1;
$b = 2;
echo "a = $a  b = $b \n";
$a += $b;
$b = $a - $b;
$a -= $b;
echo "a = $a  b = $b";
?>