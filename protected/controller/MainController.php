<?php

/**
 * MainController
 * Feel free to delete the methods and replace them with your own code.
 *
 * @author darkredz
 */
class MainController extends DooController {

    public function index() {
        /*$this->data['slug'] = 'home';
        $this->renderc('home',$this->data);*/
        header('location:'.Doo::conf()->APP_URL.'/programa');
    }
    
    public function website() {
        $this->data['slug'] = 'website';
        $this->renderc('website',$this->data);
    }
    
    public function programa() {
        $this->data['slug'] = 'programa';
        $this->renderc('eventos',$this->data);
    }
    
    public function issue() {
        $this->data['slug'] = 'issue';
        $this->renderc('issue',$this->data);
    }

}

?>