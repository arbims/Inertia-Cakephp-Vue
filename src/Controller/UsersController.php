<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\Component\CustomPaginator;
use App\Model\Table\UsersTable;
use Cake\I18n\DateTime;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
  protected array $paginate = [
    'limit' => 10,
  ];
  public function initialize(): void
  {
      parent::initialize();

  }

  public function index(UsersTable $usersTable)
  {
    $search = $this->request->getQuery('search') ?? '';
    $query = $usersTable->find()->select(['id','name'])->where(['name LIKE' => "%{$search}%"]);
    $paginator = new CustomPaginator();
    $users = $paginator->paginate($query);
    $this->set([
      'time' => DateTime::now()->i18nFormat('HH:mm:ss'),
      'users' => [
        'data' => $users,
        'paging' => $paginator->getPagingParams(),
      ],
      'filters' => $search
    ]);
  }

  public function create(UsersTable $usersTable)
  {
    if ($this->request->is('POST')) {
      $data = $this->request->getData();
      $user = $usersTable->newEntity($data);
      if ($usersTable->save($user)) {
        $this->Flash->success('User Saved');
        return $this->redirect('/users');
      } else {
        $this->set([
          'errors' => $user->getErrors()
        ]);
      }
    }
  }

  public function edit(int $id, UsersTable $usersTable)
  {
    $user = $usersTable->get($id);
    if ($this->request->is('PUT')) {
      $data = $this->request->getData();
      if (empty($data['password'])) {
        unset($data['password']);
      }
      $user = $usersTable->patchEntity($user, $data);
      if ($usersTable->save($user)) {
        $this->Flash->success('User Saved');
        return $this->redirect('/users');
      } else {
        $this->set([
          'errors' => $user->getErrors()
        ]);
      }
    }
    $this->set([
      'user' => $user
    ]);
  }

}
