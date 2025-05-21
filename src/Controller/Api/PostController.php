<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use App\Model\Table\PostTable;

class PostController extends AppController
{
    protected PostTable $Post;

    public function initialize(): void
    {
        parent::initialize();
        $this->Post = $this->getTableLocator()->get('Post');
    }
    public function get()
    {
        $query_params = $this->request->getQueryParams();
        $posts = $this->Post->find();

        if(!empty($query_params)){
            if(!empty($query_params['limit'])){
                $posts->limit($query_params['limit']);
            }
        }

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode($posts->toArray()));
    }
}
