<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\User;
use app\models\LoginForm;
use app\core\middlewares\AuthMiddleware;


class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile'])); 
    }
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()) {

            $user->loadData($request->getBody());
            if ($user->validate() && $user->save()) {
                // echo '<pre>';
                // var_dump("HERE");
                // echo '</pre>';
                exit;
    
                Application::$app->session->setFlash('success', 'Thanks for registeration');
               Application::$app->response->redirect('/');
            }
            // echo '<pre>';
            // var_dump($user);
            // echo '</pre>';
            // exit;
            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }
    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/'); 
    }
    public function profile()
    {

        return $this->render('profile');
    }
    
}

?>
<!-- //   echo '<pre>';
            //     var_dump($request->getBody());
            //     echo '</pre>';
            //     exit; -->