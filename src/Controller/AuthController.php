<?php

namespace App\Controller;
use App\Controller\AppController;
use App\Model\Table\UserTable;
use Cake\ORM\TableRegistry;
use Exception;

class AuthController extends AppController
{
    protected UserTable $User;
    public function initialize(): void
    {
        parent::initialize();
        $this->User = $this->getTableLocator()->get('User');
    }
    /**
     * Pagina inicial para fazer o login
     * @return void
     */
    public function index()
    {
        $this->set([
            'email' => $this->request->getQueryParams('email')['email'] ?? ''
        ]);
    }

    /**
     * Pagina de criação de Usuario
     * @return void
     */
    public function register()
    {
        $this->set([
            'email' => $this->request->getQueryParams('email')['email'] ?? ''
        ]);
    }

    public function login()
    {
        $data = $this->request->getData();
        if(!$this->User->exists(['email' => $data['email']])){
            $this->Flash->warning('Esta conta não existe, crie uma nova conta');
            return $this->redirect(['action' => 'register',
            '?' => [
                'email' => $data['email']
            ]]);
        }

        $user = $this->User->find()->where(['email' => $data['email']])->first();
        if($user->password !== $data['password'])
        {
            $this->Flash->warning('Senha incorreta');
            return $this->redirect(['action' => 'index',
            '?' => [
                'email' => $data['email']
            ]]);
        }
        $this->Flash->success('Login realizado com Sucesso');
        $this->request->getSession()->write('user_id', $user->id);
        return $this->redirect(['controller' => 'Pages' , 'action' => 'index']);
    }

    /**
     * Função que cria o usuario no banco de Dados
     */
    public function create()
    {
        try{
            $data = $this->request->getData();

            if($this->User->exists(['email' => $data['email']])){
                $this->Flash->warning('Esta conta já existe, faça login');
                return $this->redirect(['action' => 'index',
                '?' => [
                    'email' => $data['email']
                ]]);
            }

            $user = $this->User->newEmptyEntity();

            $user = $this->User->patchEntity($user, [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password']
            ]);
            $this->User->saveOrFail($user);
            $this->Flash->success('Usuario criado com scesso');
            $this->request->getSession()->write('user_id', $user->id);
            return $this->redirect(['controller' => 'Pages' , 'action' => 'index']);
        }
        catch(Exception $error)
        {
            $this->Flash->error('Houve um erro no criação do Usuario');
            return $this->redirect(['controller' => 'Auth' , 'action' => 'index']);
        }
    }

    /**
     * Pagina de Criação de Senha
     * @return void
     */
    public function forgetPassword()
    {

    }
}
