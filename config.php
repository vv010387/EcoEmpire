<?php
session_start();

// Автоматическое создание папки для сохранений
if (!file_exists('data/saves')) {
    mkdir('data/saves', 0777, true);
}

// Инициализация игрока
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [
        'balance' => 10000,
        'income_per_hour' => 1000,
        'last_update' => time(),
        'buildings' => [
            'farm' => 1,
            'mine' => 0,
            'factory' => 0,
        ],
        'workers' => 1
    ];
}

// Обновление баланса с учётом прошедшего времени
function updateBalance() {
    $user = $_SESSION['user'];
    $now = time();
    $seconds = $now - $user['last_update'];
    $incomePerSecond = $user['income_per_hour'] / 3600;
    $user['balance'] += $incomePerSecond * $seconds;
    $user['last_update'] = $now;
    $_SESSION['user'] = $user;
}

// Сохранение в файл (опционально)
function saveProgress() {
    $userId = $_SESSION['user_id'] ?? 'default';
    file_put_contents("data/saves/$userId.json", json_encode($_SESSION['user'], JSON_PRETTY_PRINT));
}
?>
