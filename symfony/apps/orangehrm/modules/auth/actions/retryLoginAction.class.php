<?php

class retryLoginAction extends sfAction {

    public function execute($request) {

        $this->setLayout('loginLayout');
        $this->setTemplate('loginCustom', 'auth');

        $loginForm = new LoginForm();
        $this->message = $this->getUser()->getFlash('message');
        $this->form = $loginForm;
    }

}
