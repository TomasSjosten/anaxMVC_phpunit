<?php

require __DIR__.'/config_with_app.php';

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

$app->navbar->configure(ANAX_APP_PATH.'config/theme_navbar.php');
$app->theme->configure(ANAX_APP_PATH.'config/theme-grid.php');




$app->router->add('theme', function() use ($app) {
    $app->theme->setVariable('title', 'Theme');
    $app->views->add('grid/index', [
        'content' => '<p>Första sidan för Temabiten i kursmomentet.</p><button id="show_grid">Visa bakgrundsgrid</button>',
    ]);
});


$app->router->add('theme/regions', function() use ($app) {
    $app->theme->setVariable('title', 'Regions')
                ->setVariable('showRegions', 'regions');
    $app->views->add('grid/index', [
        'content' => null,
    ]);

    $app->theme->addStylesheet('css/caligula_css/stylesheets/grid_demo.css');

    $app->views->addString('flash', 'flash')
      ->addString('featured-1', 'featured-1')
      ->addString('featured-2', 'featured-2')
      ->addString('featured-3', 'featured-3')
      ->addString('main', 'main')
      ->addString('sidebar', 'sidebar')
      ->addString('triptych-1', 'triptych-1')
      ->addString('triptych-2', 'triptych-2')
      ->addString('triptych-3', 'triptych-3')
      ->addString('footer-1', 'footer-1')
      ->addString('footer-2', 'footer-2')
      ->addString('footer-3', 'footer-3')
      ->addString('footer-4', 'footer-4');
});


$app->router->add('theme/typography', function() use ($app) {
    $content = $app->fileContent->get('grid/typography.md');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');

    $sideBarcontent = $app->fileContent->get('grid/sidebar.md');
    $sideBarcontent = $app->textFilter->doFilter($sideBarcontent, 'shortcode, markdown');

    $footerContent = $app->fileContent->get('grid/footer.md');
    $footerContent = $app->textFilter->doFilter($footerContent, 'shortcode, markdown');


    $app->theme->setVariable('title', 'Typography')
                ->setVariable('showRegions', 'regions');

    $app->views->add('grid/index', [
      'content' => $content,
    ]);

    $app->views->addString($sideBarcontent, 'sidebar')
      ->addString($footerContent, 'footer-1')
      ->addString('<p>Lorem ipsum do le mi sum</p><ul><li>Proof lorem ipsum</li></ul>', 'footer-2')
      ->addString($footerContent, 'footer-3')
      ->addString($footerContent, 'footer-4');
});


$app->router->add('theme/font-awesome', function() use ($app) {
    $content = $app->fileContent->get('grid/main.html');
    $content = $app->textFilter->doFilter($content, 'shortcode, markdown');

    $sideBarcontent = $app->fileContent->get('grid/side.html');
    $sideBarcontent = $app->textFilter->doFilter($sideBarcontent, 'shortcode, markdown');

    $app->theme->setVariable('title', 'Typography')
      ->setVariable('showRegions', 'regions');

    $app->views->addString($sideBarcontent, 'sidebar');

    $app->views->add('grid/index', [
      'content' => $content,
    ]);
});


$app->router->handle();
$app->theme->render();
