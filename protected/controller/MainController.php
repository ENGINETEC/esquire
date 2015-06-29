<?php

/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class MainController extends DooController {

    public function index() {
        $this->data['slug'] = 'home';
        $this->renderc('home',$this->data);
    }
    
    public function website() {
        $this->data['slug'] = 'website';
        $this->renderc('website',$this->data);
    }
    
    public function programa() {
        $this->data['slug'] = 'programa';
        $this->renderc('eventos',$this->data);
    }

}

?>