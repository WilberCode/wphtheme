<?php get_template_part( 'templates/partials/document-open' ); ?>

<!-- Site header markup goes here -->
<header class="shadow bg-white">
    <div class="header-wrap max-w-6xl m-auto flex h-12">
        <div class="logo lg:w-1/3"> 
                 <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>
                     <?php if ( has_custom_logo() ) { ?> 
                    <a class="logo__url" href="<?php echo home_url();?>" rel="home">
                        <img id="logo__img" class="logo__img" src="<?php echo esc_url( $logo[0]);?>" alt="<?php bloginfo('name'); ?>" >
                    </a> 
                     <?php }else{?>
                    <a class="logo__title" href="<?php echo home_url();?>" rel="home">
                        <?php echo  '<h1 class="logo__title">'.get_bloginfo( "name" ).'</h1>'; ?>
                    </a>     
                     <?php }?>
        </div>
        <nav class="lg:w-2/3" >
            <h1>Menu</h1>
        </nav>
    </div>
</header>