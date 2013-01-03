<!-- Start Menu -->
<div id="menu-wrapper">
  <div class="menu-inner">
    <?php print render($page['menu']); ?>
    <?php if ($site_name): ?>
      <?php if ($title): ?>
        <div id="site-name">
          <?php print t('<span style="color: maroon;">(Moving)</span> '); ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
        </div>
      <?php else: /* Use h1 when the content title is empty */ ?>
        <h1 id="site-name">
          <?php print t('<span style="color: maroon;">(Moving)</span> '); ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
        </h1>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</div>
<!-- End Menu -->

<!-- Start Page -->
<div id="page-wrapper">
  <div class="page-inner">

    <!-- Start Header -->
    <div id="header-wrapper">
      <div class="header-inner">
        <?php if ($logo): ?>
          <div class="logo">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
          </div>
        <?php endif; ?>
        <?php print render($page['header']); ?>
      </div>
    </div>
    <!-- End Header -->

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
        <div class="sidebar">
          <?php print render($page['sidebar_second']); ?>
        </div>
        <div class="main" >
          <?php print render($page['content']); ?>
        </div>
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
