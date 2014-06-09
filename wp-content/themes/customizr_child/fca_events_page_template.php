<?php
/*
Template Name: FCA Events Template
*/
?>
<?php do_action( '__before_main_wrapper' ); ##hook of the header with get_header ?>
<div id="main-wrapper" class="<?php echo tc__f( 'tc_main_wrapper_classes' , 'container' ) ?>">

    <?php do_action( '__before_main_container' ); ##hook of the featured page (priority 10) and breadcrumb (priority 20)...and whatever you need! ?>
    
    <div class="container" role="main">
        <div class="<?php echo tc__f( 'tc_column_content_wrapper_classes' , 'row column-content-wrapper' ) ?>">

            <?php do_action( '__before_article_container'); ##hook of left sidebar?>
            
                <div id="content" class="<?php echo tc__f( '__screen_layout' , tc__f ( '__ID' ) , 'class' ) ?> article-container">
                    
                    <?php do_action ('__before_loop');##hooks the header of the list of post : archive, search... ?>

                        <div class="div_recent_posts">
                           
                            <ul class="recent_posts">
                                <h1>Recent Posts</h1>
                               <?php 
                                $args = array('category' => 2, 'numberposts' => 10);
                                $recent_news = wp_get_recent_posts($args);

                                foreach ($recent_news as $recent){
                                    echo '<li><a href="'.get_permalink($recent["ID"]).'">'.$recent["post_title"].'</a></li>';
                                }

                                ?>
                            </ul>
                        </div>

                        <?php query_posts( 'cat=2' ); ?>

                        <div class="news_posts_content">
                        <h1>Latest FCA Events</h1>
                        <?php if ( have_posts() ) : ?>
                            <?php while ( have_posts() ) : ##all other cases for single and lists: post, custom post type, page, archives, search, 404 ?>
                                
                                <?php the_post(); ?>
                                <?php do_action ('__before_article') ?>
                                    <article <?php tc__f('__article_selectors') ?>>
                                        <?php do_action( '__loop' ); ?>
                                    </article>
                                <?php do_action ('__after_article') ?>

                            <?php endwhile; ?>

                        <?php endif; ##end if have posts ?>
                        </div>

                    <?php do_action ('__after_loop');##hook of the comments and the posts navigation with priorities 10 and 20 ?>

                </div><!--.article-container -->

           <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

    <script>

        (function($){

          /*Follow Scrolling for the Menu*/
          var $container = $('.container'),
         
          // create a clone that will be used for measuring container width
          $containerProxy = $container.clone().empty().css({ visibility: 'hidden' });   
          $container.after( $containerProxy );
          var getWidth = Math.floor( $containerProxy.width());  

          if(getWidth > 400){
             var $sidebar   = $("div.div_recent_posts"), 
              $window    = $(window),
              offset     = $sidebar.offset(),
              topPadding = 90;

              $window.scroll(function() {
                  if ($window.scrollTop() > offset.top) {
                      $sidebar.stop().animate({
                          marginTop: $window.scrollTop() - offset.top + topPadding
                      });
                  } else {
                      $sidebar.stop().animate({
                          marginTop: 0
                      });
                  }
              });
            }

        } ) ( jQuery );
    </script>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>