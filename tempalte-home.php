<?php
/*
Template Name: Home
*/

get_header();?>
      <!-- Header Area Start -->
      <!-- Slider Area Start -->
      <section class="slider-area" id="home">
         <div class="slider owl-carousel">
            <?php
               $args = array(
                  'post_type' => 'slider',
                  'posts_per_page' => 3
               );
               $query = new WP_Query($args);
                  while($query->have_posts()) {
                     $query->the_post();

                     $slider_subtitle = get_field('slider_subtitle');
                     $slider_description = get_field('slider_description');
                     $slider_button_text = get_field('slider_button_text');
                     $slider_button_url = get_field('slider_button_url');
               ?>
               <div class="single-slide" style="background-image:url('<?php the_post_thumbnail_url(); ?>">
                  <div class="container">
                     <div class="row">
                        <div class="col-xl-12">
                           <div class="slide-table">
                              <div class="slide-tablecell">
                                 <h4><?php echo $slider_subtitle;?></h4>
                                 <h2><?php the_title();?></h2>
                                 <p><?php echo $slider_description;?></p>
                                 <a href="<?php echo $slider_button_url;?>" class="box-btn"><?php echo $slider_button_text;?> <i class="fa fa-angle-double-right"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <?php
                  }
            ?>
         </div>
      </section>
      <!-- Slider Area Start -->
      <!-- About Area Start -->
      <section class="about-area pt-100 pb-100" id="about">
         <div class="container">
            <div class="row section-title">
               <div class="col-md-6 text-right">

               <?php
                  $about_section_title = get_field('about_section_title', 'option');
               ?>

                  <h3><span><?php echo $about_section_title['section_subtitle']; ?></span> <?php echo $about_section_title['section_title']; ?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $about_section_title['section_description']; ?></p>
               </div>
            </div>
            <div class="row">
               <div class="col-md-7">
                  <div class="about">
                  <?php
                     $about_content = get_field('about_content', 'option');
                  ?>
                     <div class="page-title">
                        <h4><?php echo $about_content['about_title'];?></h4>
                     </div>
                     <p><?php echo $about_content['about_description'];?></p>
                     <a href="<?php echo $about_content['about_button_url'];?>" class="box-btn"><?php echo $about_content['about_button_text'];?> <i class="fa fa-angle-double-right"></i></a>
                  </div>
               </div>
               <div class="col-md-5">
                  <?php
                     $about_features = get_field('about_feature', 'option');
                     foreach($about_features as $feature) {
                  ?>
                  <div class="single_about">
                     <i class="fa <?php echo $feature['about_feature_icon']; ?>"></i>
                     <h4><?php echo $feature['about_feature_title']; ?></h4>
                     <p><?php echo $feature['about_feature_dscription']; ?></p>
                  </div>
                  <?php
                     }
                  ?>

                  
               </div>
            </div>
         </div>
      </section>
      <!-- About Area End -->
      <!-- Choose Area End -->
      <section class="choose">
         <div class="container">
            <div class="row pt-100 pb-100">
               <div class="col-md-6">
                  <div class="faq">
                     <div class="page-title">
                        <h4>faq</h4>
                     </div>
                     <div class="accordion" id="accordionExample">

                        <?php
                           $faqs = get_field('faq', 'option');
                           $i = 0;
                           foreach($faqs as $faq) {
                           $i++;
                        ?>
                        <div class="card">
                           <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapseOne">
                                 <?php echo $faq['faq_title'];?>
                                 </button>
                              </h5>
                           </div>
                           <div id="collapse<?php echo $i;?>" class="collapse <?php if($i == 1) {echo 'show';} ?>" aria-labelledby="headingOne" data-parent="#accordionExample">
                              <div class="card-body">
                              <?php echo $faq['faq_description'];?>
                              </div>
                           </div>
                        </div>
                        <?php
                           }
                        ?>
                        
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="skills">
                     <div class="page-title">
                        <h4>our skills</h4>
                     </div>
                     <?php
                        $skills = get_field('skills', 'option');
                        foreach($skills as $skill) {
                     ?>
                        <div class="single-skill">
                           <h4><?php echo $skill['skill_name'];?></h4>
                           <div class="progress-bar" role="progressbar" style="width: <?php echo $skill['skill_percentage'];?>;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"><?php echo $skill['skill_percentage'];?></div>
                        </div>
                     <?php
                        }
                     ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Choose Area End -->
      <!-- Services Area Start -->
      <section class="services-area pt-100 pb-50" id="services">
         <div class="container">
            <div class="row section-title">

            <?php
               $services_title = get_field('services_title', 'option');
            ?>

               <div class="col-md-6 text-right">
                  <h3><span><?php echo $services_title['service_subtitle'];?></span> <?php echo $services_title['service_title'];?></h3>
               </div>
               <div class="col-md-6">
                  <p><?php echo $services_title['service_description'];?></p>
               </div>
            </div>
            <div class="row">
               <?php
                  $services = get_field('services', 'option');
                  foreach($services as $service) {
                  ?>
                     <div class="col-lg-4 col-md-6">
                        <!-- Single Service -->
                        <div class="single-service">
                           <i class="fa <?php echo $service['service_icon'];?>"></i>
                           <h4><?php echo $service['service_title'];?></h4>
                           <p><?php echo $service['service_description'];?></p>
                        </div>
                     </div>
                  <?php
                  }
               ?>
            </div>
         </div>
      </section>
      <!-- Services Area End -->
      
      <!-- Counter Area End -->
      <section class="counter-area">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-3">
                  <div class="single-counter">
                     <h4><i class="fa fa-user"></i><span class="counter">567</span>customers</span></h4>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="single-counter">
                     <h4><i class="fa fa-code"></i><span class="counter">236</span>line of codes</h4>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="single-counter">
                     <h4><i class="fa fa-file"></i><span class="counter">789</span>users</h4>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="single-counter">
                     <h4><i class="fa fa-coffee"></i><span class="counter">1,395</span>cup of coffees</h4>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Counter Area End -->
      <!-- Team Area Start -->
      <section class="team-area pb-100 pt-100" id="team">
         <div class="container">
            <div class="row section-title">
               <div class="col-md-6 text-right">
                  <h3><span>who we are?</span> creative team</h3>
               </div>
               <div class="col-md-6">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="single-team">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team/1.jpg" alt="" />
                     <div class="team-hover">
                        <div class="team-content">
                           <h4>john doe <span>web developer</span></h4>
                           <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="single-team">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team/2.jpg" alt="" />
                     <div class="team-hover">
                        <div class="team-content">
                           <h4>john doe <span>web developer</span></h4>
                           <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="single-team">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/img/team/3.jpg" alt="" />
                     <div class="team-hover">
                        <div class="team-content">
                           <h4>john doe <span>web developer</span></h4>
                           <ul>
                              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Team Area End -->
     
      <!-- Testimonials Area Start -->
      <section class="testimonial-area pb-100 pt-100" id="testimonials">
         <div class="container">
            <div class="row section-title white-section">
               <div class="col-md-6 text-right">
                  <h3><span>who we are?</span> what client say</h3>
               </div>
               <div class="col-md-6">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-12">
                  <div class="testimonials owl-carousel">
                     <div class="single-testimonial">
                        <div class="testi-img">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials/03.png" alt="" />
                        </div>
                        <p>" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas. "</p>
                        <h4>john doe <span>web developer</span></h4>
                     </div>
                     <div class="single-testimonial">
                        <div class="testi-img">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials/01.png" alt="" />
                        </div>
                        <p>" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas. "</p>
                        <h4>john doe <span>web developer</span></h4>
                     </div>
                     <div class="single-testimonial">
                        <div class="testi-img">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials/04.png" alt="" />
                        </div>
                        <p>" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas. "</p>
                        <h4>john doe <span>web developer</span></h4>
                     </div>
                     <div class="single-testimonial">
                        <div class="testi-img">
                           <img src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonials/02.png" alt="" />
                        </div>
                        <p>" Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad assumenda culpa cumque dicta sint soluta voluptas eius iusto modi reprehenderit sint soluta voluptas. "</p>
                        <h4>john doe <span>web developer</span></h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Testimonilas Area End -->
      <!-- Latest News Area Start -->
      <section class="blog-area pb-100 pt-100" id="blog">
         <div class="container">
            <div class="row section-title">
               <div class="col-md-6 text-right">
                  <h3><span>who we are?</span> latest news</h3>
               </div>
               <div class="col-md-6">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry typesetting industry.d </p>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="single-blog">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/blog1.jpg" alt="" />
                     <div class="post-content">
                        <div class="post-title">
                           <h4><a href="#">blog title</a></h4>
                        </div>
                        <div class="pots-meta">
                           <ul>
                              <li><a href="#">25 oct 2018</a></li>
                              <li><a href="#">admin</a></li>
                           </ul>
                        </div>
                        <p>Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis.</p>
                        <a href="#" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="single-blog">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/blog2.jpg" alt="" />
                     <div class="post-content">
                        <div class="post-title">
                           <h4><a href="#">blog title</a></h4>
                        </div>
                        <div class="pots-meta">
                           <ul>
                              <li><a href="#">25 oct 2018</a></li>
                              <li><a href="#">admin</a></li>
                           </ul>
                        </div>
                        <p>Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis.</p>
                        <a href="#" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="single-blog">
                     <img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/blog3.jpg" alt="" />
                     <div class="post-content">
                        <div class="post-title">
                           <h4><a href="#">blog title</a></h4>
                        </div>
                        <div class="pots-meta">
                           <ul>
                              <li><a href="#">25 oct 2018</a></li>
                              <li><a href="#">admin</a></li>
                           </ul>
                        </div>
                        <p>Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis.</p>
                        <a href="#" class="box-btn">read more <i class="fa fa-angle-double-right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Latest News Area End -->
      
 <?php get_footer();?>