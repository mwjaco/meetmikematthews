<?php get_header(); ?>
    <body class="work">

        <div class="loader">
            <div class="loader-icon">
                <div></div>
                <div></div>
                <div></div>
            </div>            
        </div>
        <main class="sidebar work">
            <div class="sidebar-wrapper work">                              
            </div>
            <div class="sidebar-content">
                <div class="page-header">
                    <h1><?php the_title(); ?></h1>
                </div>                
                <div class="modal">
                    <ul class="portfolio-list">
                        <?php $args = array (   'post_type' => 'videos', 'orderby'=>'menu_order', 'order' => 'ASC' );       
                        $listingquery = new WP_Query( $args );?>                       
                        <?php if( $listingquery->have_posts() ) : while( $listingquery->have_posts() ) : $listingquery->the_post(); ?>
                        <?php global $post; $post_slug=$post->post_name;
                        $image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                        ?>
                            <li>
                                <label for="modal-<?php echo $post_slug ?>">
                                    <div class="modal-trigger"><?php the_title();?></div>
                                </label>
                                <input data-img="<?php echo $image_url ?>" data-clip="<?php echo $post_slug ?>" class="modal-state" id="modal-<?php echo $post_slug ?>" type="checkbox" />
                            </li>                        
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </ul>                   



                  <div class="modal-fade-screen">
                    <div class="modal-inner">
                      <div class="modal-close" for="modal-window"></div>
                        <div class="video">
                            <?php $args = array (   'post_type' => 'videos', 'order' => 'ASC' );       
                            $videoquery = new WP_Query( $args );?>                       
                            <?php if( $videoquery->have_posts() ) : while( $videoquery->have_posts() ) : $videoquery->the_post(); ?>
                            <?php global $post;
                                $post_slug=$post->post_name;
                                $image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                                $gallery = get_post_gallery($post->ID, false);
                                $vimeo_urls = preg_split('/\r\n|[\r\n]/', get_field('vimeo_url')); 
                            ?>
                                <div data-clip="<?php echo $post_slug ?>" class="video-wrapper" style="background-image:url('<?php echo $image_url ?>')">
                                    <?php
                                        echo '<div class="slider">';
                                        if (count($vimeo_urls) > 1 || $gallery) {
                                            $i = 0;
                                            foreach ($vimeo_urls as $vimeo_url) {
                                                if ($i == 0) {
                                                    echo '<input checked type="radio" name="slides_for_'.$post_slug.'" id="'.$post_slug.'_slide_'.$i.'" />';
                                                } else {
                                                    echo '<input type="radio" name="slides_for_'.$post_slug.'" id="'.$post_slug.'_slide_'.$i.'" />';
                                                }
                                                $i++;
                                            }
                                        }
                                        if ($gallery) {
                                            $gallery_attachment_ids = explode( ',', $gallery['ids'] );
                                            foreach ($gallery_attachment_ids as $id) {
                                                echo '<input type="radio" name="slides_for_'.$post_slug.'" id="'.$post_slug.'_slide_'.$id.'" />';
                                            }
                                        }
                                    ?>
                                    <ul>
                                        <?php
                                            foreach ($vimeo_urls as $vimeo_url) {
                                                echo '<li>';
                                                echo "<div class='embedded-video-wrapper'>";
                                                echo "<iframe data-src='". $vimeo_url ."' width='500' height='281' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
                                                echo "</div>";
                                                echo "</li>";
                                            }
                                            if ($gallery) {
                                                foreach ( $gallery['src'] as $src ) {
                                                    echo '<li>';
                                                    echo '<img src="'. $src .'" class="gallery-item" />';
                                                    echo '</li>';
                                                }
                                            }
                                        ?>  
                                    </ul>
                                    <?php
                                        echo "<div class='arrows'>";
                                        if (count($vimeo_urls) > 1 || $gallery) {
                                            $j = 0;
                                            foreach ($vimeo_urls as $vimeo_url) {
                                                echo "<label for='".$post_slug.'_slide_'.$j."'></label>";
                                                $j++;
                                            }
                                        }
                                        if ($gallery) {
                                            $gallery_attachment_ids = explode( ',', $gallery['ids'] );
                                            foreach ($gallery_attachment_ids as $id) {
                                                echo "<label for='".$post_slug.'_slide_'.$id."'></label>";
                                            }                                        
                                        }
                                        echo '</div>'; // End slider
                                        echo '</div>';
                                    ?> 
                                </div>                            
                            <?php endwhile; endif; wp_reset_postdata(); ?>
                        </div>
                         <?php $args = array (   'post_type' => 'videos', 'order' => 'ASC' );       
                        $captionquery = new WP_Query( $args );?>                       
                        <?php if( $captionquery->have_posts() ) : while( $captionquery->have_posts() ) : $captionquery->the_post(); ?>
                        <?php global $post; $post_slug=$post->post_name; ?>
                            <div data-clip="<?php echo $post_slug ?>" class="modal-content">
                                <?php the_content(); ?>
                            </div>                          
                        <?php endwhile; endif; wp_reset_postdata(); ?>                        
                    </div>
                  </div>                  
              </div>
              <div class="nav-wrapper">
                <nav>
                    <?php 
                        $defaults = array(
                            'container' => false,
                            'theme_location' => 'primary-menu',                             
                        );
                        wp_nav_menu($defaults);
                    ?>
                </nav>
              </div>               
            </div>              
        </main>     
    <!-- body ends in footer.php -->
<?php get_footer(); ?>