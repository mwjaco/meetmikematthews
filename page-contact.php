<?php get_header(); ?>
    <body class="contact">
    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<main class="sidebar contact">
			<div class="sidebar-wrapper contact">
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
<!--                        <ul>
                            <li><a href="about.html">About</a></li>
                            <li><a href="work.html">Work</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul> -->
                    </nav>
            	</div>            					
			</div>
			<div class="sidebar-content modal">
                <?php the_content(); ?>
                <div class="resume-trigger">
                    <label for="modal-1">
                        <div class="modal-trigger">RÉSUMÉ</div>
                    </label>
                    <input data-clip="resume" class="modal-state" id="modal-1" type="checkbox" />
                </div>
                <div class="modal-fade-screen">
                    <div class="modal-inner">
                        <div class="modal-close" for="modal-1"></div>
                        <a href="pdf/mike_resume.pdf" target="_blank"><img src="img/mike_resume.png"></a>
                    </div>
                </div>                                                             
			</div>
		</main>	
		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no page was found.' ); ?></p>
		<?php endif; ?>		
	<!-- body ends in footer.php -->
<?php get_footer(); ?>