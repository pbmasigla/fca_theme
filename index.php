<?php
/**
 * The main template file. Includes the loop.
 *
 *
 * @package Customizr
 * @since Customizr 1.0
 */
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">

    <?php do_action('slideshow_deploy', '14'); ?>
    
    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>
    
    <div class="container" role="main">
        <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">

            <?php do_action( '__before_article_container'); ##hook of left sidebar?>
                
                <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">
                
                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>

                        <?php

                            $name = simple_fields_values('president_name', $post->ID);
                            $message = simple_fields_values('president_message', $post->ID);
                            $picture = simple_fields_values('president_picture', $post->ID);
                            
                            echo '<div class="president_div">';
                            echo '<div class="president_pic"><img src="'.wp_get_attachment_url($picture[0]) . '"/></div>';
                            echo '<div class="president_text"><p>Message from Our President: <b>' . $name[0] . '</b></p>';
                            echo '<p>' . $message[0] .'</p></div>';
                            echo '</div>';

                        ?>
                        <?php if ( tc__f('__is_no_results') || is_404() ) : ##no search results or 404 cases ?>

                            <article <?php tc__f('__article_selectors') ?>>
                                <?php do_action( '__loop' ); ?>
                            </article>
                            
                        <?php endif; ?>

                        <?php if ( have_posts() && !is_404() ) : ?>
                            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                                <?php the_post(); ?>

                                <?php do_action ('__before_article') ?>
                                    <article <?php tc__f('__article_selectors') ?>>
                                        <?php do_action( '__loop' ); ?>
                                    </article>
                                <?php do_action ('__after_article') ?>

                            <?php endwhile; ?>

                        <?php endif; ##end if have posts ?>

                    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->

           <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

    <script>
       (function($){
            
            //Responsive menu trigger
            var menu = $('.fca_news_events_outreach_tabs_div');
            var menuList = menu.find('ul:first');
            var listItems = menu.find('li').not('#responsive-tab');

            // Create responsive trigger
            menuList.prepend('<li id="responsive-tab"><a class="resp_menu">Menu</a></li>');

            // Toggle menu visibility
            menu.on('click', '#responsive-tab', function(){
                listItems.slideToggle('fast');
                listItems.addClass('collapsed');
            });
        
            $('.events_div').hide();
            $('.outreach_div').hide();

            $('#news').click(function(){
                $('.news_div').show();
                $('.events_div').hide();
                $('.outreach_div').hide();

                $('li#news').addClass('active');
                $('li#events').removeClass('active');
                $('li#outreach').removeClass('active');
            });
            $('#events').click(function(){
                $('.events_div').show();
                $('.news_div').hide();
                $('.outreach_div').hide();

                $('li#events').addClass('active');
                $('li#news').removeClass('active');
                $('li#outreach').removeClass('active');
            });
             $('#outreach').click(function(){
                $('.outreach_div').show();
                $('.news_div').hide();
                $('.events_div').hide();

                $('li#outreach').addClass('active');
                $('li#events').removeClass('active');
                $('li#news').removeClass('active');
            });
        } ) ( jQuery );
    </script>


</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>