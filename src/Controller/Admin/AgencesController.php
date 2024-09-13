<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Controller\Component\CustomPaginator;
use App\Model\Table\AgencesTable;
use Cake\I18n\DateTime;

class AgencesController extends AppController
{

    public function initialize(): void
    {
      parent::initialize();
  
    }
    
    public function index(AgencesTable $agencesTable)
  {
    $search = $this->request->getQuery('search') ?? '';
    $query = $agencesTable->find()->select(['id','name','email','ville'])->where(['name LIKE' => "%{$search}%"]);
    $paginator = new CustomPaginator();
    $agences = $paginator->paginate($query, ['limit' => 15, 'page' => $this->request->getQuery('page')]);
    $this->set([
      'time' => DateTime::now()->i18nFormat('HH:mm:ss'),
      'agences' => [
        'data' => $agences,
        'paging' => $paginator->getPagingParams(),
      ],
      'filters' => $search
    ]);
  }
}