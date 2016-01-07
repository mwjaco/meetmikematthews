<?php get_header(); ?>
	<body>
    	<main>
	        <!--[if lt IE 8]>
	            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	        <![endif]-->
	        <div class="main-container">
	            <div class="main wrapper clearfix">
	            	<div class="page-header homepage">
	            		<h1><?php the_title(); ?></h1>
	            	</div>
	            	<div class="nav-wrapper homepage">
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
	            	<div class="chevron-wrapper">
	            		<div class="chevron">
	            		</div>
	            	</div>					

	            </div> <!-- #main -->
	        </div> <!-- #main-container -->
	    </main>		
	<!-- body ends in footer.php -->
<?php get_footer(); ?>