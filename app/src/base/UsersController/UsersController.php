<?php


namespace Me\base\UsersController;


use Me\base\Models\Comments;
use Me\base\Models\Users;
use Mos\HTMLForm\CForm;

class UsersController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;

    private $users;
    private $form;
    private $now;

    public function initialize()
    {
        $this->now = date('Y-m-d H:i:s');

        $this->form = new CForm();

        $this->users = new Users();
        $this->users->setDI($this->di);
    }


    public function listAction()
    {
        $this->users->query('id, acronym, email, name, created, updated, deleted, active');
        $all = $this->users->execute();

        $this->theme->setTitle("List all users");
        $this->views->add('users/list-all',
          [
            'users' => $all,
            'title' => "View all users",
          ]
        );
    }


    public function idAction($id = null)
    {
        $user = $this->users->find($id);

        $this->theme->setTitle("View users vid id");
        $this->views->add('users/view',
          [
            'user' => $user,
          ]
        );
    }


    public function deleteAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $this->users->delete($id);

        $url = $this->url->create($_SERVER['HTTP_REFERER']);
        $this->response->redirect($url);
    }


    public function softDeleteAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $now = date('Y-m-d H:i:s');

        $user = $this->users->find($id);

        $user->deleted = $now;
        $user->save();

        $url = $this->url->create($_SERVER['HTTP_REFERER']);
        $this->response->redirect($url);
    }


    public function unDeleteAction($id = null)
    {
        if (!isset($id)) {
            die("Missing id");
        }

        $user = $this->users->find($id);

        $user->deleted = null;
        $user->save();

        $url = $this->url->create($_SERVER['HTTP_REFERER']);
        $this->response->redirect($url);
    }


    public function activeListAction()
    {
        $all = $this->users->query()
          ->where('active IS NOT NULL')
          ->andWhere('deleted IS NULL')
          ->execute();

        $this->theme->setTitle("Users that are active");
        $this->views->add('users/list-all',
          [
            'users' => $all,
            'title' => "Users that are active",
          ]
        );
    }


    public function inActiveListAction()
    {
        $all = $this->users->query()
          ->where('active IS NULL')
          ->andWHere('deleted IS NULL')
          ->execute();

        $this->theme->setTitle("Users that are inactive");
        $this->views->add('users/list-all',
          [
            'users' => $all,
            'title' => "Users that are inactive",
          ]
        );
    }


    public function trashListAction()
    {
        $all = $this->users->query()
          ->where('deleted IS NOT NULL')
          ->execute();

        $this->theme->setTitle("Users that are soft-deleted");
        $this->views->add('users/list-all',
          [
            'users' => $all,
            'title' => "Users that are soft-deleted",
          ]
        );
    }


    public function inactivateAction($userId)
    {
        $id = filter_var($userId, FILTER_SANITIZE_NUMBER_INT);
        $user = $this->users->find($id);
        $user->active = null;
        $user->save();

        $url = $this->url->create($_SERVER['HTTP_REFERER']);
        $this->response->redirect($url);
    }


    public function activateAction($userId)
    {
        $id = filter_var($userId, FILTER_SANITIZE_NUMBER_INT);
        $user = $this->users->find($id);
        $user->active = date('Y-m-d H:i:s');
        $user->save();

        $url = $this->url->create($_SERVER['HTTP_REFERER']);
        $this->response->redirect($url);
    }


    public function setupAction(array $tableNames = [])
    {
        $tables = $this->setTableNames($tableNames);
        $this->createUserTable($tables);


        $addUsers = ['Saga', 'Nilsson', 'Berit', 'Mackan'];
        foreach ($addUsers as $user) {
            $this->add($user);
        }

        $url = $this->url->create('users/list/');
        $this->response->redirect($url);
    }

    private function createUserTable(array $tables)
    {
        $this->users->createTable($tables);
    }

    private function setTableNames(array $options = array())
    {
        $default = [
          'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
          'acronym' => ['varchar(20)', 'unique', 'not null'],
          'email' => ['varchar(80)'],
          'name' => ['varchar(80)'],
          'password' => ['varchar(255)'],
          'created' => ['datetime'],
          'updated' => ['datetime'],
          'deleted' => ['datetime'],
          'active' => ['datetime'],
        ];

        $tableArray = array_merge($default, $options);

        return $tableArray;
    }

    private function add($acronym, $name = null, $password = null)
    {
        if (!isset($acronym)) {
            die("Missing acronym");
        }

        $acronym = ucfirst($acronym);
        $password = (isset($password)) ? $password : $acronym;
        $now = date('Y-m-d H:i:s');


        $this->users->create([
            'acronym ' => $acronym,
            'email' => $acronym.'@mail.se',
            'name' => $acronym.' '.$acronym.'son',
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created' => $now,
            'active' => $now,
          ]
        );
    }

    public function addAction()
    {
        $this->theme->setTitle('Add user');

        $form = $this->userForm();

        $this->views->add('users/page',
          [
            'content' => $form,
          ]
        );
    }

    private function userForm($options = array())
    {
        $default = [
          'name' => null,
          'acronym' => null,
          'email' => null,
          'created' => $this->now,
          'deleted' => null,
          'active' => $this->now,
        ];

        $params = array_merge($default, $options);

        $form = $this->form->create([
          'id' => 'userform',
        ],
          [
            'name' => [
              'type' => 'text',
              'label' => 'Name:',
              'required' => true,
              'value' => $params['name'],
              'validation' => ['not_empty'],
            ],
            'acronym' => [
              'type' => 'text',
              'label' => 'Acronym:',
              'required' => true,
              'value' => $params['acronym'],
              'validation' => ['not_empty'],
            ],
            'email' => [
              'type' => 'email',
              'label' => 'Email:',
              'required' => true,
              'value' => $params['email'],
              'validation' => ['not_empty', 'email_adress'],
            ],
            'password' => [
              'type' => 'password',
              'required' => false,
              'validation' => [],
            ],
            'created' => [
              'type' => 'hidden',
              'required' => false,
              'value' => $params['created'],
            ],
            'deleted' => [
              'type' => 'hidden',
              'required' => false,
              'value' => $params['deleted'],
            ],
            'active' => [
              'type' => 'hidden',
              'required' => false,
              'value' => $params['active'],
            ],
            'Save' => [
              'type' => 'submit',
              'callback' => function () {
                  $this->users->save([
                      'name' => $this->form->Value('name'),
                      'acronym ' => $this->form->Value('acronym'),
                      'email' => $this->form->Value('email'),
                      'password' => password_hash($this->form->Value('password'), PASSWORD_DEFAULT),
                      'created' => $this->form->Value('created'),
                      'updated' => $this->now,
                      'active' => $this->form->Value('active'),
                    ]
                  );
                  $url = $this->url->create('users/list');
                  $this->response->redirect($url);
              },
            ],
          ]
        );
        $form->check();

        return $form->getHTML();
    }

    public function editAction($thisId)
    {
        $this->theme->setTitle('Edit user');

        $user = $this->users->find($thisId);

        $user = [
          'name' => $user->name,
          'acronym' => $user->acronym,
          'email' => $user->email,
          'created' => $user->created,
          'deleted' => $user->deleted,
          'active' => $user->active,
        ];

        $form = $this->userForm($user);

        $this->views->add('users/page',
          [
            'content' => $form,
          ]
        );
    }
}