<?php
function remove_editor() {
	remove_post_type_support('page', 'editor');
	remove_post_type_support('post', 'editor');
  //remove_post_type_support('categrory', 'description');
}
add_action('admin_init', 'remove_editor');
/*remove term descriptions from post editor */
function wpse_hide_cat_descr() { ?>
<style type="text/css">
.term-description-wrap {
	display: none;
}
tr.form-field.term-parent-wrap {

}
tr.form-field.term-slug-wrap {

}
</style>
<?php } 
add_action( 'admin_head-term.php', 'wpse_hide_cat_descr' );
add_action( 'admin_head-edit-tags.php', 'wpse_hide_cat_descr' );