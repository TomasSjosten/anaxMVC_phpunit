<?php

namespace Me\base\OwncommentController;


use Me\base\Models\Comments;
use Mos\HTMLForm\CForm;

class OwncommentController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    private $form;
    private $comments;
    private $now;

    public function initialize()
    {
        $this->now = date('Y-m-d H:i:s');
        $this->form = new CForm();

        $this->comments = new Comments();
        $this->comments->setDI($this->di);
    }



    private function add($commenter)
    {
        $comment =
          [
              'name' => $commenter.' '.$commenter.'son',
              'email' => $commenter.'@fejk.se',
              'comment' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ultrices tristique vehicula. Pellentesque elementum quis odio at fringilla. Praesent quis sapien et velit venenatis tempor id sed nisi.
              Aliquam tortor quam, imperdiet vitae diam ut, vestibulum varius dolor. Proin ut pulvinar purus.',
              'created' => $this->now,
              'updated' => $this->now,
          ];

        $this->comments->create($comment);
    }


    public function setupAction()
    {
        $this->comments->createTable(
          [
            'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
            'name' => ['varchar(50)', 'not null'],
            'email' => ['varchar(80)', 'not null'],
            'comment' => ['text(3000)'],
            'created' => ['datetime'],
            'updated' => ['datetime'],
          ]
        );

        $commenters = ['Lisa', 'Imre', 'Sixten', 'Neap'];
        foreach ($commenters as $commenter) {
            $this->add($commenter);
        }

        $url = $this->url->create('comments');
        $this->response->redirect($url);
    }


    public function removeAction($thisId)
    {
        $this->comments->delete($thisId);

        $url = $this->url->create('comments');
        $this->response->redirect($url);
    }




    public function addCommentAction()
    {
        $form = $this->showForm();

        $this->views->add('comment/form',
          [
            'form' => $form,
          ]
        );
    }




    public function viewAction()
    {
        $this->views->add('comment/comments',
          [
              'comments' => $this->comments->findAll(),
          ]
        );
    }



    public function editAction($thisComment)
    {
        $comment = $this->comments->find($thisComment);

        $options = [
            'name' => $comment->name,
            'email' => $comment->email,
            'comment' => $comment->comment,
            'created' => $comment->created,
        ];
        $form = $this->showForm($options);

        $this->views->add('comment/form',
          [
              'form' => $form,
          ]
        );
    }




    private function showForm($options = [])
    {
        $default = [
            'name' => null,
            'email' => null,
            'comment' => null,
            'created' => $this->now,
        ];

        $params = array_merge($default, $options);

        $form = $this->form->create([
          'id' => 'commentform',
        ],
          [
            'name' => [
              'type' => 'text',
              'label' => 'Name:',
              'required' => true,
              'value' => $params['name'],
              'validation' => ['not_empty'],
            ],
            'email' => [
              'type' => 'email',
              'label' => 'Email:',
              'required' => true,
              'value' => $params['email'],
              'validation' => ['not_empty'],
            ],
            'comment' => [
              'type' => 'textarea',
              'label' => 'Your Comment',
              'required' => true,
              'value' => $params['comment'],
              'validation' => ['not_empty'],
            ],
            'created' => [
              'type' => 'hidden',
              'required' => false,
              'value' => $params['created'],
            ],
            'Comment' => [
              'type' => 'submit',
              'callback' => function () {
                  $this->comments->save([
                      'name' => $this->form->Value('name'),
                      'email' => $this->form->Value('email'),
                      'comment' => $this->form->Value('comment'),
                      'created' => $this->form->Value('created'),
                      'updated' => $this->now,
                    ]
                  );
                  $this->message->setMessage(
                    [
                        'type' => 'ok',
                        'msg' => 'Allting sparades!'
                    ]
                  );
                  $this->message->setMessage(
                    [
                      'type' => 'error',
                      'msg' => 'Visar även en röd box'
                    ]
                  );
                  $url = $this->url->create('comments');
                  $this->response->redirect($url);
              },
            ],
          ]
        );
        $form->check();

        return $form->getHTML();
    }
}
