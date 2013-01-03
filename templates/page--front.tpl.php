<!-- Start Menu -->
<div id="menu-wrapper">
  <div class="menu-inner">
    <?php print render($page['menu']); ?>
    <?php if ($site_name): ?>
      <h1 id="site-name">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
      </h1>
    <?php endif; ?>
  </div>
</div>
<!-- End Menu -->

<!-- Start Page -->
<div id="page-wrapper">
  <div class="page-inner">

    <!-- Start Slides -->
    <div id="slides-wrapper">
      <div class="slides-inner">
        <?php if ($logo): ?>
          <div class="logo">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
          </div>
        <?php endif; ?>
        <?php print render($page['slides']); ?>
      </div>
    </div>
    <!-- End Slides -->

    <!-- Start Main Conent -->
    <div id="main-wrapper">
      <div class="main-inner">
        <?php print render($page['help']); ?>
        <?php print render($page['highlighted']); ?>
        <?php if ($tabs = render($tabs)): ?>
          <div class="tabs"><?php print $tabs; ?></div>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        <?php print render($page['content_home']); ?>
      </div>
    </div>
    <!-- End Main Content -->

    <!-- Start Footer -->
    <div id="footer-wrapper">
      <div class="footer-inner">
        <?php print render($page['footer']); ?>
      </div>
    </div>
    <!-- End Footer -->

  </div>
</div>
<!-- End Page -->
