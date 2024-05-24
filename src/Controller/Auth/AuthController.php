<?php

declare(strict_types=1);

namespace App\Controller\Auth;

use App\Controller\AppController;

/**
 * Auth Controller
 *
 */
class AuthController extends AppController
{

  /**
   * beforeFilter
   *
   * @param  mixed $event
   * @return void
   */
  public function beforeFilter(\Cake\Event\EventInterface $event)
  {
    $this->Authentication->allowUnauthenticated(['login']);
  }

  public function login()
  {
    $result = $this->Authentication->getResult();
    // If the user is logged in send them away.
    if ($result->isValid()) {
      $target = $this->Authentication->getLoginRedirect() ?? '/';
      return $this->redirect($target);
    }
    if ($this->request->is('post')) {
      $this->Flash->error('Invalid username or password');
    }

  }

  public function logout()
  {
    $this->Authentication->logout();
    return $this->redirect('/login');
  }
}
