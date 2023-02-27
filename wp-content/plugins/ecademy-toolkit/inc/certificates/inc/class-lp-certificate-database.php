<?php

class LP_Certificate_DB extends LP_Database {
	public static $_instance;

	protected function __construct() {
		parent::__construct();
	}

	public static function getInstance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function add_data_cert_to_user_items( $data_user_item_cert ) {
		$result = $this->wpdb->insert(
			self::getInstance()->tb_lp_user_items,
			$data_user_item_cert,
			array( '%s', '%s', '%s', '%s', '%s', '%s' )
		);

		return $result;
	}

	/**
	 * Get lp order id of certificate
	 *
	 * @param array $data
	 *
	 * @return array|object|void|null
	 */
	public function get_order_id_of_cert_course( $data = array() ) {
		if ( ! isset( $data['user_id'] ) || ! isset( $data['cert_id'] ) || ! isset( $data['course_id'] ) ) {
			return null;
		}

		$query = $this->wpdb->prepare(
			"SELECT ref_id
			FROM {$this->tb_lp_user_items}
			WHERE user_id = %d
			  AND item_id = %d
			  AND item_type = %s
			  AND ref_type = %s
			  AND parent_id =
			      (SELECT user_item_id
			       FROM {$this->tb_lp_user_items}
			       WHERE item_type = %s
			         AND item_id = %d
			         AND user_id = %d
			         AND status = %s
			       ORDER BY user_item_id DESC
			       LIMIT 1)
			ORDER BY ref_id DESC
			LIMIT 1",
			$data['user_id'],
			$data['cert_id'],
			'lp_certificate',
			LP_ORDER_CPT,
			LP_COURSE_CPT,
			$data['course_id'],
			$data['user_id'],
			'finished'
		);

		$result = $this->wpdb->get_row( $query );

		return $result;
	}

	/**
	 * Get Courses
	 *
	 * @param LP_Certificate_Filter $filter
	 * @param int $total_rows return total_rows
	 *
	 * @return array|null|int|string
	 * @throws Exception
	 * @author tungnx
	 * @version 1.0.0
	 * @since 4.0.2
	 */
	public function query_certificates( LP_Certificate_Filter $filter, int &$total_rows = 0 ) {
		$result = null;

		// Where
		$WHERE   = array( 'WHERE 1=1' );
		$WHERE[] = $this->wpdb->prepare( 'AND p.post_type = %s', $filter->post_type );

		// Status
		$filter->post_status = (array) $filter->post_status;
		if ( ! empty( $filter->post_status ) ) {
			$post_status_format = LP_Helper::db_format_array( $filter->post_status, '%s' );
			$WHERE[]            = $this->wpdb->prepare( 'AND p.post_status IN (' . $post_status_format . ')', $filter->post_status );
		}

		// Inner join
		$INNER_JOIN = array();
		// Term ids
		if ( ! empty( $filter->term_ids ) ) {
			$INNER_JOIN[] = "INNER JOIN $this->tb_term_relationships AS r_term ON p.ID = r_term.object_id";

			$term_ids_format = LP_Helper::db_format_array( $filter->term_ids, '%d' );
			$WHERE[]         = $this->wpdb->prepare( 'AND r_term.term_taxonomy_id IN (' . $term_ids_format . ')', $filter->term_ids );
		}

		// Title
		if ( $filter->post_title ) {
			$WHERE[] = $this->wpdb->prepare( 'AND p.post_title LIKE %s', '%' . $filter->post_title . '%' );
		}

		// Author
		if ( $filter->post_author ) {
			$WHERE[] = $this->wpdb->prepare( 'AND p.post_author = %d', $filter->post_author );
		}

		// Fields select
		$FIELDS = '*';
		if ( ! empty( $filter->fields ) ) {
			$FIELDS = implode( ',', array_unique( $filter->fields ) );
		}
		$FIELDS = apply_filters( 'lp/addon/certificate/query/fields', $FIELDS, $filter );

		$INNER_JOIN = array_merge( $INNER_JOIN, $filter->join );
		$INNER_JOIN = apply_filters( 'lp/addon/certificate/query/inner_join', $INNER_JOIN, $filter );
		$INNER_JOIN = implode( ' ', array_unique( $INNER_JOIN ) );

		$WHERE = array_merge( $WHERE, $filter->where );
		$WHERE = apply_filters( 'lp/addon/certificate/query/where', $WHERE, $filter );
		$WHERE = implode( ' ', array_unique( $WHERE ) );

		// Order by
		$ORDER_BY = '';
		if ( ! $filter->return_string_query && $filter->order_by ) {
			$ORDER_BY .= 'ORDER BY ' . $filter->order_by . ' ' . $filter->order . ' ';
			$ORDER_BY  = apply_filters( 'lp/addon/certificate/query/order_by', $ORDER_BY, $filter );
		}

		// Limit
		$LIMIT = '';
		if ( ! $filter->return_string_query ) {
			$filter->limit = absint( $filter->limit );
			if ( $filter->limit > $filter->max_limit ) {
				$filter->limit = $filter->max_limit;
			}
			$offset = $filter->limit * ( $filter->page - 1 );
			$LIMIT  = $this->wpdb->prepare( 'LIMIT %d, %d', $offset, $filter->limit );
		}

		// Query
		if ( ! $filter->query_count ) {
			$query = "SELECT $FIELDS FROM $this->tb_posts AS p
			$INNER_JOIN
			$WHERE
			$ORDER_BY
			$LIMIT
			";

			if ( $filter->return_string_query ) {
				return $query;
			}

			$result = $this->wpdb->get_results( $query );
		}

		// Query total rows
		$query_total = "SELECT COUNT($filter->field_count) FROM $this->tb_posts AS p
		$INNER_JOIN
		$WHERE
		";
		$total_rows  = (int) $this->wpdb->get_var( $query_total );

		$this->check_execute_has_error();

		if ( $filter->query_count ) {
			return $total_rows;
		}

		return $result;
	}
}

LP_Certificate_DB::getInstance();
