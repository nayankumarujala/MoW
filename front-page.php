<?php
/**
 * Front page template for Mosaic of Words.
 */

global $post;

get_header();
?>

<main class="page-wrapper">
  <section class="hero fade-up">
    <div class="hero-inner">
      <h1 class="hero-title">Shadow Mirror</h1>
      <p class="hero-subtitle">Reflecting the Unspoken.</p>
      <a class="btn" href="<?php echo esc_url( home_url( '/quiz' ) ); ?>">Begin Journey</a>
    </div>
  </section>

  <section class="section fade-up">
    <h2 class="section-heading">Latest Poetry</h2>
    <div class="grid">
      <?php
      $poetry_query = new WP_Query(
        [
          'post_type'      => 'poetry',
          'posts_per_page' => 3,
        ]
      );

      if ( $poetry_query->have_posts() ) :
        while ( $poetry_query->have_posts() ) :
          $poetry_query->the_post();
          ?>
          <article class="card">
            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p class="card-date"><?php echo esc_html( get_the_date() ); ?></p>
            <div class="card-excerpt"><?php the_excerpt(); ?></div>
            <a class="card-link" href="<?php the_permalink(); ?>">Read Poem</a>
          </article>
          <?php
        endwhile;
        wp_reset_postdata();
      else :
        ?>
        <p class="text-muted">No poems found.</p>
        <?php
      endif;
      ?>
    </div>
  </section>

  <section class="section fade-up">
    <h2 class="section-heading">Recent Reflections</h2>
    <div class="grid">
      <?php
      $reflection_query = new WP_Query(
        [
          'post_type'      => 'post',
          'posts_per_page' => 3,
          'post_status'    => 'publish',
        ]
      );

      if ( $reflection_query->have_posts() ) :
        while ( $reflection_query->have_posts() ) :
          $reflection_query->the_post();
          ?>
          <article class="card">
            <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p class="card-date"><?php echo esc_html( get_the_date() ); ?></p>
            <div class="card-excerpt"><?php the_excerpt(); ?></div>
            <a class="card-link" href="<?php the_permalink(); ?>">Read Reflection</a>
          </article>
          <?php
        endwhile;
        wp_reset_postdata();
      else :
        ?>
        <p class="text-muted">No reflections found.</p>
        <?php
      endif;
      ?>
    </div>
  </section>

  <section class="section fade-up">
    <div class="reflection-space">
      <h2 class="section-heading">Echoes of the Mind</h2>
      <blockquote>"Thoughts are form; silence, the ocean they swim in."</blockquote>
    </div>
  </section>

  <section class="section fade-up">
    <div class="featured-essay">
      <h2 class="section-heading">Featured Essay</h2>
      <p>On Solitude &amp; The Creative Mind</p>
      <a class="btn" href="<?php echo esc_url( home_url( '/featured-essay' ) ); ?>">Read Full Essay</a>
    </div>
  </section>

  <section class="section fade-up visual-poetry">
    <h2 class="section-heading">Visual Poetry</h2>
    <div class="grid">
      <figure class="card">
        <img src="https://picsum.photos/id/237/600/400?grayscale" alt="Visual poem 1" />
      </figure>
      <figure class="card">
        <img src="https://picsum.photos/id/238/600/400?grayscale" alt="Visual poem 2" />
      </figure>
      <figure class="card">
        <img src="https://picsum.photos/id/239/600/400?grayscale" alt="Visual poem 3" />
      </figure>
    </div>
  </section>

  <section class="section fade-up">
    <div class="newsletter">
      <h2 class="section-heading">Stay Connected</h2>
      <p class="text-muted">Receive curated poetry, reflections, and creative prompts.</p>
      <form class="newsletter-form" action="#" method="post">
        <label class="screen-reader-text" for="mow-newsletter-email">Email</label>
        <input id="mow-newsletter-email" type="email" name="email" placeholder="Your email address" required />
        <button class="btn" type="submit">Join</button>
      </form>
    </div>
  </section>

  <section class="section fade-up">
    <div class="about-connect">
      <div class="card">
        <h3 class="card-title">About Mosaic of Words</h3>
        <p class="card-excerpt">A sanctuary for poetic voices, reflective essays, and the quiet resonance between them.</p>
        <a class="btn" href="<?php echo esc_url( home_url( '/about' ) ); ?>">Discover More</a>
      </div>
      <div class="card">
        <h3 class="card-title">Connect</h3>
        <p class="card-excerpt">Do you write, read, or simply listen? Share your echoes with us.</p>
        <a class="btn" href="<?php echo esc_url( home_url( '/contact' ) ); ?>">Say Hello</a>
      </div>
    </div>
  </section>
</main>

<footer class="footer">
  <div>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Mosaic of Words. All rights reserved.</div>
  <nav class="footer-menu" aria-label="Footer Menu">
    <?php
    wp_nav_menu(
      [
        'theme_location' => 'footer',
        'container'      => false,
        'items_wrap'     => '%3$s',
        'fallback_cb'    => false,
      ]
    );
    ?>
  </nav>
</footer>

<?php
get_footer();
