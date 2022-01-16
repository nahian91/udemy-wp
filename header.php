<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Title -->
      <title>Halim | Onepage Multipurpose Website</title>
      <!-- Font Google -->
      <?php wp_head();?>
   </head>
   <body <?php body_class();?>>
	   <section class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="header-left">
                     <?php
                        $header_email = get_field('header_email', 'option');
                        $header_phone = get_field('header_phone', 'option');
                     ?>
							<a href="mailto:<?php echo $header_email;?>"><i class="fa fa-envelope"></i> <?php echo $header_email;?></a>
							<a href="tel:<?php echo $header_phone;?>"><i class="fa fa-phone"></i> <?php echo $header_phone;?></a>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 text-right">
						<div class="header-social">

                  <?php
                     $header_socials = get_field('header_social', 'option');
                     foreach($header_socials as $header_social) {
                  ?>
                     <a href="<?php echo $header_social['icon_url'];?>"><i class="fa <?php echo $header_social['icon_name'];?>"></i></a>
                  <?php
                     }
                  ?>
						</div>
					</div>
				</div>
			</div>
	   </section>
      <!-- Header Area Start -->
      <header class="header header-fixed">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <nav class="navbar navbar-expand-md navbar-light">
                     <a class="navbar-brand" href="#">halim</a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse ml-auto mainmenu" id="navbarNav">

                        <?php
                            wp_nav_menu( array(
                                'theme_location' => 'primary',
                                'menu_class' => 'navbar-nav ml-auto'
                            ) );
                        ?>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </header>