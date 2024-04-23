<?php

namespace WPDataAccess\API {

	use WPDataAccess\Connection\WPDADB;

	class WPDA_Actions {

		public static function rename(
			$dbs,
			$from_tbl,
			$to_tbl
		) {

			// All values have already been validated and sanitized in the rest route registration.

			$wpdadb = WPDADB::get_db_connection( $dbs );
			if ( null === $wpdadb ) {
				return sprintf( __( 'Remote database %s not available', 'wp-data-access' ), esc_attr( $dbs ) );
			}

			$suppress_errors = $wpdadb->suppress_errors;
			$wpdadb->suppress_errors = true;

			$wpdadb->query(
				$wpdadb->prepare(
					'rename table `%1s` to `%1s`',
					array(
						$from_tbl,
						$to_tbl,
					)
				)
			);

			$wpdadb->suppress_errors = $suppress_errors;

			return $wpdadb->last_error;

		}

		public static function copy(
			$from_dbs,
			$to_dbs,
			$from_tbl,
			$to_tbl,
			$copy_data
		) {

			// All values have already been validated and sanitized in the rest route registration.

			$wpdadb_from = WPDADB::get_db_connection( $from_dbs );
			if ( null === $wpdadb_from ) {
				return sprintf( __( 'Remote database %s not available', 'wp-data-access' ), esc_attr( $from_dbs ) );
			}

			$wpdadb_to = WPDADB::get_db_connection( $to_dbs );
			if ( null === $wpdadb_to ) {
				return sprintf( __( 'Remote database %s not available', 'wp-data-access' ), esc_attr( $to_dbs ) );
			}

			$suppress_errors_from = $wpdadb_from->suppress_errors;
			$wpdadb_from->suppress_errors = true;

			$suppress_errors_to = $wpdadb_to->suppress_errors;
			$wpdadb_to->suppress_errors = true;

			// Get create table statement.
			$wpdadb_from->query( "SET sql_mode = 'NO_TABLE_OPTIONS'" );
			$sql_cmd = $wpdadb_from->get_results(
				$wpdadb_from->prepare(
					'show create table `%1s`',
					array(
						$from_tbl
					)
				),
				'ARRAY_A'
			);

			// Check for errors.
			if ( '' !== $wpdadb_from->last_error ) {
				$wpdadb_from->suppress_errors = $suppress_errors_from;
				$wpdadb_to->suppress_errors   = $suppress_errors_to;

				return $wpdadb_from->last_error;
			}

			if ( ! isset( $sql_cmd[0]['Create Table'] ) ) {
				$wpdadb_from->suppress_errors = $suppress_errors_from;
				$wpdadb_to->suppress_errors   = $suppress_errors_to;

				return 'Create command table failed';
			}

			// Update destination table name if applicable.
			$create_table_statement = $sql_cmd[0]['Create Table'];
			if ( $from_tbl !== $to_tbl ) {
				// Modify create table statement
				$pos = strpos( $create_table_statement, $from_tbl );
				if ($pos !== false) {
					$create_table_statement = substr_replace( $create_table_statement, $to_tbl, $pos, strlen( $from_tbl ) );
				}
			}

			// Create new table.
			$wpdadb_to->query( $create_table_statement );

			// Check for errors.
			if ( '' !== $wpdadb_to->last_error ) {
				$wpdadb_from->suppress_errors = $suppress_errors_from;
				$wpdadb_to->suppress_errors   = $suppress_errors_to;

				return $wpdadb_to->last_error;
			}

			if ( '1' === $copy_data ) {
				// Copy data from source to destination table.
				set_time_limit( 0 ); // Prevent time out.
				// Use a cursor to process all rows and prevent exhausting memory.
				// Process 100 rows per batch to prevent exhausting memory.
				$buffer_size = 100;
				$index       = 0;
				$loop_done   = false;
				while ( ! $loop_done ) {
					// Get rows.
					$rows = $wpdadb_from->get_results(
						$wpdadb_from->prepare(
							'select * from `%1s` limit %1s offset %1s',
							array(
								$from_tbl,
								$buffer_size,
								$index * $buffer_size
							)
						),
						'ARRAY_A'
					);

					// Process rows.
					foreach ( $rows as $row ) {
						$wpdadb_to->insert(
							$to_tbl,
							$row
						);
					}

					if ( 100 > count( $rows ) ) {
						// No more rows to process.
						$loop_done = true;
					}

					$index++;
				}
			}

			$wpdadb_from->suppress_errors = $suppress_errors_from;
			$wpdadb_to->suppress_errors   = $suppress_errors_to;

			return '';

		}

		public static function truncate(
			$dbs,
			$tbl
		) {

			// All values have already been validated and sanitized in the rest route registration.

			$wpdadb = WPDADB::get_db_connection( $dbs );
			if ( null === $wpdadb ) {
				return sprintf( __( 'Remote database %s not available', 'wp-data-access' ), esc_attr( $dbs ) );
			}

			$suppress_errors = $wpdadb->suppress_errors;
			$wpdadb->suppress_errors = true;

			$wpdadb->query(
				$wpdadb->prepare(
					'truncate table `%1s`',
					array(
						$tbl,
					)
				)
			);

			$wpdadb->suppress_errors = $suppress_errors;

			return $wpdadb->last_error;

		}

		public static function drop(
			$dbs,
			$tbl
		) {

			// All values have already been validated and sanitized in the rest route registration.

			$wpdadb = WPDADB::get_db_connection( $dbs );
			if ( null === $wpdadb ) {
				return sprintf( __( 'Remote database %s not available', 'wp-data-access' ), esc_attr( $dbs ) );
			}

			$suppress_errors = $wpdadb->suppress_errors;
			$wpdadb->suppress_errors = true;

			$wpdadb->query(
				$wpdadb->prepare(
					'drop table `%1s`',
					array(
						$tbl,
					)
				)
			);

			$wpdadb->suppress_errors = $suppress_errors;

			return $wpdadb->last_error;

		}

	}

}