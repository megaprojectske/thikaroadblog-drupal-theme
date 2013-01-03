<?php

function thikaroadblog_preprocess_page(&$variables, $hook) {

  if (drupal_is_front_page()) {
    drupal_add_js(path_to_theme() . '/js/jquery.jcarousel.min.js');
    drupal_add_js(path_to_theme() . '/js/jquery.hoverintent.min.js');
    drupal_add_js(path_to_theme() . '/js/jquery.masonry.min.js');
    drupal_add_js(path_to_theme() . '/js/jquery.init1.js');
  } else {
    drupal_add_js(path_to_theme() . '/js/jquery.init2.js');
  }
}

function thikaroadblog_preprocess_node(&$variables, $hook) {
  $variables['title_attributes_array']['class'][] = 'node-title';

  if ($variables['type'] == 'blog') {
    if (!drupal_is_front_page()) {
      $variables['submitted'] =  t('Posted by !username on !datetime in !type | <a href="#disqus_thread">Comments</a>',
        array(
          '!username' => $variables['name'],
          '!datetime' => format_date($variables['created'], 'custom', 'M d, Y'),
          '!type' => $variables['type']
        ));
    }

    if ($variables['display_submitted']) {
      $post_date =
        '<div class="month">' .
          render(format_date($variables['created'], 'custom', 'M')) .
          '<span class="date">' .
            render(format_date($variables['created'], 'custom', 'd')) .
            '<span class="year">' .
              render(format_date($variables['created'], 'custom', 'Y')) .
            '</span>
          </span>
        </div>';
    } else {
      $post_date = '';
    }

    $variables['thumbnail1'] = array (
      '#markup' =>
        '<div class="thumbnail">
          <span class="overlay"></span>' .
          render($variables['content']['field_blog_image']) .
          '<div class="category">' .
            $variables['type'] .
          '</div>' .
          $post_date .
        '</div>'
    );

    $variables['thumbnail2'] = array (
      '#markup' =>
        '<div class="thumbnail">
          <span class="overlay"></span>' .
          '<div class="field field-name-field-blog-image field-type-image field-label-hidden">' .
            theme_image_style(array( 'path' =>  $variables['content']['field_blog_image']['#items']['0']['uri'], 'style_name' => 'thumbnail2')) .
          '</div>
          <div class="category">' .
            $variables['type'] .
          '</div>' .
          $post_date .
        '</div>'
    );

    $twitter = 'http://platform.twitter.com/widgets/tweet_button.html#count=vertical&amp;via=thikaroadblog&amp;text=' . $variables['title'];
    $facebook = 'http://www.facebook.com/plugins/like.php?href&amp;send=false&amp;layout=box_count&amp;width=50&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=60';
    $googleplus = '<script type="text/javascript">
                    (function() {
                      var po = document.createElement("script");
                      po.type = "text/javascript";
                      po.async = true;
                      po.src = "https://apis.google.com/js/plusone.js";
                      var s = document.getElementsByTagName("script")[0];
                      s.parentNode.insertBefore(po, s);
                    })();
                  </script>';

    $variables['share'] = array (
      '#markup' =>
        '<div class="field">
          <div class="field-label">Share:</div>
          <div class="field-body share">
            <iframe allowtransparency="true" frameborder="0" scrolling="no" src="' . $twitter . '" style="width:55px; height:62px;"></iframe>
            <g:plusone size="tall"></g:plusone>
            <iframe src="' . $facebook . '" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:62px;" allowTransparency="true"></iframe>
          </div>
        </div>' .
        $googleplus
    );
  }
}


function thikaroadblog_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'search_block_form') {
    $form['search_block_form']['#title'] = t('Search'); // Change the text on the label element
    $form['search_block_form']['#title_display'] = 'invisible'; // Toggle label visibilty
    $form['search_block_form']['#size'] = 24;  // define size of the textfield
    $form['search_block_form']['#default_value'] = t('Search...'); // Set a default value for the textfield
    $form['actions']['submit']['#value'] = t('Search'); // Change the text on the submit button

// Add extra attributes to the text box
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search...';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search...') {this.value = '';}";
  }
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function thikaroadblog_preprocess_block(&$variables, $hook) {
  $variables['title_attributes_array']['class'][] = 'block-title';
}

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
function thikaroadblog_process_block(&$variables, $hook) {
  // Drupal 7 should use a $title variable instead of $block->subject.
  $variables['title'] = $variables['block']->subject;
}
