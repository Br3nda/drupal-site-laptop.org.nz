<?php // $Id: page.tpl.php,v 1.1.2.1 2009/07/06 08:03:14 agileware Exp $ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $language->language; ?>" xml:lang="<?php echo $language->language; ?>">

  <head>
    <title><?php if (isset($head_title )) echo $head_title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <?php echo $head; ?>
    <?php echo $styles ?>
    <?php echo $scripts ?>
    <!--[if IE 6]><link rel="stylesheet" href="<?php echo $base_path . $directory; ?>/style.ie6.css" type="text/css" /><![endif]-->  
    <!--[if IE 7]><link rel="stylesheet" href="<?php echo $base_path . $directory; ?>/style.ie7.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 8]><link rel="stylesheet" href="<?php echo $base_path . $directory; ?>/style.ie8.css" type="text/css" media="screen" /><![endif]-->
    <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
  </head>

  <body class="<?php echo $body_classes; ?>">
    <div class="PageBackgroundGlare">
      <div class="PageBackgroundGlareImage"></div>
    </div>
    <div class="Main">
      <div class="Sheet">
        <div class="Sheet-tl"></div>
        <div class="Sheet-tr"></div>
        <div class="Sheet-bl"></div>
        <div class="Sheet-br"></div>
        <div class="Sheet-tc"></div>
        <div class="Sheet-bc"></div>
        <div class="Sheet-cl"></div>
        <div class="Sheet-cr"></div>
        <div class="Sheet-cc"></div>
        <div class="Sheet-body">
          <div class="Header">
            <div class="logo">
              <?php if ($logo): ?>
                <div id="logo">
                  <a href="<?php echo $base_path; ?>" title="<?php echo t('Home'); ?>"><img src="<?php echo $logo; ?>" alt="<?php echo t('Home'); ?>" /></a>
                </div>
              <?php endif; ?>
            </div>
            <?php if ($search_box): ?>
              <div id="search-box">
                <?php echo $search_box; ?>
              </div>
            <?php endif; ?>
          </div>
          <?php if (!empty($navigation)): ?>
            <div class="nav">
              <div class="l"></div>
              <div class="r"></div>
              <?php echo $navigation; ?>
            </div>
          <?php endif; ?>
          <div class="cleared"></div>
          <div class="contentLayout">
            <?php if ($left): ?>
              <div id="sidebar-left" class="sidebar">
                <?php echo $left ?>
              </div>
            <?php endif; ?>
            <div id="main">
              <div class="Post">
                <div class="Post-body">
                  <div class="Post-inner">
                    <div class="PostContent">
                      <?php if ($is_front): ?>
                        <div id="featured"></div>
                      <?php endif; ?>
                      <?php if (!empty($banner1)) echo $banner1; ?>
                      <?php if (!$is_front) echo $breadcrumb; ?>
                      <?php if (!empty($tabs)) echo $tabs . '<div class="cleared"></div>'; ?>
                      <?php if ($title): ?><h1 class="title"><?php echo $title; ?></h1><?php endif; ?>
                      <?php if (!empty($mission)) echo '<div id="mission">' . $mission . '</div>'; ?>
                      <?php if (!empty($help)) echo $help; ?>
                      <?php if (!empty($messages)) echo $messages; ?>
                      <?php echo $content; ?>
                      <?php if (!empty($content_bottom)) echo $content_bottom; ?>
                    </div>
                    <div class="cleared"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="cleared"></div>
          <div class="Footer">
            <div class="Footer-inner">
              <a href="<?php echo $base_url; ?>/rss.xml" class="rss-tag-icon" title="RSS"></a>
              <div class="Footer-text">
                <?php if (!empty($copyright)) echo $copyright; ?>
              </div>
            </div>
            <div class="Footer-background"></div>
          </div>
        </div>
      </div>
      <div class="cleared"></div>
      <p class="page-footer"><?php echo $footer_message; ?> Theme developed by <a href="http://agileware.net">Agileware Pty Ltd</a></p>
    </div>
    <?php echo $closure; ?>
  </body>
</html>