<?php get_header(); ?>
<main>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article>
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </article>
<?php endwhile; else : ?>
    <p><?php esc_html_e( 'No posts found.', 'toluehagh-bootstrap' ); ?></p>
<?php endif; ?>
</main>
<?php get_footer(); ?>
