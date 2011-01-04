<?php
// $Id: common_methods.php,v 1.1.2.1 2009/07/06 08:03:14 agileware Exp $

/**
 * Generate the HTML representing a given menu with Artisteer style.
 *
 * @param $mid
 *   The block navigation content.
 *
 * @ingroup themeable
 */
function art_navigation_links_worker($content = NULL) {
  if (!$content) {
    return '';
  }

  $output = $content;
  $menu_str = ' class="menu"';
  if (strpos($content, $menu_str) !== FALSE) {
    $empty_str = '';
    $pattern = '/class="menu"/i';
    $replacement = 'class="artmenu"';
    $output = preg_replace($pattern, $replacement, $output, 1);
    $output = str_replace($menu_str, $empty_str, $output);
  }
  $output = preg_replace('~(<a [^>]*>)([^<]*)(</a>)~', '$1<span class="l"></span><span class="r"></span><span class="t">$2</span>$3', $output);

  return $output;
}

/**
 * Return a themed set of links.
 *
 * @param $links
 *   A keyed array of links to be themed.
 * @param $attributes
 *   A keyed array of attributes
 * @return
 *   A string containing an unordered list of links.
 */
function art_links_woker($links, $attributes = array('class' => 'links')) {
  $output = '';

  if (count($links) > 0) {
    $output = '';

    $num_links = count($links);
    $index = 0;

    foreach ($links as $key => $link) {
      $class = $key;

      if (strpos ($class, "read_more") !== FALSE) {
        break;
      }

      // Automatically add a class to each link and also to each LI
      if (isset($link['attributes']) && isset($link['attributes']['class'])) {
        $link['attributes']['class'] .= ' ' . $key;
      }
      else {
        $link['attributes']['class'] = $key;
      }

      if ($index > 0) {
        $output .= '&nbsp;&nbsp;|&nbsp;';
      }

      // Add first and last classes to the list of links to help out themers.
      $extra_class = '';
      if ($index == 1) {
        $extra_class .= 'first ';
      }
      if ($index == $num_links) {
        $extra_class .= 'last ';
      }

      if ($class) {
        if (strpos ($class, "comment") !== FALSE) {
          ob_start();?><img class="metadata-icon" src="<?php echo get_full_path_to_theme(); ?>/images/PostCommentsIcon.png" width="18" height="18" alt="PostCommentsIcon"/> <?php
          $output .= ob_get_clean();
        }
        else {
          ob_start();?><img class="metadata-icon" src="<?php echo get_full_path_to_theme(); ?>/images/PostCategoryIcon.png" width="18" height="18" alt="PostCategoryIcon"/> <?php
          $output .= ob_get_clean();
        }
      }

      $index++;
      $output .= get_html_link_output($link);
    }
  }

  return $output;
}

function get_html_link_output($link) {
  $output = '';
  // Is the title HTML?
  $html = isset($link['html']) && $link['html'];

  // Initialize fragment and query variables.
  $link['query'] = isset($link['query']) ? $link['query'] : NULL;
  $link['fragment'] = isset($link['fragment']) ? $link['fragment'] : NULL;

  if (isset($link['href'])) {
    $output = l($link['title'], $link['href'], array('language' => $link['language'], 'attributes' => $link['attributes'], 'query' => $link['query'], 'fragment' => $link['fragment'], 'absolute' => FALSE, 'html'=>$html));
  }
  else if ($link['title']) {
    //Some links are actually not links, but we wrap these in <span> for adding title and class attributes
    if (!$html) {
      $link['title'] = check_plain($link['title']);
    }
    $output = $link['title'];
  }

  return $output;
}
