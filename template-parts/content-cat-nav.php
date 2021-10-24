<?php 
/**
 * How-To Category (show categories)
 */
if ( cat_is_ancestor_of( 44, $cat ) || is_category( 'how-to' ) ) { ?>
<section class="container-nb">
<ul class="cat-nav">
    <?php wp_list_categories( array(
        'orderby'      => 'parent',
        'child_of'     => 45,
        'category'         => 45,
        'title_li'            => __( '' ),
        'show_count'         => false,
        'use_desc_for_title' => false
        //'child_of'           => ''
    ) ); ?>
</ul>
</section>
<?php } ?>
<?php 
/**
 * Lifestyle Category (show categories)
 */
if ( cat_is_ancestor_of( 42, $cat ) || is_category( 'lifestyle' ) ) { ?>
<section class="container-nb">
<ul class="cat-nav">
    <?php wp_list_categories( array(
        'orderby'      => 'parent',
        'child_of'     => 42,
        'category'         => 42,
        'title_li'            => __( '' ),
        'show_count'         => false,
        'use_desc_for_title' => true
        //'child_of'           => ''
    ) ); ?>
</ul>
</section>
<?php } ?>
<?php 
/**
 * Permaculture Category (show categories)
 */
if ( cat_is_ancestor_of( 33, $cat ) || is_category( 'permaculture' ) ) { ?>
<section class="container-nb">
<ul class="cat-nav">
    <?php wp_list_categories( array(
        'orderby'      => 'parent',
        'child_of'     => 33,
        'category'         => 33,
        'title_li'            => __( '' ),
        'show_count'         => false,
        'use_desc_for_title' => false
        //'child_of'           => ''
    ) ); ?>
</ul>
</section>
<?php } ?>
