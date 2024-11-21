<?php get_header(); ?>
<div class="main __container">
	<h1>This is the home page</h1>
	
	<ul class="best-slots__list">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<!-- Post output, loop functions: the_title(), etc. -->
				<li>
					<div class="best-slot">
						<picture>
							<?php if (has_post_thumbnail()) {
							    the_post_thumbnail('medium', ['class' => 'main-img']);
							} else {
							    echo '<img class="main-img" src="'. get_stylesheet_directory_uri() . '/img/placehoders/slot.webp">';
							} ?>
						</picture>
						<div class="best-slot__content">
							<a href="<?php the_permalink(); ?>"><?php echo get_post_meta($post->ID, 'title', true); ?></a>
							<ul>
								<li><span>RTP:</span><span><?php echo get_post_meta($post->ID, 'rtp', true); ?></span></li>
								<li><span>Max Win: </span><span><?php echo get_post_meta($post->ID, 'maxwin', true); ?> Bet</span></li>
							</ul>
							<button class="btn-primary">Jogue aqui</button>
						</div>
					</div>
				</li>
				<?php endwhile;
else: ?>
		No posts.
		<?php endif; ?>
	</ul>
</div>
<?php get_footer(); ?>