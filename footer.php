<?php
    $posts = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'social-media'ORDER BY post_date DESC LIMIT 1");
?>

<?php foreach ($posts as $key => $post) : ?>
<?php $custom_fields = get_post_custom($post->id); ?>
<div class="w-section w-clearfix divider">
    <img width="17" src="<?php bloginfo('stylesheet_directory'); ?>/images/ic_arrow_forward-footer@2x.png" class="back-to-top-icon">
    <div class="section-divider"></div>
    <div class="w-row footer-col">
        <div class="w-col w-col-4">
            <?php if(!empty(get_theme_mod('twitter_setting'))){ ?>
                <a href="<?php echo get_theme_mod('twitter_setting'); ?>" style="text-decoration: none; color: #d0d5de;" target="_blank">
                    <h1 class="footer-text left-fotter">Follow me on twitter</h1>
                </a>
            <?php } ?>
        </div>
        <div class="w-col w-col-4">
            <h1 class="footer-text center-footer">Made with <span class="heart">❤</span> in Argentina</h1>
        </div>
        <div class="w-col w-col-4">
            <h1 class="footer-text right-footer">Like this theme? <span class="buy-it"><a href="<?php echo get_theme_mod( 'buy_setting' ); ?>" target="_blank" style="text-decoration: none; color: #d0d5de;">Buy it.</a></span></h1>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php wp_footer(); ?>

<script> var link = '<?php bloginfo('stylesheet_directory'); ?>'; </script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/main.js"></script>
<!--[if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
</body>
</html>
