<?php
/**
 * Cafe Faucher Slider Post Type
 *
 * @since Cafe Faucher 1.0
 */
function cf_slider_postType() {
    register_post_type('slides', array(
        'labels' => array(
            'name' => _x('Slides', 'Post Type General Name', 'cafe-faucher-child'),
            'singular_name' => _x('Slide', 'Post Type Singular Name', 'cafe-faucher-child')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-format-gallery',
    )
);
}
add_action('init', 'cf_slider_postType');

function do_carousel() {
    if (!is_front_page())
        return;
    // Query Post Type
    $args = array(
        'post_type' => 'slides',
        'post_status' => 'publish',
        'order' => 'asc',
        'orderby' => 'id',
    );

    $i = 1;
    $the_query = new WP_Query($args);
    // Build It
    if ($the_query->have_posts()) :
        ?>
        <div class="carousel">
            <div class="slides">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php the_content(); ?>       
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="controls">
                <div class="control prev-slide">&#9668;</div>
                <div class="control next-slide">&#9658;</div>
            </div>
        </div>
 <script>
 const delay = 6000; //ms
 const slides = document.querySelector(".slides");
 const slidesCount = slides.childElementCount;
 const maxLeft = (slidesCount - 1) * 100 * -1;
 let current = 0;
 function changeSlide(next = true) {
  if (next) {
    current += current > maxLeft ? -100 : current * -1;
} else {
    current = current < 0 ? current + 100 : maxLeft;
}
slides.style.left = current + "%";
}
let autoChange = setInterval(changeSlide, delay);
const restart = function() {
  clearInterval(autoChange);
  autoChange = setInterval(changeSlide, delay);
};
// Controls
document.querySelector(".next-slide").addEventListener("click", function() {
  changeSlide();
  restart();
});
document.querySelector(".prev-slide").addEventListener("click", function() {
  changeSlide(false);
  restart();
});
</script>
<?php
endif;
}
add_action('cf_carousel', 'do_carousel');
add_shortcode('cf_carousel', 'do_carousel');
//[cf_carousel]