<?php

namespace WPDataAccess\Data_Apps;

use  WPDataAccess\WPDA ;
abstract class WPDA_Container
{
    public function __construct()
    {
        wp_enqueue_style( 'wpda_data_apps' );
        wp_enqueue_media();
    }
    
    protected function add_client()
    {
        $script_url = plugin_dir_url( __DIR__ ) . '../assets/dist/main.js';
        ?>

			<script>
				window.PP_APP_CONFIG = {
					appDebug: <?php 
        echo  ( 'on' === WPDA::get_option( WPDA::OPTION_PLUGIN_DEBUG ) ? 'true' : 'false' ) ;
        ?>,
					appSite: <?php 
        echo  json_encode( wpda_freemius()->get_site(), true ) ;
        ?>,
					appLicense: <?php 
        echo  json_encode( wpda_freemius()->get_available_premium_licenses(), true ) ;
        ?>,
					appTarget: "<?php 
        echo  ( is_admin() ? 'backend' : 'frontend' ) ;
        ?>"
				}
			</script>
			<script type="module" src="<?php 
        echo  esc_attr( $script_url ) ;
        ?>"></script>

			<?php 
    }

}