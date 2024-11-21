<footer class="footer">
	<div class="footer__container">
		<div class="footer__top">
			<div class="footer__list">
					<p>Tipi di Scommesse</p>
					<nav>
							<?php wp_nav_menu([
                            'theme_location' => 'footer-menu-1', // Перше меню
                            'container'      => false,          // Без додаткових контейнерів
                            'items_wrap'     => '%3$s',         // Виводимо лише елементи меню
                            'walker'         => new Footer_Nav_Walker(), // Використовуємо кастомний Walker
                            ]); ?>
					</nav>
			</div>

			<div class="footer__list">
					<p>Migliori Casinò non AAMS</p>
					<nav>
							<?php wp_nav_menu([
                            'theme_location' => 'footer-menu-2', // Друге меню
                            'container'      => false,
                            'items_wrap'     => '%3$s',
                            'walker'         => new Footer_Nav_Walker(),
                            ]); ?>
					</nav>
			</div>

			<div class="footer__list">
					<p>Pagine Importanti</p>
					<nav>
							<?php wp_nav_menu([
                                'theme_location' => 'footer-menu-3', // Третє меню
                                'container'      => false,
                                'items_wrap'     => '%3$s',
                                'walker'         => new Footer_Nav_Walker(),
                            ]); ?>
					</nav>
			</div>
			<div class="footer__list">
				<p>Media Sociali</p>
				<nav>
							<?php wp_nav_menu([
                                'theme_location' => 'footer-menu-4', // Третє меню
                                'container'      => false,
                                'items_wrap'     => '%3$s',
                                'walker'         => new Footer_Nav_Walker(),
                            ]); ?>
				</nav>
			</div>
		</div>
		<div class="footer__bottom">
			<?php if (! dynamic_sidebar('sidebar-footer-bottom')) : dynamic_sidebar('sidebar-footer-bottom'); endif; ?>
		</div>
		<?php if (false) : ?>
		<!-- <div class="footer__bottom">
			<div class="footer__content">
				<p>
					CasinoSenzaDocumenti pubblica notizie, informazioni e recensioni sugli
					operatori di gioco d’azzardo online non AAMS. Le informazioni fornite
					su casinosenzadocumenti.net non sono un consiglio, ma una recensione
					di casinò online e siti di scommesse che hanno licenze internazionali.
					Importante! Giocare sempre d’azzardo in modo responsabile. Scommettete
					con la testa, non sopra.
				</p>
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/footer/melhoreslots.webp" width="161" height="35" alt="melhoreslots" />
			</div>
			<div class="footer__content">
				<p>
					Per limitare l’accesso al gioco d’azzardo per sé o per i propri
					familiari, inserire i propri dati personali nel registro di
					autoesclusione ADM.
				</p>
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/footer/adm.webp" width="114" height="39" alt="adm" />
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/footer/gioco.webp" width="151" height="33" alt="gioco" />
			</div>
			<div class="footer__content">
				<p>
					Se avete un problema di gioco d’azzardo, non esitate a chiedere aiuto
					agli esperti. BeGambleAware offre aiuto e supporto gratuiti e
					confidenziali a chiunque abbia dubbi sul proprio gioco d’azzardo o su
					quello di qualcun altro.
				</p>
				<img src="<?php echo get_stylesheet_directory_uri();?>/img/footer/be-gamble-aware.webp" width="159" height="17" alt="be gamble aware" />
			</div>
		</div> -->
		<?php endif; ?>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
