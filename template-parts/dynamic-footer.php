<?php
/**
 * The template for displaying footer.
 *
 * @package AGXTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$footer_class = did_action( 'elementor/loaded' ) ? esc_attr( agx_get_footer_layout_class() ) : '';
$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
] );
?>
<footer id="site-footer" class="site-footer dynamic-footer <?php echo $footer_class; ?>" role="contentinfo">
	<div class="footer-inner">
		<div class="site-branding show-<?php echo agx_theme_get_setting( 'agx_footer_logo_type' ); ?>">
			<?php if ( has_custom_logo() && ( 'title' !== agx_theme_get_setting( 'agx_footer_logo_type' ) || $is_editor ) ) : ?>
				<div class="site-logo <?php echo agx_show_or_hide( 'agx_footer_logo_display' ); ?>">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif;

			if ( $site_name && ( 'logo' !== agx_theme_get_setting( 'agx_footer_logo_type' ) ) || $is_editor ) : ?>
				<h4 class="site-title <?php echo agx_show_or_hide( 'agx_footer_logo_display' ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( 'Home', 'agx-theme' ); ?>" rel="home">
						<?php echo esc_html( $site_name ); ?>
					</a>
				</h4>
			<?php endif;

			if ( $tagline || $is_editor ) : ?>
				<p class="site-description <?php echo agx_show_or_hide( 'agx_footer_tagline_display' ); ?>">
					<?php echo esc_html( $tagline ); ?>
				</p>
			<?php endif; ?>
		</div>

		<?php if ( $footer_nav_menu ) : ?>
			<nav class="site-navigation <?php echo agx_show_or_hide( 'agx_footer_menu_display' ); ?>" role="navigation">
				<?php echo $footer_nav_menu; ?>
			</nav>
		<?php endif; ?>

		<?php if ( '' !== agx_theme_get_setting( 'agx_footer_copyright_text' ) || $is_editor ) : ?>
			<div class="copyright <?php echo agx_show_or_hide( 'agx_footer_copyright_display' ); ?>">
				<p><?php echo agx_theme_get_setting( 'agx_footer_copyright_text' ); ?></p>
			</div>
		<?php endif; ?>
	</div>
</footer>
