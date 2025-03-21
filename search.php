<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Tasmeh_Shop
 */

get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <main id="primary" class="site-main">

                <?php if (have_posts()) : ?>

                    <header class="page-header">
                        <h1 class="page-title">
                            <?php
                            /* translators: %s: search query. */
                            printf(esc_html__('نتایج جستجو برای: %s', 'tasmeh-shop'), '<span>' . get_search_query() . '</span>');
                            ?>
                        </h1>
                    </header><!-- .page-header -->

                <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();

                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overwrite this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part('template-parts/content', 'search');

                    endwhile;

                    the_posts_pagination(array(
                        'prev_text' => '<i class="fa fa-angle-right"></i>',
                        'next_text' => '<i class="fa fa-angle-left"></i>',
                        'screen_reader_text' => esc_html__('صفحه بندی مطالب', 'tasmeh-shop'),
                    ));

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>

            </main><!-- #main -->
        </div>

        <div class="col-lg-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php
get_footer();
