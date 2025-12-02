<?php require 'config.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <title>GameKeyShop — Цифровые ключи</title>
  <link rel="stylesheet" href="assets/style.css" />
</head>
<body>
  <header>
    <div class="container">
      <a href="/" class="logo">GameKeyShop</a>
      <nav>
        <a href="/">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="login.php">Войти</a>
      </nav>
    </div>
  </header>

  <section class="hero">
    <h1>Официальные ключи и подписки</h1>
    <p>Быстро · Безопасно · Поддержка 24/7</p>
    <a href="catalog.php" class="btn">Смотреть каталог</a>
  </section>

  <section class="featured">
    <h2>Популярные товары</h2>
    <div class="products-grid">
      <?php foreach (array_slice(getProducts(), 0, 3) as $p): ?>
      <div class="product-card">
        <img src="assets/images/<?= $p['image'] ?>" alt="<?= $p['name'] ?>">
        <h3><?= $p['name'] ?></h3>
        <p><?= $p['description'] ?></p>
        <strong><?= $p['price'] ?> ₽</strong>
        <a href="product.php?id=<?= $p['id'] ?>" class="btn-sm">Купить</a>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; 2025 GameKeyShop. Все ключи официальные.</p>
    </div>
  </footer>
</body>
</html>
