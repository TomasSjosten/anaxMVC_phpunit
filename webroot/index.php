<?php
/**
 * This is a Anax pagecontroller.
 *
 */

// Get environment & autoloader and the $app-object.
require __DIR__.'/config_with_app.php';

$app->url->setUrlType(\Anax\Url\CUrl::URL_CLEAN);

// Configure theme file
$app->theme->configure(ANAX_APP_PATH.'config/theme_me.php');

// Add Navbar to the theme
$app->navbar->configure(ANAX_APP_PATH.'config/navbar_me.php');


$di->set('OwncommentController',
  function () use ($di) {
      $commentController = new Me\base\OwncommentController\OwncommentController();
      $commentController->setDI($di);

      return $commentController;
  }
);


$di->set('PresentationController',
  function () use ($di) {
      $presentation = new \Me\base\PresentationController\PresentationController();
      $presentation->setDI($di);

      return $presentation;
  }
);


$di->set('CformController',
  function () use ($di) {
      $form = new \Me\base\CFormController\CFormController();
      $form->setDI($di);

      return $form;
  }
);





$app->router->add('simpleform2b',
  function () use ($app) {
      $app->theme->setTitle('Simpleform2b');

      $form = new \emildev\SimpleForm2B\SimpleForm2B();
      $form->setForm('post', $app->url->create('register/check'), 'registerForm');
      $form->setInput('text', 'username', NULL, 'username', 'Insert Username', NULL);
      $form->setTextArea('textarea', NULL, NULL, 'Write info', NULL);

      $byline = $app->fileContent->get('byline.md');
      $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

      $app->views->add('simpleform2b/simpleform2b',
        [
            'form' => $form->saveForm(),
        ]
      );
  }
);





$app->router->add('comments',
  function () use ($app) {
      $app->theme->setTitle('Comments');

      $app->dispatcher->forward(
        [
          'controller' => 'owncomment',
          'action' => 'view',
        ]
      );

      $app->dispatcher->forward(
        [
          'controller' => 'owncomment',
          'action' => 'addcomment',
        ]
      );
  }
);


$app->router->add('',
  function () use ($app) {
      $app->theme->setVariable('title', 'About');

      $content = $app->fileContent->get('about.md');
      $content = $app->textFilter->doFilter($content, 'shortcode, markdown, nl2br');

      $byline = $app->fileContent->get('byline.md');
      $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

      $app->views->add('me/page',
        [
          'content' => $content,
          'byline' => $byline,
        ]
      );
  }
);


$app->router->add('presentation',
  function () use ($app) {
      $app->theme->setVariable('title', "Presentation");

      $content = $app->fileContent->get('presentation.md');
      $content = $app->textFilter->doFilter($content, 'shortcode, markdown, nl2br');

      $byline = $app->fileContent->get('byline.md');
      $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

      $app->views->add('me/page',
        [
          'content' => $content,
          'byline' => $byline,
        ]
      );
  }
);


$app->router->add('source',
  function () use ($app) {

      $app->theme->addStylesheet('css/source.css');
      $app->theme->setTitle("Source code");


      $source = new \Me\Source\CSource(
        [
          'secure_dir' => '..',
          'base_dir' => '..',
          'add_ignore' => ['.htaccess'],
        ]
      );

      $app->views->add('me/source',
        [
          'content' => $source->View(),
        ]
      );
  }
);


$app->router->add('CForm',
  function () use ($app) {
      $app->theme->setTitle('CForm');


      $app->views->add('me/page',
        [
          'content' => $app->dispatcher->forward(
            [
              'controller' => 'CForm',
              'action' => 'index',
            ]
          ),
        ]
      );
  }
);


$app->router->add('users',
  function () use ($app) {
      $app->theme->setTitle('Users');

      $content = $app->fileContent->get('users.md');
      $content = $app->textFilter->doFilter($content, 'shortcode, markdown, nl2br');

      $byline = $app->fileContent->get('byline.md');
      $byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');

      $links = '
        <div id="user-links">
            <a class="small_button blue_button link_button" href="'.$app->url->create("users/list").'">Visa alla</a>
            <a class="small_button blue_button link_button" href="'.$app->url->create("users/setup").'">Återställ databasen</a>
            <a class="small_button blue_button link_button" href="'.$app->url->create("users/add").'">Lägg till en användare</a>
        </div>';

      $app->views->add('me/page',
        [
          'content' => $content.$links,
          'byline' => $byline,
        ]
      );
  }
);


// Render the response using theme engine.
$app->router->handle();
$app->theme->render();
$app->message->getMessage();
