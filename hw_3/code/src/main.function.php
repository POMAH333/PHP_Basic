<?php

function main(string $configFileAddress): string
{

    $config = readConfig($configFileAddress);

    if (!$config) {
        return handleError("Невозможно подключить файл настроек");
    }

    $functionName = parseCommand();

    if (function_exists($functionName)) {
        $result = $functionName($config);
    } else {
        $result = handleError("Вызываемая функция не существует");
    }
    return $result;
}

// 4. Добавьте новые функции в итоговое приложение работы с файловым хранилищем.

function parseCommand(): string
{
    $functionName = 'helpFunction';

    if (isset($_SERVER['argv'][1])) {
        $functionName = match ($_SERVER['argv'][1]) {
            'read-all' => 'readAllFunction',
            'add' => 'addFunction',
            'clear' => 'clearFunction',
            'read-profiles' => 'readProfilesDirectory',
            'read-profile' => 'readProfile',
            'help' => 'helpFunction',
            'search' => 'searchFunction', // Функция поиска
            'del' => 'delFunction', // Функция удаления
            default => 'helpFunction'
        };
    }

    return $functionName;
}