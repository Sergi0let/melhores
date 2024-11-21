<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
	<link rel="shortcut icon" href="favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body>
	<div class="wrapper">
		<header class="header" data-scroll="80" data-scroll-show="500">
			<div class="header__container">
				<?php if (has_custom_logo()) {
				    $custom_logo_id = get_theme_mod('custom_logo');
				    $desktop_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

				    // Отримуємо URL мобільного логотипу, якщо він завантажений
				    $mobile_logo_url = get_theme_mod('mobile_logo');
				    ?>
						<a href="<?php echo esc_url(home_url('/')); ?>" class="header__logo">
								<!-- Виведення десктопного логотипу -->
								<img class="header__logo-web" src="<?php echo esc_url($desktop_logo_url); ?>" alt="<?php bloginfo('name'); ?>" width="195" height="40" />
								
								<!-- Виведення мобільного логотипу (якщо він заданий) -->
								<?php if ($mobile_logo_url): ?>
										<img class="header__logo-mob" src="<?php echo esc_url($mobile_logo_url); ?>" alt="<?php bloginfo('name'); ?>" width="120" height="40" />
								<?php endif; ?>
						</a>
				<?php } ?>
				<div data-da=".header__container,767.98,3" class="header__menu menu">
					<button type="button" aria-label="menu open" class="menu__icon icon-menu">
						<span></span>
					</button>
					<?php if(false): ?>
					<!-- <nav class="menu__body">
						<div data-spollers="768" data-one-spoller class="menu__list">
							<details class="menu__item">
								<summary class="menu__link">By type</summary>
								<ul class="menu__sub-list">
									<li>
										<a href="#"><span>3 reels</span><span>34</span></a>
									</li>
									<li>
										<a href="#"><span>4 reels</span><span>2</span></a>
									</li>
									<li>
										<a href="#"><span>5 reels</span><span>3</span></a>
									</li>
									<li>
										<a href="#"><span>6 reels</span><span>5</span></a>
									</li>
									<li>
										<a href="#"><span>7 reels</span><span>4</span></a>
									</li>
									<li>
										<a href="#"><span>10 reels</span><span>34</span></a>
									</li>
									<li>
										<a href="#"><span>Bonus Buy</span><span>2</span></a>
									</li>
									<li>
										<a href="#"><span>Bonus Rounds</span><span>3</span></a>
									</li>
									<li>
										<a href="#"><span>Free Spins</span><span>5</span></a>
									</li>
									<li>
										<a href="#"><span>Highest RTP Slots</span><span>4</span></a>
									</li>
									<li>
										<a href="#"><span>Re-Spins</span><span>2</span></a>
									</li>
									<li>
										<a href="#"><span>Multiplier Symbols</span><span>3</span></a>
									</li>
									<li>
										<a href="#"><span>Megaways</span><span>5</span></a>
									</li>
									<li>
										<a href="#"><span>Scatter Symbols</span><span>4</span></a>
									</li>
								</ul>
							</details>
							<details class="menu__item">
								<summary class="menu__link">Providers</summary>
								<ul class="menu__sub-list">
									<li>
										<a href="#"><span>3 reels</span><span>34</span></a>
									</li>
									<li>
										<a href="#"><span>4 reels</span><span>2</span></a>
									</li>
									<li>
										<a href="#"><span>5 reels</span><span>3</span></a>
									</li>
									<li>
										<a href="#"><span>6 reels</span><span>5</span></a>
									</li>
									<li>
										<a href="#"><span>7 reels</span><span>4</span></a>
									</li>
									<li>
										<a href="#"><span>10 reels</span><span>34</span></a>
									</li>
									<li>
										<a href="#"><span>Bonus Buy</span><span>2</span></a>
									</li>
									<li>
										<a href="#"><span>Bonus Rounds</span><span>3</span></a>
									</li>
									<li>
										<a href="#"><span>Free Spins</span><span>5</span></a>
									</li>
									<li>
										<a href="#"><span>Highest RTP Slots</span><span>4</span></a>
									</li>
									<li>
										<a href="#"><span>Re-Spins</span><span>2</span></a>
									</li>
								</ul>
							</details>
							<details class="menu__item">
								<summary class="menu__link">Games</summary>
								<ul class="menu__sub-list">
									<li>
										<a href="#"><span>Bonus Buy</span><span>2</span></a>
									</li>
									<li>
										<a href="#"><span>Bonus Rounds</span><span>3</span></a>
									</li>
									<li>
										<a href="#"><span>Free Spins</span><span>5</span></a>
									</li>
									<li>
										<a href="#"><span>Highest RTP Slots</span><span>4</span></a>
									</li>
									<li>
										<a href="#"><span>Re-Spins</span><span>2</span></a>
									</li>
								</ul>
							</details>
							<details class="menu__item">
								<summary class="menu__link">Slots</summary>
								<ul class="menu__sub-list">
									<li>
										<a href="#"><span>Bonus Buy</span><span>2</span></a>
									</li>
									<li>
										<a href="#"><span>Bonus Rounds</span><span>3</span></a>
									</li>
									<li>
										<a href="#"><span>Free Spins</span><span>5</span></a>
									</li>
									<li>
										<a href="#"><span>Highest RTP Slots</span><span>4</span></a>
									</li>
									<li>
										<a href="#"><span>Re-Spins</span><span>2</span></a>
									</li>
								</ul>
							</details>
						</div>
					</nav> -->
					<?php endif; ?>
					<nav class="menu__body">
						<?php wp_nav_menu([
				            'theme_location' => 'header',
				            'container'      => false,
				            'menu_class'     => 'menu__list',
				            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				            'depth'          => 2,  // Використовуємо тільки один рівень, бо <summary> не підтримує вкладеність
				            'walker'         => new Summary_Menu_Walker(), // Використовуємо кастомний Walker
				            'fallback_cb'    => false]); ?>
				</nav>
				</div>
				<div class="flet">
					<p>
						<span>180% fino a 20000</span>
						<span>BCD + 50 FS1</span>
					</p>
					<figure>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/game-777.webp" alt="777" width="72" height="28" />
					</figure>
				</div>
			</div>
		</header>