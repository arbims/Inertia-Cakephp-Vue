<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\UsersTable;
use Cake\Database\Expression\QueryExpression;
use Cake\Database\Query;
use Cake\I18n\FrozenTime;
use Cake\ORM\TableRegistry;

/**
 * Home Controller
 *
 */
class HomeController extends AppController
{

  public function index()
  {
    $this->set(['username' => 'elarbi']);
  }

  public function settings()
  {
  }

  public function logout()
  {
    debug($this->request->getData());
    dd('user is logout');
  }
}
