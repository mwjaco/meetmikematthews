<?php get_header(); ?>
    <body>
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<main class="sidebar">
			<div class="sidebar-wrapper">
            	<div class="page-header">
            		<h1><?php the_title(); ?></h1>
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
<!--             			<ul>
                            <li><a href="about.html">About</a></li>
                            <li><a href="work.html">Work</a></li>
                            <li><a href="contact.html">Contact</a></li>
            			</ul> -->
            		</nav>
            	</div>            					
			</div>
			<div class="sidebar-content">
                <?php the_content(); ?>                             
			</div>
		</main>	
		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no page was found.' ); ?></p>
		<?php endif; ?>		
	<!-- body ends in footer.php -->
<?php get_footer(); ?>