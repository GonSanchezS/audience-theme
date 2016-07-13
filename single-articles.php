<?php 
	get_header();
	$post = get_post();
	$custom_fields = get_post_custom($post->id);
?>

<div data-ix="show-nav-2" class="w-section article-hero">
	<div data-collapse="tiny" data-animation="default" data-duration="400" data-contain="1" data-doc-height="1" class="w-nav navbar archive-nav article-nav hide-mob">
		<div class="w-container nav-container">
			<?php $menu_itens = wp_get_nav_menu_items('primary'); ?>
			<nav role="navigation" class="w-nav-menu menu-intern-article" id="main-menu">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>#writing" class="w-nav-link top-fixed-link">Writing</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>#case-studies" class="w-nav-link top-fixed-link">Case Studies</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>#side-projects" class="w-nav-link top-fixed-link">Side Projects</a>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>#talk-to-me" class="w-nav-link top-fixed-link">Talk to Me</a>
				<?php foreach ($menu_itens as $key => $item) { ?>
					<a href="<?php echo $item->url; ?>" class="w-nav-link top-fixed-link"><?php echo $item->post_title; ?></a>
				<?php } ?>
			</nav>
			<div class="w-nav-button">
				<div class="w-icon-nav-menu"></div>
			</div>
		</div>
	</div>
	<div class="w-container">
		<div>
			<div class="title-bg">
				<h1 data-ix="show-nav" class="case-study-med"><?php echo $post->post_title; ?></h1>
			</div>
		</div>
	</div>
</div>

<div class="w-section icons article-icons">
	<div class="media-social">
		<ul class="w-list-unstyled">
			<li>
				<img width="18" src="<?php bloginfo('stylesheet_directory'); ?>/images/twitter@2x.png" class="social-icon-post twitter">
			</li>
			<li>
				<img width="10" src="<?php bloginfo('stylesheet_directory'); ?>/images/facebook@2x.png" class="social-icon-post facebook">
			</li>
			<li>
				<img width="17" src="<?php bloginfo('stylesheet_directory'); ?>/images/linkedin@2x.png" class="social-icon-post linkedin">
			</li>
			<li>
				<img width="18" src="<?php bloginfo('stylesheet_directory'); ?>/images/Group17@2x.png" class="social-icon-post mail">
			</li>
		</ul>
	</div>
</div>

<div class="w-section section-social">
    <div class="w-container">
        <div>
            <p class="top-paragraph"><?php echo $post->post_content; ?></p>
        </div>
        <div class="feedback">
            <h1 class="feedback-title">I <span class="heart-feedback">❤ </span>feedback</h1>
            <p class="feedback-body">
                I want to hear your thoughts on this post. Tweet me your thoughts and feelings at <span class="handle">@gSanchezS.</span>
            </p>
        </div>
    </div>
</div>

<div class="w-section optin">
	<div class="w-container email-optin">
		<div>
			<h1 class="optin-title">Want to get industry experts’ insights on how to get a remote marketing job?</h1>
			<p class="optin-description">
				Subscribe to my personal newsletter and receive for free The Remote Handbook, a complete guide on how to get a marketing job at a remote startup.
			</p>
		</div>
		<div class="email">
			<div class="w-form">
				<?php es_subbox( $namefield = "", $desc = "", $group = "", $type = "green" ); ?>
			</div>
		</div>
	</div>
</div>

<?php
	$posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'presentation' ORDER BY post_date DESC LIMIT 1");
?>

<?php foreach ($posts as $key => $post) : ?>
<div class="w-section header">
	<div id="header" class="w-container container-home header-article">
		<div data-ix="show-nav" class="w-row header">
			<div class="w-col w-col-4 w-col-stack col-pic">
				<?php
					if (has_post_thumbnail()){
						the_post_thumbnail( array(173, 173), 'class=pic' );
					}else{ ?>
						<img width="173" src="<?php bloginfo('stylesheet_directory'); ?>/images/profile picture@2x.png" class="pic">
					<?php }
				?>
			</div>
			<div class="w-col w-col-8 w-col-stack">
				<div class="center-block">
					<h1 class="h1"><?php echo $post->post_title; ?></h1>
				</div>
				<p class="bio"><?php echo $post->post_content; ?></p>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>

<div class="w-section">
	<div class="w-container">
		<div class="read-next-div">
			<h1 class="read-next">Read Next</h1>
			<img width="17" src="<?php bloginfo('stylesheet_directory'); ?>/images/Icon 24px@2x.png" data-ix="boucing" class="arrow-read-next">
		</div>
	</div>
</div>

<?php  
	$posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'articles' ORDER BY post_date ASC");
?>


<div class="w-section blog-posts">
	<div id="posts" class="w-container posts">
	<?php foreach ($posts as $post): ?>
		<div class="div-post">
			<h1 class="blog-title">
				<a href="<?php echo esc_url( get_permalink($post->ID) ); ?>"><?php echo $post->post_title; ?></a>
			</h1>
			<p class="post-description">
				<?php echo $post->post_excerpt; ?>
			</p>
			<div class="cta-div">
				<div class="w-row">
					<div class="w-col w-col-1 w-col-medium-6 w-col-small-6 w-col-tiny-6">
						<span class="arrow"></span>
					</div>
					<div class="w-col w-col-11 w-col-medium-6 w-col-small-6 w-col-tiny-6 w-article-link">
						<div class="cta archive-cta">
							<a href="<?php echo esc_url( get_permalink($post->ID) ); ?>">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</div>


<?php get_footer(); ?>