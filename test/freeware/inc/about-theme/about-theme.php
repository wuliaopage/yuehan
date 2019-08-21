<?php
/**
 * Add the about page under appearance.
 *
 * Display the details about the theme information
 *
 * @package freeware
 */
?>
<?php
// About Information
add_action( 'admin_menu', 'freeware_about' );
function freeware_about() {    	
	add_theme_page( esc_html__('About Theme', 'freeware'), esc_html__('About Theme', 'freeware'), 'edit_theme_options', 'freeware-about', 'freeware_about_page');   
}

// CSS for About Theme Page
function freeware_admin_theme_style() {
   wp_enqueue_style('freeware-admin-style', get_template_directory_uri() . '/inc/about-theme/css/about-theme.css');
}
add_action('admin_enqueue_scripts', 'freeware_admin_theme_style');

function freeware_about_page() {
	$theme = wp_get_theme();

?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php /* translators: %s theme name */
				printf( esc_html__( 'Welcome to %s', 'freeware' ), esc_html( $theme->Name ) ); ?>
				<?php esc_html_e('Version:','freeware'); ?> <?php echo esc_html($theme['Version']);?></h3>
				<p>
					<?php esc_html_e('Freeware is a fast, clean, and modern-looking responsive Free WordPress Blog Theme. Minimal, elegant, lightweight, fast & mobile friendly layout with WooCommerce compatibility. This is a flexible template uses fresh and clean design.This theme is the best choise even for personal or professional websites.','freeware'); ?>
				</p>
				<p>
				<?php /* translators: %s theme name */
					printf( esc_html__( '%s theme is the most Popular Free WordPress blog theme. Please click the below button to display how your site looks like', 'freeware' ), esc_html( $theme->Name ) );
				?></p>
				<p> &nbsp;</p>
				<a href="<?php echo esc_url('https://demo.themespiral.com/freeware'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Free Demo', 'freeware' ); ?></a><a href="<?php echo esc_url('https://demo.themespiral.com/freeware-pro'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Pro Demo', 'freeware' ); ?></a>
		</div>
		<div class="theme-tabs">
			<input type="radio" name="nav" id="one" checked="checked"/>
			<label for="one" class="tab-label"><?php esc_html_e('Getting Started?','freeware');?></label>

			<input type="radio" name="nav" id="two"/>
			<label for="two" class="tab-label"><?php esc_html_e('Demo Importer','freeware');?></label>

			<input type="radio" name="nav" id="three"/>
			<label for="three" class="tab-label"><?php esc_html_e('Support','freeware');?></label>

			<input type="radio" name="nav" id="four"/>
			<label for="four" class="tab-label"><?php esc_html_e('Video Tutorials','freeware');?></label>

			<input type="radio" name="nav" id="five"/>
			<label for="five" class="tab-label"><?php esc_html_e('Pro Features','freeware');?></label>

			<article class="content one">
			    <h3><?php esc_html_e('About Documentation','freeware');?></h3>
			    <p><?php esc_html_e('Documentation is the information that describes the product to its users. Our documentation covers only related to Free Themes and Pro Extension Plugins. It will guide your to develop your Website as we displayed in demo site without any others help.','freeware');?></p>
			    <p>
					<a href="<?php echo esc_url('https://docs.themespiral.com/freeware/');?>" target="_blank" class="button button-primary"><?php printf( esc_html__( '%s Documentation', 'freeware' ), esc_html( $theme->Name ) ); ?></a>
				</p>
				<h3><?php esc_html_e('Theme Customizer','freeware');?></h3>
			   <p><?php printf( esc_html__( '%s supports the Theme Customizer for all theme settings. Click "Customize" to personalize your site.', 'freeware' ), esc_html( $theme->Name ) ); ?>
			   	<a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Start Customizing','freeware');?></a>
				</p>
				<h3><?php esc_html_e('F.A.Q (Frequently Asked Questions)','freeware');?></h3>
			   <p><?php esc_html_e('Want to know more about Themes and Plugins developed by Theme Spiral? ','freeware'); ?><a href="<?php echo esc_url('https://themespiral.com/f-a-q/');?>" class="button button-primary" target="_blank"><?php esc_html_e('F.A.Q','freeware');?></a></p>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg">
			</article>

			<article class="content two">
			    <h3><?php esc_html_e('Demo Importer','freeware');?></h3>
				<p>
					<?php esc_html_e( 'If your site have your own content then do not use this plugins. It will mess your site with dummy content. Is your site fresh? Install the Demo importer plugins and activate it.', 'freeware' ); ?></p>
				<p><?php esc_html_e('Do you want to import Demo Data? ','freeware'); ?></p>
					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ?>" class="button button-primary" style="text-decoration: none;">
					<?php esc_html_e( 'Install Demo Plugin', 'freeware' ); ?>
					</a>
				<?php } else { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) ?>" class="button button-primary" style="text-decoration: none;">
						<?php esc_html_e( 'Install Demo Plugin', 'freeware' ); ?>
					</a>
				<?php } ?> &nbsp;&nbsp;
				<h3><?php esc_html_e('How to install Dummy Content ?','freeware');?></h3>

				<p><?php esc_html_e(' Please install One Click Demo Import plugins. You can install it after activating freeware theme. It is listed in recommended Plugins','freeware'); ?></p>
				<ul>
					<li><?php esc_html_e('After plugin is activated, it asks you to upload  XML, WIE and  DAT dummy file','freeware');?></li>
					<li><a href="https://themespiral.com/download/1360/" target="_blank"><?php esc_html_e('Download it from Here ','freeware');?></a></li>
					<li><?php esc_html_e('Unzip freeware-dummy-content.zip file. You can find all XML, WIE and  DAT dummy file','freeware');?></li>
					<li><?php esc_html_e('Navigate to Appearance > Import Demo Data','freeware');?> 
					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?> <a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ?>"><?php esc_html_e('Upload','freeware'); ?></a><?php } ?></li>
					<li><?php esc_html_e('Upload manually and Click on Import demo data.','freeware');?></li>
					<li><?php esc_html_e('Now all your files and settings has been imported. Now you just need to setup your menu and social links','freeware');?></li>
				</ul>
				<p><strong><?php esc_html_e('Setup Menu and Social Links:','freeware');?> </strong></p>
				
				<ul>
					<li><?php esc_html_e('In the Blog Dashboard, select Appearance > Menus.','freeware');?></li>
					<li><?php esc_html_e('Under the Menu Settings, located at the bottom of your screen, select Primary Menu/ Social Links','freeware');?></li>
					<li><?php esc_html_e('Click save menu','freeware');?></li>
				</ul>
				<strong><p><?php esc_html_e('Sample of Demo Import Plugin is same for all themes. Although it does not belongs to this site but the process is same.','freeware'); ?></p></strong>
				<a href="https://www.youtube.com/watch?v=PmoUGhFnMiw" class="button button-primary" style="text-decoration: none;" target="_blank">

						<?php esc_html_e( 'Watch Sample Demo Import Video', 'freeware' ); ?></a>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg">
			</article>

			<article class="content three">
			   <h3><?php esc_html_e('About Support','freeware');?></h3>
				<p><?php esc_html_e('Need Help? Use our Forums if you have any Themes and Plugins related questions. Support will be provided only related to our Themes and Plugins','freeware');?>
					<a href="<?php echo esc_url('https://themespiral.com/forums/'); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Forums','freeware');?></a>
				</p>
				<h3><?php esc_html_e('Sales Questions','freeware');?></h3>
				<p><?php esc_html_e('Do you have discussion relating to billing, your account or have pre-sales questions? Get touch with us!','freeware');?>
					<a href="<?php echo esc_url('https://themespiral.com/contact-us/');?>" target="_blank" class="button button-primary"> <?php esc_html_e('Contact us','freeware');?></a>
				</p>
			   <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg">
			</article>

			<article class="content four">
			   <h3><?php esc_html_e('Video Tutorials','freeware');?></h3>
				<h4> <?php esc_html_e('Setup Site Identity','freeware'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=kfZWykwb9LU"><?php esc_html_e( 'Watch Video', 'freeware' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=title_tagline')); ?>"></span><?php esc_html_e( 'Site Identity', 'freeware' ); ?></a>

				<h4> <?php esc_html_e('Setup Main Banner','freeware'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=yxAaFbhTZ1w"><?php esc_html_e( 'Watch Video', 'freeware' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=freeware_main_banner_section')); ?>"></span><?php esc_html_e( 'Main Banner', 'freeware' ); ?></a>

				<h4> <?php esc_html_e('Setup Highlighted Category','freeware'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=eXkK3EXdj2c"><?php esc_html_e( 'Watch Video', 'freeware' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=freeware_category_highlight_section')); ?>"></span><?php esc_html_e( 'Highlighted Category', 'freeware' ); ?></a>

				<h4> <?php esc_html_e('Setup Social Icons','freeware'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=MUBgLU7IuG0"><?php esc_html_e( 'Watch Video', 'freeware' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Social Icons', 'freeware' ); ?></a>

				<h4> <?php esc_html_e('Setup Color Schemes','freeware'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=ynq_HEkvz2c"><?php esc_html_e( 'Watch Video', 'freeware' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=colors')); ?>"></span><?php esc_html_e( 'Color Schemes', 'freeware' ); ?></a>

				<h4> <?php esc_html_e('Setup Primary Menu','freeware'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=ejy2J_SIoXg"><?php esc_html_e( 'Watch Video', 'freeware' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Primary Menu', 'freeware' ); ?></a>

				<h4> <?php esc_html_e('Setup Header','freeware'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=kxUtpYfGL6k"><?php esc_html_e( 'Watch Video', 'freeware' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=header_image')); ?>"></span><?php esc_html_e( 'Setup Header', 'freeware' ); ?></a>
			</article>

			<article class="content five">
				 <h3><?php esc_html_e('Upgrade to Pro','freeware');?></h3>
				 <p><?php esc_html_e('Want additional features? Pro extension plugin adds additinal features for free themes. ','freeware')?><a href="<?php echo esc_url('https://themespiral.com/themes/freeware');?>" class="button button-primary button-hero" target="_blank"><?php esc_html_e('Upgrade to Pro','freeware');?></a></p>
			   <h3><?php esc_html_e('Pro Features Extension','freeware');?></h3>
				<div class="feature-content">
					<ul class="feature-text">
						<li><?php esc_html_e('Site Layout','freeware'); ?></li>
						<li><?php esc_html_e('Single Sidebar Layout','freeware'); ?></li>
						<li><?php esc_html_e('Flexible Content Width','freeware'); ?></li>
						<li><?php esc_html_e('Sidebar Content Width','freeware'); ?></li>
						<li><?php esc_html_e('Custom Design','freeware'); ?></li>
						<li><?php esc_html_e('Default Text Edit','freeware'); ?></li>
						<li><?php esc_html_e('Choose Main Banner','freeware'); ?></li>
						<li><?php esc_html_e('Main Banner Settings','freeware'); ?></li>
						<li><?php esc_html_e('Category highlight settings','freeware'); ?></li>
						<li><?php esc_html_e('More Highlighted Category Display','freeware'); ?></li>
						<li><?php esc_html_e('Excerpt Text edit','freeware'); ?></li>
						<li><?php esc_html_e('Footer Layout','freeware'); ?></li>
						<li><?php esc_html_e('Footer Edit','freeware'); ?></li>
						<li><?php esc_html_e('Instagram Compatible','freeware'); ?></li>
						<li><?php esc_html_e('Unlimited Color','freeware'); ?></li>
						<li><?php esc_html_e('Font Color','freeware'); ?></li>
						<li><?php esc_html_e('Background Color','freeware'); ?></li>
						<li><?php esc_html_e('Font Size','freeware'); ?></li>
						<li><?php esc_html_e('Font Family','freeware'); ?></li>
						<li><?php esc_html_e('Footer Column 1/2/3/4','freeware'); ?></li>
						<li><?php esc_html_e('Footer Edit options','freeware'); ?></li>
						<li><?php esc_html_e('More Social Icons','freeware'); ?></li>
						<li><?php esc_html_e('Change Featured Text in Sticky Post','freeware'); ?></li>
					</ul>
			    </div><!-- .feature-content -->
			</article>
		</div>
		<div class="pro-content">
			<div class="pro-content-wrap">
				<div class="pro-content-header">
					<h3><?php esc_html_e('Powerful Pro Extension Features','freeware');?></h3>
					<p><?php esc_html_e('Get unlimited features using Pro extension. Purchase Freeware Pro extension and get additional features and advanced customization options to make your website look awesome in different styles. ','freeware'); ?></p>
				</div>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/free_vs_pro.png" alt="<?php esc_attr_e('Free vs Pro','freeware');?>">
			</div>
		</div>
	</div>
</div>
<?php }