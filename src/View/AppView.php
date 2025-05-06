<?php
declare(strict_types=1);
namespace App\View;

use Cake\View\View;

class AppView extends View
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadHelper('Form', ['className' => 'BootstrapUI.Form']);
        $this->loadHelper('Html', ['className' => 'BootstrapUI.Html']);
        $this->loadHelper('Flash', ['className' => 'BootstrapUI.Flash']);
        $this->loadHelper('Paginator', ['className' => 'BootstrapUI.Paginator']);
    }
}
