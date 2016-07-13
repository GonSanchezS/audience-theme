<?php
	get_header();
	$post = get_post();
	$custom_fields = get_post_custom($post->id);
?>

<div data-collapse="tiny" data-animation="default" data-duration="400" data-contain="1" data-doc-height="1" class="w-nav navbar archive-nav">
	<div class="w-container nav-container hide-mob">
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

<div data-ix="show-nav-3" class="w-section hero-section archive-header">
	<div class="w-container case-study-header">
		<div>
			<h2 class="case-study-top"><?php echo strtoupper($custom_fields['subtitle'][0]); ?></h2>
		</div>
		<h1 class="case-study-med case-study-title-1"><?php echo $post->post_title; ?></h1>
		<p class="case-study-bot">
			<?php echo $custom_fields['description'][0]; ?>
		</p>
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
	$posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'case-studies' ORDER BY post_date ASC");
?>

<div class="w-section case-studies-list">
    <div id="cases" class="w-container case-studies post">
		<?php foreach ($posts as $post): ?>
			<?php $custom_fields = get_post_custom($post->id); ?>
	      	<div class="case-study-single">
		        <h1 class="case-study-highlight">
		        	<?php echo strtoupper($custom_fields['subtitle'][0]); ?>
		        </h1>
		        <h1 class="case-study-title"><?php echo $post->post_title; ?></h1>
		        <p class="case-study-description">
		        	<?php echo $post->post_excerpt; ?>
	        	</p>
	        	<a href="<?php echo esc_url( get_permalink($post->ID) ); ?>" class="w-button case-study-cta">
		        	<?php echo strtoupper('Read More'); ?>
	        	</a>
	      	</div>
		<?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>