<?php

class User extends BD
{
    private $nombre;
    private $username;

    public function userExists($user,$pass)
    {
        $md5pass = md5($pass);
        
    }


}


?>