<?php get_header(); ?>

<?php
	$posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'presentation' ORDER BY post_date DESC LIMIT 1");
?>

<?php foreach ($posts as $key => $post) : ?>
<div class="w-section header">
	<div id="header" class="w-container container-home">
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
				<div class="w-col w-col-11 w-col-stack">
					<div class="center-block">
						<h1 class="h1"><?php echo $post->post_title; ?></h1>
					</div>
					<p class="bio"><?php echo $post->post_content; ?></p>
				</div>
			</div>
		</div>
		<div data-collapse="tiny" data-animation="default" data-duration="400" data-contain="1" data-doc-height="1" class="w-nav navbar archive-nav hide-mob" style="text-align:center;">
			<div class="w-container nav-container">
				<?php $menu_itens = wp_get_nav_menu_items('primary'); ?>
				<nav role="navigation" class="w-nav-menu" id="main-menu">
					<a href="#writing" class="w-nav-link top-fixed-link">Writing</a>
					<a href="#case-studies" class="w-nav-link top-fixed-link">Case Studies</a>
					<a href="#side-projects" class="w-nav-link top-fixed-link">Side Projects</a>
					<a href="#talk-to-me" class="w-nav-link top-fixed-link">Talk to Me</a>
					<?php foreach ($menu_itens as $key => $item) { ?>
						<a href="<?php echo $item->url; ?>" class="w-nav-link top-fixed-link">
							<?php echo $item->post_title; ?>
						</a>
					<?php } ?>
				</nav>
				<div class="w-nav-button">
					<div class="w-icon-nav-menu"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>

<div class="w-section divider" id="writing">
	<div class="w-container">
		<h2 class="text-divider">WRITING</h2>
	</div>
	<div class="section-divider"></div>
</div>

<?php
	$posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'articles' ORDER BY post_date ASC");
?>


<div class="w-section blog-posts">
	<div id="posts" class="w-container posts">
	<?php foreach ($posts as $post): ?>
		<div class="div-post">
			<h2 class="blog-title">
				<a href="<?php echo esc_url( get_permalink($post->ID) ); ?>"><?php echo $post->post_title; ?></a>
			</h2>
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
							<a href="<?php echo esc_url( get_permalink($post->ID) ); ?>" class="link-read-more">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<a href="<?php bloginfo('url'); ?>/articles" class="w-button archive-button">
		<span class="button-archive-cta">VIEW ARCHIVE</span>
	</a>
	</div>
</div>


<div class="w-section optin">
	<div class="w-container email-optin">
		<div>
			<h2 class="optin-title">Want to get industry experts’ insights on how to get a remote marketing job?</h2>
			<p class="optin-description">Subscribe to my personal newsletter and receive for free The Remote Handbook, a complete guide on how to get a marketing job at a remote startup.</p>
		</div>
		<div class="email">
			<div class="w-form">
				<?php es_subbox( $namefield = "", $desc = "", $group = "", $type = "green" ); ?>
			</div>
		</div>
	</div>
</div>

<div class="w-section divider-case-studies" id="case-studies">
	<div class="w-container">
		<h2 class="text-divider">CASE STUDIES</h2>
	</div>
	<div class="section-divider"></div>
</div>

<?php
	$posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'case-studies'ORDER BY post_date ASC");
?>


<div class="w-section case-studies-list">
	<div id="cases" class="w-container case-studies post">
		<?php foreach ($posts as $post): ?>
			<?php $custom_fields = get_post_custom($post->id); ?>
	      	<div class="case-study-single">
		        <h2 class="case-study-highlight">
		        	<?php echo strtoupper($custom_fields['subtitle'][0]); ?>
		        </h2>
		        <h2 class="case-study-title">
		        	<a href="<?php echo esc_url( get_permalink($post->ID) ); ?>">
		        		<?php echo $post->post_title; ?>
		        	</a>
		        </h2>
		        <p class="case-study-description">
		        	<?php echo $post->post_excerpt; ?>
	        	</p>
	        	<a href="<?php echo esc_url( get_permalink($post->ID) ); ?>" class="w-button case-study-cta">
		        	<?php echo strtoupper('Read More'); ?>
	        	</a>
	      	</div>
		<?php endforeach; ?>
		<a href="<?php bloginfo('url'); ?>/cases" class="w-button archive-button">
			<span class="button-archive-cta">VIEW ARCHIVE</span>
		</a>
	</div>
