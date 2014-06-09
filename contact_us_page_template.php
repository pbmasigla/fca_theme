<?php
/*
Template Name: Contact Us Example
*/
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>
    
    <div class="container" role="main">
        <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">

            <?php do_action( '__before_article_container'); ##hook of left sidebar?>
                
                <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">
                    
                    <div class="contact_us_page_info">

                      <?php 

                        $title = simple_fields_get_post_value($post->ID, 'Contact Us Title');
                        $description = simple_fields_get_post_value($post->ID, 'Contact Us Description');

                        echo '<h1>' . $title . '</h1>';
                        echo $description;
                      ?>
                    </div>

                    <div class="contact_us_div">
                           
                       <?php echo do_shortcode('[ninja_forms_display_form id=1]');?>
                              
                    </div>

                </div><!--.article-container -->

           <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>