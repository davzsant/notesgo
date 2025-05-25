<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\PostTable;
use App\Model\Table\UserTable;

class PagesController extends AppController
{
    protected UserTable $User;
    protected PostTable $Post;
    public function initialize(): void
    {
        parent::initialize();
        $this->Post = $this->getTableLocator()->get('Post');
        $this->User = $this->getTableLocator()->get('User');

    }

    /**
     * Metodo GET
     * Pagina Inicial com alguns posts aleatorios para ver
     * Retorna um Template
     */
    public function home()
    {
        $random_posts = $this->Post->find()
            ->order('RAND()')
            ->limit(10)
            ->toArray();

        $this->set('random_posts', $random_posts);

    }
}
