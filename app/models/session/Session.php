<?php

require_once ("session\ISession.php");


class Session implements ISession{

    public function __construct() {
    
        session_start();
    
    }
   
    public function set($sessionName, $var) {
    
        $_SESSION[$sessionName] = $var;
    
    }

    public function get($name) {
        
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return null;

    }
   
    public function validate() {
        
        if (empty($this->get("serializeUser")) || $this->get("serializeUser") == null ) {
            
            session_destroy();

            $url = "http://localhost/financeEight/app/view/home.php";
            
            header("Location: $url");
            die();

        }
    }

    public function destroy() {
        
        session_destroy();
    
    }
}