<?php
?>

    <table class="which-mesh"> 
    <thead>
        <tr>
            <th style="width: 220px;">
                <span class="info application">i</span>
                <span class="az">
                    <i class="fa fa-sort" aria-hidden="true"></i>
                </span>
                <b>Application </b>
            </th>
            <th style="width: 115px;"><span class="info industry">i</span><b>Industry</b></th>
            <th style="width: 115px;"><span class="info material">i</span><b>Material </b></th>
            <th style="width: 115px;"><span class="info finish">i</span><b>Finish </b></th>
            <!-- <th><b>Hole Size </b><span class="info hole-size">i</span></th>
            <th><b>Diameter </b><span class="info wire-diameter">i</span></th>
            <th style="width: 90px;"><b>Gauge </b><span class="info gauge">i</span></th> -->
            <th style="width: 115px;"><span class="info height">i</span><b>Height </b></th>
            <th style="width: 115px;"><span class="info length">i</span><b>Length </b></th>
            <th style="width: 65px;"><b>Quantity</b></th>
            <th style="width: 100px;"><b>Price</b></th>
            <th style="width: 155px;"><b>Add to Cart</b></th>
            <th style="width: 60px;"><b>View</b></th>
        </tr>
    
         <tr id="aira_ajax_filters" class="aira-filter">
             <?php echo AiraTableView::load('aira-table-filter.products.filters',  compact('product_ids', 'filters', 'query_args')); ?>
        </tr>
    </thead>    
    <tbody id="aira_ajax_products">
        <div id="loader">
            <?php echo AiraTableView::load('aira-table-filter.products.tbody',  compact('product_ids', 'filters', 'query_args', 'attr_slugs')); ?>
        </div>
    </tbody>    
    <tfoot>
            <tr>
            </tr>
    </tfoot>
    </table>

    <!-- <div id="aira_ajax_pagination">
    <?php //echo AiraTableView::load('aira-table-filter.products.pagination',  compact('product_ids', 'filters', 'query_args')); ?>
    </div> -->

    <div id="airaModal" class="aira-modal">
    
        <!-- Modal content -->
        <div class="aira-modal-content application">
            <span class="aira-close">&times;</span>

            <div class="text-content">
                <h2>Application Type</h2>
                <p>To quickly find the mesh that you need click on the type of job that you need the mesh to do.  Under the ‘Application Type’ column you will find the common uses.</p>
            </div>
            <div class="img-content">
                <img src="/wp-content/themes/emallshop/images/product-listing-placeholder.jpg" alt="placeholder">
            </div>

        </div>

        <div class="aira-modal-content industry">
            <span class="aira-close">&times;</span>

            <div class="text-content">
                <h2>Industry Type</h2>
                <p>To quickly find the mesh that you need click on the type of job that you need the mesh to do.  Under the ‘Application Type’ column you will find the common uses.</p>
            </div>
            <div class="img-content">
                <img src="/wp-content/themes/emallshop/images/product-listing-placeholder.jpg" alt="placeholder">
            </div>

        </div>

        <!-- Modal content -->
        <div class="aira-modal-content material">
            <span class="aira-close">&times;</span>

            <div class="text-content">
                <h2>Material</h2>
                <p>stainless steel, etc</p>
            </div>
            <div class="img-content">
                <img src="/wp-content/themes/emallshop/images/product-listing-placeholder.jpg" alt="placeholder">
            </div>

        </div>

        <!-- Modal content -->
        <div class="aira-modal-content finish">
            <span class="aira-close">&times;</span>

            <div class="text-content">
                <h2>Finish</h2>
                <p>stainless steel, etc</p>
            </div>
            <div class="img-content">
                <img src="/wp-content/themes/emallshop/images/product-listing-placeholder.jpg" alt="placeholder">
            </div>

        </div>

        <!-- Modal content -->
        <div class="aira-modal-content hole-size">
            <span class="aira-close">&times;</span>

            <div class="text-content">
                <h2>Hole Size</h2>
                <p>This is the size of the space between the metal wire.</p>
            </div>
            <div class="img-content">
                <img src="/wp-content/themes/emallshop/images/product-listing-placeholder.jpg" alt="placeholder">
            </div>
        </div>

        <!-- Modal content -->
        <div class="aira-modal-content wire-diameter">
            <span class="aira-close">&times;</span>

            <div class="text-content">
                <h2>Wire Diameter</h2>
                <p>If you’re looking for a tougher and thicker wire netting, you should choose the highest diameter wire possible.</p>
            </div>
            <div class="img-content">
                <img src="/wp-content/themes/emallshop/images/product-listing-placeholder.jpg" alt="placeholder">
            </div>
        </div> 

        <!-- Modal content -->
        <div class="aira-modal-content gauge">
            <span class="aira-close">&times;</span>

            <div class="text-content">
                <h2>Gauge</h2>
                <p>Wire gauge measurements provide a quick and handy guide to the strength and thickness of wire. Whilst not logical, the lower the wire gauge number of a wire, the thicker and more heavy duty it is. If you’re looking for a tougher and thicker wire netting, you should choose the lowest gauge possible. For example 19g wire is thicker than 20g wire</p>
            </div>
            <div class="img-content">
                <img src="/wp-content/themes/emallshop/images/product-listing-placeholder.jpg" alt="placeholder">
            </div>
        </div>
        <!-- Modal content -->
        <div class="aira-modal-content height">
            <span class="aira-close">&times;</span>

            <div class="text-content">
                <h2>Height</h2>
                <p>This is the height of the mesh roll from the ground up.</p>
            </div>
            <div class="img-content">
                <img src="/wp-content/themes/emallshop/images/product-listing-placeholder.jpg" alt="placeholder">
            </div>
        </div>

        <!-- Modal content -->
        <div class="aira-modal-content length">
            <span class="aira-close">&times;</span>

            <div class="text-content">
                <h2>Length</h2>
                <p>This measurement is the complete length of the mesh roll when unravelled. </p>
            </div>
            <div class="img-content">
                <img src="/wp-content/themes/emallshop/images/product-listing-placeholder.jpg" alt="placeholder">
            </div>
        </div>

    
</div>
