<?php
/*
Template Name: Media Page Temlpate
*/
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>
    
    <div class="container" role="main">
        <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">

            <?php do_action( '__before_article_container'); ##hook of left sidebar?>
                
                <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">
                    
                    <div class="fb_gallery">
                        <?php
                            $album_name = simple_fields_get_post_value($post->ID, 'Album Name');
                            $album_id = simple_fields_get_post_value($post->ID, 'Album ID');
                            $album_link = simple_fields_get_post_value($post->ID, 'Album Link');

                            echo '<h1><a href="' . $album_link . '">' . $album_name . '</a></h1>';
                            $shortcode = '[fbphotos id='  .$album_id . ' ]';
                             echo do_shortcode($shortcode);
                        ?>

                    </div>
                </div><!--.article-container -->

           <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>