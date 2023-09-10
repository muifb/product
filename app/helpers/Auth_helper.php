<?php

class Signin
{
    private static $active = '12/31/2023';

    public static function setLogin($nik, $nama, $idShift, $kelShift, $idPro)
    {
        $_SESSION['login'] = [
            'nik' => $nik,
            'nama' => $nama,
            'id_shift' => $idShift,
            'shift' => $kelShift,
            'id_pro' => $idPro
        ];
    }

    public static function setLoginAdmin($nik, $nama, $alamat)
    {
        $_SESSION['login-admin'] = [
            'nik' => $nik,
            'nama' => $nama,
            'alamat' => $alamat
        ];
    }

    public static function login()
    {
        if (isset($_SESSION['login'])) {
            header('Location: /home');
            exit;
        }
    }

    public static function isLogin()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: /auth/index');
            exit;
        }
        // if (date('m/d/Y') > date(self::$active)) {
        // } 
        // else {
        //     session_unset();
        //     session_destroy();
        //     header('Location: /auth/trial');
        //     exit;
        // }
    }

    public static function loginAdmin()
    {
        if (isset($_SESSION['login-admin'])) {
            header('Location: /landing/vismen');
            exit;
        }
    }

    public static function isLoginAdmin()
    {
        if (!isset($_SESSION['login-admin'])) {
            header('Location: /auth/ppic');
            exit;
        }
    }

    public static function isActive()
    {
        if (date(self::$active) > date('m/d/Y')) {
            if (isset($_SESSION['login'])) {
                header('Location: /home');
                exit;
            } else {
                header('Location: /');
                exit;
            }
        }
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
    }
}
