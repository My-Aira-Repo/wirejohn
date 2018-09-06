<?php

include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'products.php');

class AiraController {
    
    public static function getProductsAjax() {

        $attr_slugs = ["industry", "application","material", "finish", "hole-size-aperture", "wire-diameter", "wire-diameter-gauge", "height", "length"];
        
        if (wp_doing_ajax()) {
            $query_args = $_POST;

        } else {
            $query_args['pagination'] = ['posts_per_page' => 2, 'page' => 1];
        }

        $productModel = new ProductModel();
        $product_ids = $productModel->get_product_ids($query_args);
        $query_args['pagination']['count'] = $productModel->count_products($query_args);
        $filters = $productModel->get_filters();

        if (wp_doing_ajax()) {
            $table_body_view = AiraTableView::load('aira-table-filter.products.tbody', compact('product_ids', 'filters', 'query_args', 'attr_slugs'));
            $pagination_view = AiraTableView::load('aira-table-filter.products.pagination', compact('product_ids', 'filters', 'query_args', 'attr_slugs'));
            echo json_encode(compact('table_body_view', 'pagination_view'));
    		wp_die();
        } else {
            echo AiraTableView::load('aira-table-filter.products.table', compact('product_ids', 'filters', 'query_args', 'attr_slugs'));
        }
    }

}