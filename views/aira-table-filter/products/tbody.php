<tr>
    <?php foreach ($product_ids as $id):
    $post    = get_post( $id );
    $product = get_product( $id );
    $pid = $product->get_id();
    $attributes = $product->get_attributes(); 
    $price = $product->get_price();
    $url = $product->get_permalink() ;
        ?>
    <pre>
    <?= $product ?>
    </pre> 
            <!-- <td>
                <?php //echo $post->post_title ?>
            </td> -->
            <!-- <td>
                <img src="<?php //echo get_the_post_thumbnail_url($post->ID); ?>" class="img-responsive" alt=""/>
            </td> -->
    <?php foreach ($attr_slugs as $slug): ?> 
        <?php if (isset($attributes['pa_' . $slug])): ?>
            <td>
                <?php $pa = $attributes['pa_' . $slug] ?>
                <?php echo($pa->get_terms()[0]->name); ?>
            </td>
        <?php else: ?>
            <td>

            </td>
        <?php endif ?>
    <?php endforeach ?>
            <td>
                <input type="number" id="quantity_5b82b5d1e8017" class="input-text qty text" step="1" min="1" max="99" name="quantity" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
            </td>
            <td>
                <?php if (isset($price)): ?>
                    <?= "£" . $price?>
                <?php endif ?>
            </td>
            <td>
                <div class="product-buttons">  	
                    <div class="product-cart">
                        <a href="/product-category/wire-mesh/types-chicken-wire/?add-to-cart=<?= $pid ?>" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?= $pid ?>" data-product_sku="" aria-label="Add “1m x 5m x 25mm PVC Chicken Wire Netting” to your basket" rel="nofollow">Add to basket</a>		</div>
                    <div class="quickview-button">
                    </div>		
                </div>
            </td>
            <td>
                    <a href="<?= $url ?>" target="_blank"><img alt='🔍' class="spyglass" src='https://s.w.org/images/core/emoji/11/svg/1f50d.svg'></a>
            </td>
    </tr>
<?php endforeach ?>

