jQuery(document).ready(function($) {
$('.show-post').click(function() {
//console.log($(this).attr("value"));
document.getElementById("lightbox").className = "open";
//$('.posts-area').fadeIn(9000);
document.getElementById("close").addEventListener("click", function() {
document.getElementById("lightbox").className = "";
//refreshes out the previous post
$('.posts-area').empty();
console.log($(this).attr("value"));
});
document.getElementById("lightbox").addEventListener("click", function(e) {
if (e.target.id == "lightbox") {
//refreshes out the previous post
$('.posts-area').empty();
document.getElementById("lightbox").className = "";
}
//$('.posts-area').fadeOut(9000);
});
var postID = $(this).attr("value");
    // We'll pass this variable to the PHP function example_ajax_request
    //var fruit = 'Banana';

    // This does the ajax request
    $.ajax({
        // This is the wp ajax enqueue
        url: cf_ajax_object.ajax_url,
        data: {
            // This is the fuction for the php
            'action':'prefix_ajax_single_post',
            // This is value to new php varible value
            'pID' : postID
        },
        success:function(data) {
            // This outputs the result of the ajax request
            console.log(data);
             $('.posts-area').html( data ); 
            
        },
        error: function(errorThrown){
            console.log(errorThrown);
        }
    });  

});

});
