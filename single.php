<?php
get_header();?>

<?php ii(have_posts()): while(have_posts()): the_post():

the_title();
the_content();?>


<?php get_footer();?>