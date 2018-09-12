<!-- <td><select style="width:100%">
    <option selected hidden>Filter</option>
</select></td> -->
<td>
    
</td>
<td>
    
</td>

<?php foreach ($filters as $attr_slug => $terms):?>
<td><select class="attr_filters" data-attr_slug="<?= $attr_slug ?>" style="width:100%">
    <option selected  value="">Filter</option>
    <?php foreach ($terms as $term):?>
        <option value="<?= $term->term_id ?>"><?= $term->name ?></option>
    <?php endforeach ?>
</select></td>
<?php endforeach ?>
<td></td>
<td></td>
<td></td>
<td></td>