</div>

<div class="w-section divider" id="side-projects">
	<div class="w-container">
		<h2 class="text-divider">SIDE PROJECTS</h2>
	</div>
	<div class="section-divider"></div>
</div>

<?php
	$posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'side-projects'ORDER BY post_date ASC");
?>

<div class="w-section side-projects">
	<div class="w-container">
		<div class="w-row">
			<?php foreach ($posts as $key => $post) : ?>
				<?php $custom_fields = get_post_custom($post->id); ?>
				<div class="w-col w-col-6 w-col-stack">
					<div class="side-project-div">
						<?php
							if (has_post_thumbnail()){
								the_post_thumbnail( 'medium_large','style=height:483px; width: 100%');
							}else{
								echo '<img class="responsive-img" src="http://placehold.it/800x800">';
							}
						?>
						<h2 class="case-study-title side-project"><?php echo $post->post_title; ?></h2>
						<p class="case-study-description side-project-description">
							<?php echo $post->post_content; ?>
						</p>
						<div class="cta-div side-project-cta">
							<div class="w-row">
								<div class="w-col w-col-1 w-col-small-6 w-col-tiny-6">
									<span class="arrow"></span>
								</div>
								<div class="w-col w-col-11 w-col-small-6 w-col-tiny-6 w-article-link">
									<div class="cta projects">
										<a href="<?php echo $custom_fields['link'][0]; ?>" target="_blank">Explore</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="w-section divider" id="talk-to-me">
	<div class="w-container">
		<h2 class="text-divider">TALK TO ME</h2>
	</div>
	<div class="section-divider"></div>
</div>

<?php
	$posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'social-media'ORDER BY post_date DESC LIMIT 1");
?>

<div id="reach" class="w-section side-projects talk-to-me">
	<div class="w-container talk-container">
		<div class="get-in-touch">
			<?php foreach ($posts as $key => $post) : ?>
				<h2 id="talk-to-me" class="talk-title"><?php echo $post->post_title; ?></h2>
				<p class="talk-body">
					<?php echo $post->post_content; ?>
				</p>
				<div class="medias-talk">
					<?php $custom_fields = get_post_custom($post->id); ?>
					<?php if(isset($custom_fields['facebook'][0]) && !empty($custom_fields['facebook'][0])){ ?>
						<a href="<?php echo $custom_fields['facebook'][0]; ?>" class="social-icon first fb"></a>
					<?php } ?>
					<?php if(isset($custom_fields['twitter'][0]) && !empty($custom_fields['twitter'][0])){ ?>
						<a href="<?php echo $custom_fields['twitter'][0]; ?>" class="social-icon first tw"></a>
					<?php } ?>
					<?php if(isset($custom_fields['instagram'][0]) && !empty($custom_fields['instagram'][0])){ ?>
						<a href="<?php echo $custom_fields['instagram'][0]; ?>" class="social-icon insta"></a>
					<?php } ?>
					<?php if(isset($custom_fields['linkedin'][0]) && !empty($custom_fields['linkedin'][0])){ ?>
						<a href="<?php echo $custom_fields['linkedin'][0]; ?>" class="social-icon linke"></a>
					<?php } ?>
					<?php if(isset($custom_fields['angellist'][0]) && !empty($custom_fields['angellist'][0])){ ?>
						<a href="<?php echo $custom_fields['angellist'][0]; ?>" class="social-icon angel"></a>
					<?php } ?>
				</div>
			<?php endforeach; ?>
		</div>


		<div class="nl-cta">
			<h2 class="talk-title">Get tips from Industry Experts</h2>
			<p class="talk-body">
				Small body that motivates the user to subscribe to the newsletter goes here in this space mate.
			</p>
			<div class="email">
				<div class="w-form">
					<?php es_subbox( $namefield = "", $desc = "", $group = "", $type = "normal" ); ?>
				</div>
			</div>
		</div>

	</div>
</div>

<?php get_footer(); ?>