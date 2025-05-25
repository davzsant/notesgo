<?php

namespace App\Controller;
use App\Controller\AppController;
use App\Model\Table\UserTable;
use Exception;

/**
 * Cuida das paginas de Login / Registro de Usuario / Esquecimento de Conta
 */
class AuthController extends AppController
{
    protected UserTable $User;
    public function initialize(): void
    {
        parent::initialize();
        $this->User = $this->getTableLocator()->get('User');
    }
    /**
     * Meotodo GET
     * Pagina inicial para fazer o login
     * Retorna um Template
     */
    public function index()
    {
        if($this->request->getMethod() == 'POST')
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
        $this->set([
            'email' => $this->request->getQueryParams('email')['email'] ?? ''
        ]);
    }

    /**
     * GET
     * Pagina de criação de Usuario
     * Retorno um Template
     */
    public function register()
    {
        if($this->request->getMethod() == 'POST')
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
        $this->set([
            'email' => $this->request->getQueryParams('email')['email'] ?? ''
        ]);
    }

    /**
     * Metodo POST
     * Realiza o Login do Usuario com base nas suas credenciais
     * Redireciona para a Pagina Correta
     */
    public function login()
    {

    }

    /**
     * Metodo POST
     * Cria um Usuario se não existir um outro usuario com o mesmo Email
     * Redireciona para a Pagina Correta
     */
    public function create()
    {

    }

    /**
     * Metodo GET
     * Pagina de Esquecimento de Senha
     * Retorna um Template
     */
    public function forgetPassword()
    {

    }
}
