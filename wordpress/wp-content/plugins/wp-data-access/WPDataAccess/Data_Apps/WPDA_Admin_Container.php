<?php

namespace WPDataAccess\Data_Apps {

	class WPDA_Admin_Container extends WPDA_Container {

		private $dbs = '';
		private $tbl = '';

		public function __construct(
			$args = array()
		) {

			if ( ! current_user_can( 'manage_options' ) ) {
				if (
					isset( $args['feedback'] ) &&
					false === $args['feedback']
				) {
					return;
				}

				throw new \Exception( __( 'ERROR: Not authorized', 'wp-data-access' ) );
			}

			if (
				isset(
					$args['dbs'],
					$args['tbl']
				)
			) {
				$this->dbs = $args['dbs'];
				$this->tbl = $args['tbl'];
			} else {
				if (
					isset( $args['feedback'] ) &&
					false === $args['feedback']
				) {
					return;
				}

				throw new \Exception( __( 'ERROR: Invalid usage', 'wp-data-access' ) );
			}

			parent::__construct();

		}

		public function show() {

			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}

			?>

			<div class="wpda-pp-container">
				<div
					class="pp-container"
					data-source="{ 'dbs': '<?php echo esc_attr( $this->dbs ); ?>', 'tbl': '<?php echo esc_attr( $this->tbl ); ?>' }"
				></div>
			</div>

			<?php

			$this->add_client();;

		}

	}

}