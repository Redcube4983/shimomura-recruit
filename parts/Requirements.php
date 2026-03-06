<div class="outline__list wrapcontent__element">  
<?php if( have_rows('requirements') ): ?>
    <?php while ( have_rows('requirements') ) : the_row(); ?>
        <?php if( get_sub_field('item') ):?>
            <div class="outline__list__item">
                <h3 class="outline__list__item__title"><?php the_sub_field('item'); ?></h3>
                <?php if (have_rows('content')): ?>
                <div class="outline__list__item__txtarea">
                <?php while (have_rows('content')): the_row(); ?>
                  <?php if( get_sub_field('sub-title')):?>
                  <div class="outline__list__item__txtarea__flex">
                      <h4><?php the_sub_field('sub-title'); ?></h4>
                      <p><?php the_sub_field('text'); ?></p>
                  </div>
                  <?php else:?>
                  <div class="outline__list__item__txtarea__flex flexnone">
                      <p><?php the_sub_field('text'); ?></p>
                  </div>
                  <?php endif; ?>
                <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
</div>