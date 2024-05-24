<?php

namespace App\Controller\Component;

use Cake\Datasource\Paging\NumericPaginator;

class CustomPaginator extends NumericPaginator {

  public function getPagingParams() {
    return $this->pagingParams;
  }
}
