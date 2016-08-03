<?php

class User extends Model
{

    public function getByLogin($login)
    {
        $login = $this->db->escape($login);
        $sql = "select * from users where login = '{$login}' limit 1";
        $result = $this->db->query($sql);
        if (isset($result[0])) {
            return $result[0];
        }
        return false;
    }

    public function addUser($form_fields){
        $login=$form_fields['login'];
        $email=$form_fields['email'];
        $password=$form_fields['password'];
        $hash = md5(Config::get('salt') . $password);
        $sql="
            insert into users
            set login='{$login}',
                email='{$email}',
                password='{$hash}'";
        if( $this->db->query($sql)){
           return $this->getByLogin($login);
        }return false;
    }
}