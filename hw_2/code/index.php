<?php
// Задание 1. Реализовать основные 4 арифметические операции в виде функции с двумя параметрами – два параметра это числа. Обязательно использовать оператор return. 

function add($a, $b): float|int
{
    return $a + $b;
}
function sub($a, $b): float|int
{
    return $a - $b;
}
function multi($a, $b): float|int
{
    return $a * $b;
}
function div($a, $b): float|int|string
{
    if ($b === 0) {
        return "Ошибка, деление на ноль";
    }
    return $a / $b;
}

$a = 7;
$b = 3;
$n = 0;

echo "$a + $b = ";
echo add($a, $b);
echo "\n";

echo "$a - $b = ";
echo sub($a, $b);
echo "\n";

echo "$a * $b = ";
echo multi($a, $b);
echo "\n";

echo "$a / $b = ";
echo div($a, $b);
echo "\n";

echo div($a, $n);
echo "\n";
?>

<?php
// 2. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation): float|int|string
{
    switch ($operation) {
        case '+':
            return add($arg1, $arg2);
        case '-':
            return sub($arg1, $arg2);
        case '*':
            return multi($arg1, $arg2);
        case '/':
            return div($arg1, $arg2);
        default:
            return 'Операция не найдена';
    }
}

echo "$a + $b = ";
echo mathOperation($a, $b, "+");
echo "\n";

echo "$a - $b = ";
echo mathOperation($a, $b, "-");
echo "\n";

echo "$a * $b = ";
echo mathOperation($a, $b, "*");
echo "\n";

echo "$a / $b = ";
echo mathOperation($a, $b, "/");
echo "\n";

echo mathOperation($a, $n, "/");
echo "\n";

echo mathOperation($a, $b, "|");
echo "\n";
?>

<?php
// 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким: Московская область: Москва, Зеленоград, Клин Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт Рязанская область … (названия городов можно найти на maps.yandex.ru).

$arr = [
    'Московская область' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область' => ['Рязань'],
];

foreach ($arr as $key => $value) {
    echo $key . ": " . implode(", ", $value) . "\n";
}
?>

<?php
// 4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию транслитерации строк.
const MAP = [
    'а' => 'a',
    'б' => 'b',
    'в' => 'v',
    'г' => 'g',
    'д' => 'd',
    'е' => 'e',
    'ё' => 'e',
    'ж' => 'zh',
    'з' => 'z',
    'и' => 'i',
    'й' => 'y',
    'к' => 'k',
    'л' => 'l',
    'м' => 'm',
    'н' => 'n',
    'о' => 'o',
    'п' => 'p',
    'р' => 'r',
    'с' => 's',
    'т' => 't',
    'у' => 'u',
    'ф' => 'f',
    'х' => 'h',
    'ц' => 'c',
    'ч' => 'ch',
    'ш' => 'sh',
    'щ' => 'sch',
    'ь' => '',
    'ы' => 'y',
    'ъ' => '',
    'э' => 'e',
    'ю' => 'yu',
    'я' => 'ya',
    'А' => 'A',
    'Б' => 'B',
    'В' => 'V',
    'Г' => 'G',
    'Д' => 'D',
    'Е' => 'E',
    'Ё' => 'E',
    'Ж' => 'Zh',
    'З' => 'Z',
    'И' => 'I',
    'Й' => 'Y',
    'К' => 'K',
    'Л' => 'L',
    'М' => 'M',
    'Н' => 'N',
    'О' => 'O',
    'П' => 'P',
    'Р' => 'R',
    'С' => 'S',
    'Т' => 'T',
    'У' => 'U',
    'Ф' => 'F',
    'Х' => 'H',
    'Ц' => 'C',
    'Ч' => 'Ch',
    'Ш' => 'Sh',
    'Щ' => 'Sch',
    'Ь' => '',
    'Ы' => 'Y',
    'Ъ' => '',
    'Э' => 'E',
    'Ю' => 'Yu',
    'Я' => 'Ya',
];
function convert(string $string): string
{
    return strtr($string, MAP);
}

$str = "Привет";
echo "$str \n";
echo convert($str);
?>

<?php
// 5. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
function power($val, $pow)
{
    switch ($pow) {
        case 0:
            return 1;
        case 1:
            return $val;
        default:
            return $val * power($val, --$pow);
    }
}

echo "2^10 = " . power(2, 10);
?>

<?php
// 6. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты.

function dateStr()
{
    $res = function ($val, $arr) {
        $v10 = $val % 10;
        if ($val >= 10 && $val <= 20) {
            return $arr[2];
        } else
            switch ($v10) {
                case 1:
                    return $arr[0];
                case 2:
                case 3:
                case 4:
                    return $arr[1];
                default:
                    return $arr[2];
            }
    };

    $h = date("H");
    $i = date("i");

    $hours = "$h {$res($h, ['час', 'часа', 'часов'])}";
    $minutes = "$i {$res($i, ['минута', 'минуты', 'минут'])}";

    return "$hours $minutes";
}

echo "time  " . dateStr();
?>