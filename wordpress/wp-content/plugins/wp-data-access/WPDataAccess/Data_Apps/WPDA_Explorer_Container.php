<?php

namespace WPDataAccess\Data_Apps;

class WPDA_Explorer_Container extends WPDA_Container
{
    public function __construct( $args = array() )
    {
        
        if ( !current_user_can( 'manage_options' ) ) {
            if ( isset( $args['feedback'] ) && false === $args['feedback'] ) {
                return;
            }
            throw new \Exception( __( 'ERROR: Not authorized', 'wp-data-access' ) );
        }
        
        parent::__construct();
    }
    
    public function show()
    {
        if ( !current_user_can( 'manage_options' ) ) {
            return;
        }
        
        if ( is_admin() ) {
            $this->show_on_backend();
        } else {
            $this->show_on_frontend();
        }
        
        $this->add_client();
    }
    
    private function show_on_backend()
    {
        ?>

			<div class="wrap wpda-explorer-backend">

				<h1 class="wp-heading-inline" style="margin-bottom: 25px">
					<?php 
        ?>
					Data Explorer
				</h1>

				<?php 
        $this->na( 'upload_file_container_multi' );
        $this->na( 'wpda_db_container' );
        $this->show_on_frontend();
        ?>

			</div>

			<style>
                .wpda-not-in-new-version {
                    display: grid;
                    grid-template-columns: auto auto;
                    justify-content: space-between;
                    align-items: center;
                    background-color: #fff;
                    border: 1px solid #666;
                    padding: 20px;
                    border-radius: 4px;
                    margin-bottom: 20px;
                }

                .wpda-close-link {
                    text-decoration: none;
                }
			</style>

			<script>
				jQuery(function() {
					jQuery("#wpda_toolbar_icon_go_backup").on("click", function() {
						jQuery("#wpda_db_container").show();
					});
				});
			</script>

			<?php 
    }
    
    private function show_on_frontend()
    {
        ?>

			<div class="wpda-pp-container">
				<div class="pp-container-explorer"></div>
			</div>

			<?php 
    }
    
    private function na( $id )
    {
        ?>

			<div id="<?php 
        echo  esc_attr( $id ) ;
        ?>" style="display: none" class="wpda-not-in-new-version">
					<span>
						This feature is not yet available in the new version. Please switch to the old version.
					</span>
				<span>
						<a href="javascript:jQuery('#<?php 
        echo  esc_attr( $id ) ;
        ?>').hide()" class="wpda-close-link">close</a>
					</span>
			</div>

			<?php 
    }

}