<?php

namespace App\Controller;
use App\Controller\AppController;

class AuthController extends AppController
{
    /**
     * Pagina inicial para fazer o login
     * @return void
     */
    public function index()
    {
        $this->Flash->error('David');
        $this->set('name','David');
    }

    /**
     * Pagina de criação de Usuario
     * @return void
     */
    public function register()
    {

    }

    /**
     * Função que cria o usuario no banco de Dados
     */
    public function create()
    {
        $request_body = $this->request->getData();
        dd($request_body);
        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($request_body));
    }

    /**
     * Pagina de Criação de Senha
     * @return void
     */
    public function forgetPassword()
    {

    }
}
