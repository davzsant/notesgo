<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\PostTable;

/**
 * User Controller
 *
 */
class UserController extends AppController
{
    protected PostTable $Post;

    public function initialize(): void
    {
        parent::initialize();
        $this->Post = $this->getTableLocator()->get('Post');
    }

    public function profile()
    {
        $user_id = $this->request->getSession()->read('user_id');
        if(!$user_id){
            $this->Flash->error('O Usuario precisa estar autenticado');
            return $this->redirect(['controller' => 'Auth', 'action' => 'login']);
        }
        $user = $this->User->find()
            ->contain(['Post'])
            ->where(['User.id' => $user_id])
            ->first();
         if(!$user){
            $this->Flash->error('O Usuario precisa estar autenticado');
            return $this->redirect(['controller' => 'Auth', 'action' => 'index']);
        }

        $count = $this->Post->find()->where(['user_id' => $user_id])->count();
        $post =  $this->Post->find()->where(['user_id' => $user_id])->order('RAND()')->first();


        $this->set('user', $user);
        $this->set('post', $post);
        $this->set('posts_count', $count);
    }


}
