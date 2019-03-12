<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class AuthController extends CrudController {

    public function index() {
        include ABS_VIEW . $this->folder . '/' . $this->page . '.php';
    }

    public function login() {
        try {
            if (empty($_POST['email']) || empty($_POST['senha'])) {
                throw new Exception("Não foi passado os parâmetros necessários");
            }
            $email = addslashes($_POST['email']);
            $senha = md5(addslashes($_POST['senha']));

            $usuarioDAO = new usuarios();
            $usuario = $usuarioDAO->execute("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

            if (count($usuario) > 0) {
                $_SESSION[APP_NAME]['logado'] = true;
                $_SESSION[APP_NAME]['usuario'] = $usuario[0];
                echo json_encode(array(
                    'valid' => 'true'
                ));
            } else {
                throw new Exception("Não foi encontrado nenhum usuário");
            }
        } catch (Exception $ex) {
            header('HTTP/1.1 500');
            echo $ex->getMessage();
        }
        return;
    }

    public function logout() {
        session_unset();
        redirect();
    }

}
