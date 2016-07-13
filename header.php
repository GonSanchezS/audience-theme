<!DOCTYPE html>
<html>
	<head>
		<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="generator" content="Webflow">
		<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; <?php bloginfo('charset'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/webflow.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/gonzalo-sanchez.webflow.css" />
		<link rel="shortcut icon" type="image/x-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico">
  		<link rel="apple-touch-icon" href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png">
		<style type="text/css">
			input.input-box, textarea { background: transparent; color: white; }
			.w-input::-webkit-input-placeholder { /* WebKit browsers */
				color:    white;
			}
			.w-input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
				color:    white;
				opacity: 1;
			}
			.w-input::-moz-placeholder { /* Mozilla Firefox 19+ */
				color:    white;
				opacity: 1;
			}
			.w-input:-ms-input-placeholder { /* Internet Explorer 10+ */
				color:    white;
			}
			input.black-text, textarea { color: white; }
		</style>
		<script type="text/javascript">
		    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		</script>
		<?php wp_head(); ?>
	</head>

	<body>
		<script> var link = '<?php bloginfo('stylesheet_directory'); ?>'; </script>
		<div data-collapse="tiny" data-animation="default" data-duration="400" data-contain="1" data-doc-height="1" data-ix="display-none-on-load" class="w-nav top-fix-nav">
			<div class="w-container nav-container">
				<?php $menu_itens = wp_get_nav_menu_items('primary'); ?>
				<div class="w-nav-button hamburuguer-button">
					<div class="w-icon-nav-menu icon-article"></div>
				</div>
				<nav role="navigation" class="w-nav-menu nav-hamb-menu">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>#writing" class="w-nav-link top-fixed-link">Writing</a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>#case-studies" class="w-nav-link top-fixed-link">Case Studies</a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>#side-projects" class="w-nav-link top-fixed-link">Side Projects</a>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>#talk-to-me" class="w-nav-link top-fixed-link">Talk to Me</a>
					<?php foreach ($menu_itens as $key => $item) { ?>
						<a href="<?php echo $item->url; ?>" class="w-nav-link top-fixed-link">
							<?php echo $item->post_title; ?>
						</a>
					<?php } ?>
				</nav>
			</div>
		</div>