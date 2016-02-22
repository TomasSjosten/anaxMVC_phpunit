<?php

namespace Me\base\CFormController;

use Mos\HTMLForm\CForm;

class CFormController
{
    use \Anax\DI\TInjectionaware;
    /**
     * Index action using external form.
     *
     */
    public function indexAction()
    {
        $this->di->session();
        $form = new CformHandler();
        $form->setDI($this->di);
        $form->check();

        return $form->getHTML();
    }
}