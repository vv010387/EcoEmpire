<?php
require 'config.php';
updateBalance();
$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EcoEmpire — Экономическая игра на PHP</title>
  <link rel="stylesheet" href="assets/style.css" />
</head>
<body>
  <header>
    <div class="container">
      <h1>🌿 EcoEmpire</h1>
      <div class="stats">
        <span>💰 Баланс: <strong><?= number_format($user['balance'], 0, '', ' ') ?></strong> ₽</span>
        <span>📈 Доход: <strong><?= number_format($user['income_per_hour'], 0, '', ' ') ?></strong> ₽/ч</span>
        <span>👷 Рабочих: <?= $user['workers'] ?></span>
      </div>
    </div>
  </header>

  <main class="game">
    <section class="actions">
      <h2>Действия</h2>
      <a href="actions.php?action=collect" class="btn">🎁 Собрать доход</a>
      <a href="actions.php?action=hire" class="btn">👥 Нанять рабочего (2000 ₽)</a>
    </section>

    <section class="buildings">
      <h2>Здания</h2>
      <div class="grid">
        <!-- Ферма -->
        <div class="card">
          <h3>🌾 Ферма (Ур. <?= $user['buildings']['farm'] ?>)</h3>
          <p>Доход: <?= 500 * $user['buildings']['farm'] ?> ₽/ч</p>
          <a href="actions.php?action=upgrade&building=farm&cost=3000" class="btn-sm">
            Улучшить (3000 ₽)
          </a>
        </div>

        <!-- Шахта -->
        <div class="card">
          <h3>⛏ Шахта (Ур. <?= $user['buildings']['mine'] ?>)</h3>
          <p>Доход: <?= 1500 * $user['buildings']['mine'] ?> ₽/ч</p>
          <a href="actions.php?action=upgrade&building=mine&cost=8000" class="btn-sm">
            Улучшить (8000 ₽)
          </a>
        </div>

        <!-- Завод -->
        <div class="card">
          <h3>🏭 Завод (Ур. <?= $user['buildings']['factory'] ?>)</h3>
          <p>Доход: <?= 3000 * $user['buildings']['factory'] ?> ₽/ч</p>
          <a href="actions.php?action=upgrade&building=factory&cost=20000" class="btn-sm">
            Улучшить (20000 ₽)
          </a>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>🟢 EcoEmpire — игра на чистом PHP | Прогресс сохраняется в сессии</p>
    </div>
  </footer>
</body>
</html>
