<?php

class ProductModel {

    public function get_product_query($args = []) {
    
        $query_args = $this->prepare_query_args($args);
        return new WP_Query( $args );
    }

    public function get_product_ids($args = []) {

        $query_args = $this->prepare_query_args($args);
        $query_args['fields'] = 'ids';
        return get_posts($query_args);
    }

    public function count_products($args = []) {

        $query_args = $this->prepare_query_args($args);
        $query_args['posts_per_page'] = -1;
        $wp_query = new WP_Query($query_args);
        return $wp_query->found_posts;
    }

    private function prepare_query_args($args = []) {

        $query_args = array(
            'post_type' => 'product',
            'posts_per_page' => 10,
            'orderby' => 'id',
			'order' => 'DESC',
        );

        if (isset($args['pagination'])) {
			$pagination = $args['pagination'];
			$query_args['posts_per_page'] = $pagination['posts_per_page'];
			if (isset($pagination['page'])) {
				$offset = ($pagination['page'] - 1) * $pagination['posts_per_page'];
				$query_args['offset'] = $offset;
			}
        }

        $attr_slugs = ["industry", "application", "material", "finish", "hole-size-aperture", "wire-diameter", "wire-diameter-gauge", "height", "length"];

         
        if (isset($args['filters'])) {
            $filter_args = [];

            // var_dump($args['filters']);

            foreach ($attr_slugs as $attr_slug) {
                if ($args['filters'][$attr_slug] !== "") {
                    // var_dump('valtozott', 'pa_' . $attr_slug, $args['filters'][$attr_slug]);
                    $filter_args[] = 
                        array(
                            'taxonomy' => 'pa_' . $attr_slug,
                            'field'    => 'term_id',
                            'terms'    => array( $args['filters'][$attr_slug] ),
                        );
                }
            }

            if (!empty($filter_args)) {

                $query_args['tax_query'] = $filter_args;
            }
        }
        
        return $query_args;
    }

    public function get_filters() {
        $attr_slugs = ["industry", "application", "material", "finish", "hole-size-aperture", "wire-diameter", "wire-diameter-gauge", "height", "length"];

        foreach ($attr_slugs as  $attr_slug) {
            $filters_values[$attr_slug] = $this->get_filter_options('pa_' . $attr_slug);
        }

        // var_dump($filters_values);
        return $filters_values;
    }
    
    public function get_filter_options($tax_name) {
        
        $args = [
            'taxonomy' => $tax_name,
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => '0',
        ];

        $terms = get_terms($args);

        usort($terms, function($a, $b){
            return strcmp($a->name, $b->name);
        });
        // var_dump($terms);
        return $terms;
    
    }

}