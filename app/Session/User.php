<?php

namespace App\Session;

class User
{
    /**
     * Método responsável por iniciar a sessão dentro da aplicação
     * @return bool
     */
    private static function init()
    {
        return !(session_status() !== PHP_SESSION_ACTIVE) || session_start();
    }

    /**
     * @param string $name
     * @param string $email
     */
    public static function login($name, $email)
    {
        self::init();

        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email
        ];
    }

    /**
     * @return bool
     */
    public static function isLogged()
    {
        self::init();
        return isset($_SESSION['user']);
    }

    /**
     * @return array
     */
    public static function getInfo()
    {
        self::init();
        return $_SESSION['user'] ?? [];
    }

    /**
     *Método responsável por destruir a sessão
     */
    public static function logout()
    {
        self::init();
        unset($_SESSION['user']);
    }
}