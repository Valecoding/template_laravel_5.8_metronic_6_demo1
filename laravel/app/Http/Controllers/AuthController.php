<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{

    /**
     * Отображение страницы авторизации
     * @return \Illuminate\View\View
     */
    public function getLogin()
    {

        return view('auth.login', array( 'title' => 'Login' ));
    }

    /**
     * Авторизация юзера пост запрос, делает проверку
     */
    public function postLogin()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(array('email' => $email, 'password' => $password))) {

            // Проверить активирован или нет
            if (Auth::user()->activation == 1) {
                return Response::json(array('success' => "true"), 200);
            } else {
                Auth::logout();
                return Response::json(array('success' => "false", 'error' => 'Вам нужно обновить данные для доступа. Напишите на почту поддержки'), 200);
            }
        } else {
            if (Auth::attempt(array('email' => $email, 'password' => $password))) {
                if (Auth::user()->activation == 1) {
                    return Response::json(array('success' => "true"), 200);
                } else {
                    Auth::logout();
                    return Response::json(array('success' => "false", 'error' => 'Вам нужно обновить данные для доступа. Напишите на почту поддержки'), 200);
                }
            } else {
                return Response::json(array('success' => "false", 'error' => 'Не правильный логин или пароль!'), 200);
            }
        }
    }

    /**
     * выход
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to(URL::to('/') . '/');
    }


}
