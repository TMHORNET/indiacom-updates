<?php

namespace WPDataAccess\API {

	class WPDA_Apps {

		public static function get_app_list() {

			global $wpdb;
			$dataset = $wpdb->get_results(
				$wpdb->prepare("
					select *
					from `%1s`
					order by 1
				",
					array(
						"{$wpdb->prefix}wpda_app"
					)
				),
				'ARRAY_A'
			);

			return WPDA_API::WPDA_Rest_Response(
				'',
				$dataset
			);

		}

	}

}