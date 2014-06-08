<?php
/*
Template Name: Eboard Page Template
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

                     <?php echo '<div id="eboard_sidebar"><ul id="filters">';
                        $terms = get_terms('eboard_member_years');
                        $count = count($terms);
                        $rev_array = array_reverse($terms);

                         // echo '<li><a href="javascript:void(0)" title="" data-filter=".all" class="active">All</a></li>';
                        echo '<h1 class="past_boards">Past Boards</h1>';
                         if ( $count > 0 ){
                                    
                            foreach ( $rev_array as $term ) {
                                            
                            $termname = strtolower($term->name);
                            $termname = str_replace(' ', '-', $termname);

                            echo '<li><a href="javascript:void(0)" title="" data-filter=".'.$termname.'">'.$term->name.'</a></li>';
                                        
                            }

                        }
                    echo '</ul></div>';?>
                    <h1 class="eboard_year_label">Year 2014-2015 YEAH</h1>
                       <div id="eboard_member">
                        <?php
                        /* 
                        Query the post 
                        */
                        $args = array( 'post_type' => 'eboard_member', 'posts_per_page' => -1 );
                        $loop = new WP_Query( $args );
                          while ( $loop->have_posts() ) : $loop->the_post(); 
                         
                        /* 
                        Pull category for each unique post using the ID 
                        */
                        $terms = get_the_terms( $post->ID, 'eboard_member_years' );    
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

                                $name = simple_fields_get_post_value($post->ID, 'Name', true);
                                $position = simple_fields_get_post_value($post->ID, 'Position', true);
                                $order_number = simple_fields_get_post_value($post->ID, 'Order Number', true);
                                $major = simple_fields_get_post_value($post->ID, 'Major(s)', true);
                                $year = simple_fields_get_post_value($post->ID, 'Year', true);
                                $email = simple_fields_get_post_value($post->ID, 'Email', true);
                                $description = simple_fields_get_post_value($post->ID, 'Description', true);
                                $pic_gif = simple_fields_values('pic_gif', $post->ID);
                                $show_hide = simple_fields_get_post_value($post->ID, 'Show/Hide', true);
                                
                                if($show_hide == "Shown"){
                                    /* Insert category name into portfolio-item class */ 
                                    echo '<div class="all eboard_member-item '. $tax .'" data-category="'.$order_number.'">';

                                    /*the function simple_fields_get_post_value gets the data filled in on each member*/
                                    echo '<h1 class="member_name">'.$name.'</h1>';
                                    echo '<b class="member_position">'.$position.'</b></br>';
                                    echo '<a class="member_email" href="mailto:'.$email.'">'.$email.'</a><br/>';
                                    echo '<img class="member_pic" src="'. wp_get_attachment_url($pic_gif[0]) .'"/><br/>';
                                    echo '<p class="member_major_year">'.$major.'<br/>' .$year.'</p>';
                                    echo '<p class="member_description"><i>'.$description.'</i></p>';
                                    echo '<p class="number" style="visibility:hidden">' . $order_number .'</p>';
                                    echo '</div>';
                                }

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
          var $container = $('#eboard_member'),
         
          // create a clone that will be used for measuring container width
          $containerProxy = $container.clone().empty().css({ visibility: 'hidden' });   
          $container.after( $containerProxy );
          var getWidth = Math.floor( $containerProxy.width());  

          if(getWidth > 726){
             var $sidebar   = $("div#eboard_sidebar"), 
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
          var $item = $container.find('.eboard_member-item').eq(0);
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

            });
         
            // trigger smartresize for first time
          }).smartresize();
           });

          $container.isotope({
            getSortData:{
                 number : function( $elem ) {
                  return parseInt( $elem.find('.number').text(), 10 );
                    },
            },

            sortBy: 'number',
          });
         

        var selector = '.year-2014-2015';
        $container.isotope({ filter: selector, animationEngine : "css" });

        // filter items when filter link is clicked
        $('#filters a').click(function(){
            $('#filters a.active').removeClass('active');
            var selector = $(this).attr('data-filter');
            var year_label = $(this).text();
            $container.isotope({ filter: selector, animationEngine : "css" });
            $(this).addClass('active');
            $('.eboard_year_label').text(year_label);

            return false;
             
            });
        } ) ( jQuery );
    </script>

</div><!--#main-wrapper"-->

<?php do_action( '__after_main_wrapper' );##hook of the footer with get_get_footer ?>
