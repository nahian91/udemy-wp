<?php get_header();?>

<section class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcumb">
                    <h4><?php the_title();?></h4>
                    <ul>
                        <li><a href="<?php echo site_url();?>"></a>Home</li> / 
                        <li><?php the_title();?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-contet">
                    <?php
                        while(have_posts()) {
                            the_post();
                    ?>
                        <h4><?php the_title();?></h4>
                        <?php the_content();?>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();?>