<?php

/**
 * Leandro Ximenes
 *
 * @package Controller
 * @since 0.1
 */
class CrudController {

    /**
     * $headTitle
     *
     * Receberá o título da página.
     * @access public
     */
    public $headTitle;

    /**
     * $public
     * acesso public.
     * @access public
     * @var boolean
     */
    public $public;

    /**
     * $page
     *
     * nome da página.
     *
     * @access public
     */
    public $page;

    /**
     * $folder
     *
     * nome da pasta
     *
     * @access public
     */
    public $folder;

    /**
     * $parametro
     *
     * Ex.: O id
     *
     * @access public
     */
    public $parametro;

    /**
     * $objDAO
     *
     * objeto para acesso ao banco de dados
     *
     * @access public
     */
    public $objDAO;

    public function __construct($parameters) {
        $this->headTitle = NAMESYSTEM;
        $this->folder = $parameters->url_controlName;
        $this->page = $parameters->acao;
        $this->public = $parameters->public;
        $this->parametro = $parameters->parametros;
    }

    function getHeadTitle() {
        return $this->headTitle;
    }

    function setHeadTitle($headTitle) {
        $this->headTitle = $headTitle;
    }

    public function index() {
        $list = $this->objDAO->findAll();
        return new ViewModel($this, array('lista' => $list));
    }

    public function novo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->objDAO->setObjetctDAO($_POST);
                $this->objDAO->salvar();
                $this->SetMensagem();
                redirect($this->folder);
                return;
            } catch (Exception $exc) {
                $this->SetMensagem('danger');
                return new ViewModel($this, array('dados' => $_POST));
            }
        }

        return new ViewModel($this, array('dados' => $this->objDAO->getObjetctDAO()));
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            try {
                $this->objDAO->setObjetctDAO($_POST);
                $this->objDAO->salvar();
                $this->SetMensagem();
                redirect($this->folder);
                return;
            } catch (Exception $exc) {
                $this->SetMensagem('danger');
                return new ViewModel($this, array('dados' => $_POST));
            }
            return;
        }
        $dados = $this->objDAO->findHash($this->parametro);
        return new ViewModel($this, array('dados' => $dados));
    }

    public function excluir() {
        $linhasAfetadas = $this->objDAO->deleteHash($this->parametro);
        if ($linhasAfetadas == 0) {
            if (strpos($_SERVER['HTTP_ACCEPT'], 'json')) {
                header('HTTP/1.1 500');
                echo 'Não foi possivel excluir o registro';
                return;
            } else {
                $this->SetMensagem('danger', "Não foi possivel excluir o registro.");
                redirect($this->folder);
            }
        } else {
            if (strpos($_SERVER['HTTP_ACCEPT'], 'json')) {
                echo json_encode(array(
                    'result' => 'Registro excluído com sucesso'
                ));
                return;
            } else {
                $this->SetMensagem('success', "Registro excluído com sucesso");
                redirect($this->folder);
            }
        }
    }

    public function notFound() {
        $this->folder = 'home';
        $this->page = '404';
        return new ViewModel($this);
    }

    /**
     * SetMensagem
     *
     * @param  string $tipo success, danger, className
     * @param  string $texto Nome do controlador
     */
    protected function SetMensagem($tipo = 'success', $texto = null) {
        if ($texto == null) {
            switch ($tipo) {
                case "success" :
                    $texto = MSGM_SUCCESS;
                    break;
                case "danger":
                    $texto = MSGM_DANGER;
                    break;

                default:
                    break;
            }
        }

        $_SESSION['mensagem']['tipo'] = $tipo;
        $_SESSION['mensagem']['texto'] = $texto;
    }

    public function GetMensagem() {
        $mensagem = '';
        if (isset($_SESSION['mensagem']))
            $mensagem = $_SESSION['mensagem'];

        unset($_SESSION['mensagem']);
        return $mensagem;
    }

}
