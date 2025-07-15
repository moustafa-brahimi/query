<div class="info">


  <?php $author =  array( get_the_author_meta('display_name'), get_author_posts_url( get_the_author_meta("ID") ) ); ?>

  <?php $date   = get_the_date(); ?>

  <?php $loves  = isset($args['loves']) ? $args['loves'] : []; ?>

  <?php $counter = get_post_meta( get_the_id(), '_query_loves', true ); ?>
  <?php $loved  = ( in_array( get_the_ID(), $loves ) ? 'loved' : '' ); ?>

  <ul>


    <li class="love <?php echo $loved; ?>" data-post-id="<?php the_ID(); ?>">

      <i class='fas fa-heart i'></i>

      <span>

        <?php  echo ( $counter ? $counter : 0 );  ?>

      </span>

    </li>

    <?php $format = get_post_format(); ?>

    <?php if( $format !== 'image' && $format !== 'status' ): ?>

      <li title="<?php comments_number(); ?>">

      <i class="fas fa-comment-alt i"></i>

      <span class="comments-count"> <?php echo get_comments_number(); ?> </span>

      <p> <a href="<?php comments_link() ?>"> <?php echo comments_number(); ?> </a> </p>

    </li>

    <?php endif; ?>

    <li title="<?php echo $author[0]; ?>">

      <i class='fas fa-user i'></i>

      <p> <a href="<?php echo $author[1]; ?>"> <?php echo $author[0]; ?> </a> </p>

    </li>



    <li title="<?php echo $date; ?>">

      <i class="fas fa-calendar-alt i"></i>

      <p> <?php echo $date; ?> </p>


    </li>



  </ul>



</div>
