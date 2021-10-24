<?php 
/**
 * How-To Category (show categories)
 */
if ( cat_is_ancestor_of( 44, $cat ) || is_category( 'how-to' ) ) { ?>
<aside class="col">
<h5>How-To Categories</h5>
<ul>
    <?php wp_list_categories( array(
        'orderby'      => 'parent',
        'child_of'     => 45,
        'category'         => 45,
        'title_li'            => __( '' ),
        'show_count'         => true,
        'use_desc_for_title' => false
        //'child_of'           => ''
    ) ); ?>
</ul>
</aside>
<?php } ?>
<?php 
/**
 * Lifestyle Category (show categories)
 */
if ( cat_is_ancestor_of( 42, $cat ) || is_category( 'lifestyle' ) ) { ?>
<aside class="col">
<h5>Lifestyle Categories</h5>
<ul>
    <?php wp_list_categories( array(
        'orderby'      => 'parent',
        'child_of'     => 42,
        'category'         => 42,
        'title_li'            => __( '' ),
        'show_count'         => true,
        'use_desc_for_title' => false
        //'child_of'           => ''
    ) ); ?>
</ul>
</aside>
<?php } ?>
<?php 
/**
 * Permaculture Category (show categories)
 */
if ( cat_is_ancestor_of( 33, $cat ) || is_category( 'permaculture' ) ) { ?>
<aside class="col">
<h5>Permaculture Categories</h5>
<ul>
    <?php wp_list_categories( array(
        'orderby'      => 'parent',
        'child_of'     => 33,
        'category'         => 33,
        'title_li'            => __( '' ),
        'show_count'         => true,
        'use_desc_for_title' => false
        //'child_of'           => ''
    ) ); ?>
</ul>
</aside>
<?php } ?>
