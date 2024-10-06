<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        // Permite ações não autenticadas
        $this->Authentication->allowUnauthenticated(['index', 'view']);
    }

    public function afterLogin()
    {
        // Redireciona para Movimentations após login
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            return $this->redirect(['controller' => 'Movimentations', 'action' => 'index']);
        }
    }
}
