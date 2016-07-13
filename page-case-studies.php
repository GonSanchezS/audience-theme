<?php
/**
 * @package WordPress
 * @subpackage TemaX Template
 * @since TemaX Template 1.0
 * Template name: Case Studies
 */
	get_header();
?>

<div data-collapse="tiny" data-animation="default" data-duration="400" data-contain="1" data-doc-height="1" class="w-nav navbar archive-nav">
	<div class="w-container nav-container hide-mob">
		<?php $menu_itens = wp_get_nav_menu_items('primary'); ?>
		<nav role="navigation" class="w-nav-menu" id="main-menu">
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
<div class="w-section header archive-header">
	<div class="w-container">
		<div class="w-row">
			<div class="left">
				<h1 class="archive">Case Studies</h1>
			</div>
			<div class="right">
				<div class="w-form">
					<form id="email-form" action="#" name="email-form" data-name="Email Form">
						<input id="name" type="text" placeholder="Search" name="name" data-name="Name" class="w-input search-archive">
					</form>
					<div class="w-form-done">
						<p>Thank you! Your submission has been received!</p>
					</div>
					<div class="w-form-fail">
						<p>Oops! Something went wrong while submitting the form</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'case-studies' ORDER BY post_date ASC");
?>

<?php foreach($years as $year) : ?>

	<?php
		$months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'case-studies' AND YEAR(post_date) = '".$year."' ORDER BY post_date ASC");
	?>

	<?php foreach($months as $month) : ?>

		<div class="w-section divider">
			<div class="w-container">
				<h2 class="text-divider archive-divider cta-divider">
					<?php echo strtoupper(date('F Y', mktime(0, 0, 0, $month))); ?>
				</h2>
			</div>
			<div class="section-divider"></div>
		</div>

		<?php
			$posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'case-studies' AND MONTH(post_date)= '".$month."' AND YEAR(post_date) = '".$year."' ORDER BY post_date ASC");
	    ?>


    	<div class="w-section case-studies-list">
		    <div id="cases" class="w-container case-studies post">
				<?php foreach ($posts as $post): ?>
					<?php $custom_fields = get_post_custom($post->id); ?>
			      	<div class="case-study-single">
				        <h2 class="case-study-highlight">
				        	<?php echo strtoupper($custom_fields['subtitle'][0]); ?>
				        </h2>
				        <h2 class="case-study-title"><?php echo $post->post_title; ?></h2>
				        <p class="case-study-description">
				        	<?php echo $post->post_excerpt; ?>
			        	</p>
			        	<a href="<?php echo esc_url( get_permalink($post->ID) ); ?>" class="w-button case-study-cta">
			        		<?php echo strtoupper(__("Read More")); ?>
			        	</a>
			      	</div>
				<?php endforeach; ?>
			</div>
		</div>

	<?php endforeach; ?>

<?php endforeach; ?>

<?php get_footer(); ?>