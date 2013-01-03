<?php

// WTF IS THIS SHITTTT ? --->

  // print $variables['view']->name

// <--- Honestly... WTF? >.< ARrgg!

?>

<!-- Start Node -->
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($type == 'blog'): ?>
    <?php if ($teaser): ?>
        <?php
          // Need this to stop some type of bug occuring when viewing tags,
          // where some tag teasers will use this template file... randomly.

          // NTS: WTF is up with this code's condition?
          if (drupal_is_front_page() && ($variables['view']->name == 'latest')) :
        ?>

          <?php print render($thumbnail1); ?>
          <div class="content"<?php print $content_attributes; ?>>
            <?php print render($content['links']) ?>
            <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
            <?php if ($display_submitted): ?>
              <span class="submitted"><?php print t('Posted by ') . render($name); ?></span>
            <?php endif; ?>
          </div>

        <?php else : ?>

          <div class="image">
            <?php print theme_image_style(array( 'path' =>  $content['field_blog_image']['#items']['0']['uri'], 'style_name' => 'top4')) ?>
          </div>
          <div class="content"<?php print $content_attributes; ?>>
            <?php print ucwords(render($content['links'])); ?>
            <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
            <span class="date-teaser"><?php print render(format_date($created, 'custom', 'M d, Y')); ?></span>
          </div>
          <?php print render($content['body']); ?>

        <? endif; ?>
    <?php elseif ($page): ?>

      <div class="info">
        <?php print render($thumbnail2); ?>
        <?php
        if (!empty($content['group_blog_project']['field_project_lot'])
            || !empty($content['group_blog_project']['field_project_contractor'])
            || !empty($content['group_blog_project']['field_project_location'])) {
          print '<div class="field"><div class="field-label">Project:&nbsp;</div>';
          print render($content['group_blog_project']);
          print '</div>';
        }
        ?>
        <?php print render($content['field_blog_tags']); ?>
        <?php print render($share); ?>
      </div>

      <div class="body"<?php print $content_attributes; ?>>
        <?php print render($title_prefix); ?>
        <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
        <?php print render($title_suffix); ?>
        <?php if ($display_submitted): ?>
          <span class="submitted"><?php print $submitted; ?></span>
        <?php endif; ?>
        <hr /><?php print render($content['field_blog_image']); ?><hr />
        <?php hide($content['links']); ?>
        <?php print render($content['body']); ?>
      </div>

    <?php endif; ?>
  <?php else: ?>

    <?php print render($title_prefix); ?>
    <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
    <?php print render($title_suffix); ?>

    <div class="content"<?php print $content_attributes; ?>>
      <?php
        hide($content['links']);
        hide($content['links']['statistics']);
        print render($content);
      ?>
    </div>

    <?php print render($content['links']); ?>

  <?php endif; ?>

</div>
<!-- End Node -->
