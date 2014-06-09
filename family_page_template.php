<?php
/*
Template Name: Families Page Template
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

                    <div id="families_sidebar">

                        <?php echo '<ul id="filters">';
                          $terms = get_terms('families');
                          $count = count($terms);

                          echo '<h1 class="past_boards">Families</h1>';
                           if ( $count > 0 ){
                                      
                              foreach ( $terms as $term ) {
                                              
                              $termname = strtolower($term->name);
                              $termname = str_replace(' ', '-', $termname);

                              echo '<li><a href="javascript:void(0)" title="" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                                          
                              }

                          }
                      echo '<li><a href="javascript:void(0)" title="" data-filter=".all" class="active">All Families</a></li>';
                      echo '</ul>';?>

                      </div>

                       <div id="fca_member">

                        <?php
                        /* 
                        Query the post 
                        */
                        $args = array( 'post_type' => 'fca_member', 'posts_per_page' => -1 );
                        $loop = new WP_Query( $args );
                          while ( $loop->have_posts() ) : $loop->the_post(); 
                         
                        /* 
                        Pull category for each unique post using the ID 
                        */
                        $terms = get_the_terms( $post->ID, 'families' );    
                             if ( $terms && ! is_wp_error( $terms ) ) : 
                         
                                 $links = array();
                         
                                 foreach ( $terms as $term ) {
                                     $links[] = $term->name;
                                 }
                         
                                 $tax_links = join( " ", str_replace(' ', '-', $links));          
                                 $tax = strtolower($tax_links);
                             else : 
                             $tax = '';                 
                             endif; 

                                  $name = simple_fields_get_post_value($post->ID, 'Name');
                                  $year = simple_fields_get_post_value($post->ID, 'Class of Year');

                                  echo '<div class="all fca_member-item '. $tax .'" data-category="'.$year.'">';
                                  echo '<p class="name"><b>' . $name . '</b></p>';
                                  echo '<p class="year"><i>Class of <span class="number">'.$year .'</span></i></p>'; 
                                  echo '</div>';

                          endwhile; ?>
                         
                        </div>
                </div><!--.article-container -->

           <?php do_action( '__after_article_container'); ##hook of left sidebar ?>

        </div><!--.row -->
    </div><!-- .container role: main -->

    <?php do_action( '__after_main_container' ); ?>

    <!--Isotope Code Here-->
    <script>

        (function($){

          /*Follow Scrolling for the Menu*/
          var $container = $('#fca_member'),
         
          // create a clone that will be used for measuring container width
          $containerProxy = $container.clone().empty().css({ visibility: 'hidden' });   
          $container.after( $containerProxy );
          var getWidth = Math.floor( $containerProxy.width());  

          if(getWidth > 726){
             var $sidebar   = $("div#families_sidebar"), 
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

          
          /*ISOTOPE BELOW*/ 
         
            // get the first item to use for measuring columnWidth
          var $item = $container.find('.fca_member-item').eq(0);
          $container.imagesLoaded(function(){
          $(window).smartresize( function() {
         
            // calculate columnWidth

            if(getWidth > 1200){
              var colWidth = Math.floor( $containerProxy.width() / 4 );
              var n = 4;
            }
            else if(getWidth > 1800){
              var colWidth = Math.floor( $containerProxy.width() / 5 );
              var n = 5;
            }
            else{
              var getWidth = Math.floor( $containerProxy.width() / 3 ); // Change this number to your desired amount of columns
              var n = 3;
            }

            // set width of container based on columnWidth
            $container.css({
                width: colWidth * n // Change this number to your desired amount of columns
            })
            .isotope({
         
              // disable automatic resizing when window is resized
              resizable: false,
         
              // set columnWidth option for masonry
              layoutMode: 'fitRows',
              masonry: {
                columnWidth: colWidth
              },

              getSortData:{
                 number : function( $elem ) {
                    return parseInt( $elem.find('.number').text(), 10 );
                  },
              },

              sortBy: 'number',
              sortAscending: false

            });
         
            // trigger smartresize for first time
          }).smartresize();
           });


         

        var selector = '.family-1';
        $container.isotope({ filter: selector, animationEngine : "css" });

        // filter items when filter link is clicked
        $('#filters a').click(function(){
            $('#filters a.active').removeClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({ filter: selector, animationEngine : "css" });
            $(this).addClass('active');
            // $('.eboard_year_label').text(selector);

            return false;
             
            });
        } ) ( jQuery );
    </script>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>