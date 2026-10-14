<?php
$categories = [
    ['icon' => '📱', 'name' => 'Mobile Phones', 'description' => 'Phones, cases, chargers and cables'],
    ['icon' => '🔋', 'name' => 'Mobile Parts', 'description' => 'Screens, batteries and charging ports'],
    ['icon' => '💻', 'name' => 'Laptops', 'description' => 'Gaming, business and student laptops'],
    ['icon' => '🧩', 'name' => 'Laptop Parts', 'description' => 'RAM, SSDs, keyboards and batteries'],
    ['icon' => '🖥️', 'name' => 'Desktop PCs', 'description' => 'Desktop computers and gaming PCs'],
    ['icon' => '⚙️', 'name' => 'PC Components', 'description' => 'CPU, GPU, motherboard, RAM and storage'],
    ['icon' => '🎧', 'name' => 'Accessories', 'description' => 'Keyboards, mice, headsets and monitors']
];

$products = [
    ['name' => 'Nova X5 Smartphone', 'category' => 'Mobile Phones', 'price' => 18990, 'icon' => '📱'],
    ['name' => 'SlimBook 15 Laptop', 'category' => 'Laptops', 'price' => 32990, 'icon' => '💻'],
    ['name' => 'GeForce RTX Graphics Card', 'category' => 'PC Components', 'price' => 17990, 'icon' => '🎮'],
    ['name' => 'DDR4 16GB Desktop RAM', 'category' => 'PC Components', 'price' => 1890, 'icon' => '▥'],
    ['name' => 'Mechanical Gaming Keyboard', 'category' => 'Accessories', 'price' => 2490, 'icon' => '⌨️'],
    ['name' => 'Laptop SSD 1TB', 'category' => 'Laptop Parts', 'price' => 3490, 'icon' => '💾'],
    ['name' => 'Wireless Gaming Headset', 'category' => 'Accessories', 'price' => 1590, 'icon' => '🎧'],
    ['name' => 'Smartphone Fast Charger', 'category' => 'Mobile Parts', 'price' => 590, 'icon' => '🔌']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechZone | Electronics Store</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="topbar">
        <a href="index.php" class="logo">Tech<span>Zone</span></a>

        <form id="searchForm" class="search">
            <input type="search" id="searchInput"
                   placeholder="Search phones, laptops, PC parts...">
            <button type="submit">Search</button>
        </form>

        <a href="#categories" class="explore-link">Explore Store ↗</a>
    </div>

    <nav>
        <a href="#home">Home</a>
        <a href="#categories">Mobile Phones & Parts</a>
        <a href="#categories">Laptops & Parts</a>
        <a href="#categories">Desktop PCs</a>
        <a href="#categories">PC Components</a>
        <a href="#categories">Accessories</a>
    </nav>
</header>

<main id="home">

    <section class="hero">
        <div class="hero-text">
            <p class="eyebrow">YOUR EVERYDAY TECH DESTINATION</p>

            <h1>Power Up Your<br><span>Next Upgrade.</span></h1>

            <p>
                Discover mobile phones, laptops, desktop PCs,
                replacement parts and accessories — all in one place.
            </p>

            <a href="#products" class="button">Explore Products →</a>
            <a href="#categories" class="button outline">Browse Categories</a>
        </div>

        <div class="hero-art">
            <div class="device device-phone">📱</div>
            <div class="device device-laptop">💻</div>
            <div class="device device-pc">🖥️</div>
            <div class="device device-headset">🎧</div>
            <p>SMART TECH. SMART CHOICES.</p>
        </div>
    </section>

    <section class="section" id="categories">
        <div class="section-heading">
            <div>
                <p class="eyebrow">SHOP BY CATEGORY</p>
                <h2>Find Your <span>Tech.</span></h2>
            </div>
            <p>From a new device to the part you need to fix it.</p>
        </div>

        <div class="category-grid">
            <?php foreach ($categories as $category): ?>
                <button class="category-card"
                        type="button"
                        data-filter="<?= htmlspecialchars($category['name']) ?>">

                    <span class="category-icon">
                        <?= $category['icon'] ?>
                    </span>

                    <h3><?= htmlspecialchars($category['name']) ?></h3>

                    <p><?= htmlspecialchars($category['description']) ?></p>

                    <span class="arrow">↗</span>
                </button>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="featured" id="products">
        <div class="section-heading">
            <div>
                <p class="eyebrow">HANDPICKED FOR YOU</p>
                <h2>Featured <span>Products.</span></h2>
            </div>
            <button class="reset-filter" data-filter="All" type="button">
                View All Products →
            </button>
        </div>

        <div class="filter-row">
            <button class="filter-chip selected" data-filter="All">All Products</button>
            <button class="filter-chip" data-filter="Mobile Phones">Mobiles</button>
            <button class="filter-chip" data-filter="Laptops">Laptops</button>
            <button class="filter-chip" data-filter="Desktop PCs">Desktop PCs</button>
            <button class="filter-chip" data-filter="PC Components">PC Parts</button>
            <button class="filter-chip" data-filter="Laptop Parts">Laptop Parts</button>
            <button class="filter-chip" data-filter="Mobile Parts">Mobile Parts</button>
            <button class="filter-chip" data-filter="Accessories">Accessories</button>
        </div>

        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <article class="product-card"
                    data-name="<?= htmlspecialchars(strtolower($product['name'])) ?>"
                    data-category="<?= htmlspecialchars($product['category']) ?>">

                    <div class="product-image">
                        <span><?= $product['icon'] ?></span>
                    </div>

                    <div class="product-info">
                        <p class="product-category">
                            <?= htmlspecialchars($product['category']) ?>
                        </p>

                        <h3><?= htmlspecialchars($product['name']) ?></h3>

                        <p class="price">
                            ₱<?= number_format($product['price'], 2) ?>
                        </p>

                        <button class="details-button"
                            type="button"
                            data-product="<?= htmlspecialchars($product['name']) ?>">
                            View Details ↗
                        </button>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <p id="noResults" hidden>
            No products found. Try another search or category.
        </p>
    </section>

    <section class="promo">
        <p class="eyebrow">BUILD • REPAIR • UPGRADE</p>
        <h2>Your Setup.<br><span>Your Rules.</span></h2>
        <p>
            Whether you're building a PC, upgrading a laptop or
            accessorizing your phone, find the right gear at TechZone.
        </p>
        <a href="#categories" class="button">Explore Categories →</a>
    </section>

    <section class="benefits">
        <div><span>▣</span><strong>Devices for Every Need</strong></div>
        <div><span>⚙</span><strong>Parts and Upgrades</strong></div>
        <div><span>♡</span><strong>One Convenient Store</strong></div>
    </section>

</main>

<footer>
    <a href="#home" class="logo">Tech<span>Zone</span></a>
    <p>Mobile Phones • Laptops • Desktop PCs • Parts & Accessories</p>
    <p>&copy; <?= date('Y') ?> TechZone. All rights reserved.</p>
</footer>

<div id="toast" class="toast"></div>

<script src="assets/js/script.js"></script>
</body>
</html>