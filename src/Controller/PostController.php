<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\PostTable;
use Exception;

/**
 * Post Controller
 *
 */
class PostController extends AppController
{
    protected PostTable $Post;
    public function initialize(): void
    {
        parent::initialize();
        $this->Post = $this->getTableLocator()->get('Post');
    }

    /**
     * Metodo GET
     * Listagem de Posts sem um algoritmo
     * Exibe um Template
     */
    public function index()
    {
        if(!$this->request->getSession()->read('user_id')){
            $this->Flash->error('O Usuario precisa estar logado');
            return $this->redirect(['controller' => 'Auth' ,'action' => 'index']);
        }
        $posts = $this->Post->find()->limit(10)->orderByDesc('id');
        $posts_paginated = $this->paginate($posts);
        $this->set('posts', $posts_paginated);
    }

    /**
     * Metodo POST
     * Cria um post
     */
    public function create()
    {
        if($this->request->getMethod() == 'POST')
        {
            try{
                $data = $this->request->getData();
                $user_id = $this->request->getSession()->read('user_id');
                if(!$user_id){
                    $this->Flash->error('O Usuario precisa estar logado');
                    return $this->redirect(['controller' => 'Auth' ,'action' => 'index']);
                }
                $post = $this->Post->newEmptyEntity();
                $post = $this->Post->patchEntity($post, [
                    ...$data,
                    'user_id' => $user_id
                ]);
                $this->Post->saveOrFail($post);
                $this->Flash->success('Post Criado com Sucesso');
                return $this->redirect(['action' => 'index']);
            }
            catch(Exception $error)
            {
                $this->Flash->error($error->getMessage());
                return $this->redirect(['action' => 'index']);
            }

        }
        else
        {

        }
    }


    /**
     * Metodo GET
     * Exibe uma postagem
     */
    public function view($id)
    {
        $post = $this->Post->find()
            ->contain(['User'])
            ->where(['Post.id' => $id])
            ->first();
        $this->set('post',$post);
    }


}
