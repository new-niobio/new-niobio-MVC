<?php

/**
 * Description of Util
 *
 * @author Leandro
 */
function inverteData(&$data) {
    if ($data != null && $data != '') {
        if (count(explode("/", $data)) > 1) {
            return $data = implode("-", array_reverse(explode("/", $data)));
        } elseif (count(explode("-", $data)) > 1) {
            return $data = implode("/", array_reverse(explode("-", $data)));
        }
    }
}

function getDataExtenso(&$data) {
    if ($data != null && $data != '') {
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        return $data = utf8_encode(ucfirst(strftime('%B %Y', strtotime(date_format($data, 'Y-m-d')))));
    }
}

function getDiaSemana($data) {
    if ($data != null && $data != '') {
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        return utf8_encode(strftime("%A", strtotime($data->format('Y-m-d'))));
    }
}

function converterNumeroMes($mes) {
    if ($mes != null && $mes != '') {
        switch ($mes) {
            case 1:
                return 'Janeiro';
                break;
            case 2:
                return 'Fevereiro';
                break;
            case 3:
                return 'Março';
                break;
            case 4:
                return 'Abril';
                break;
            case 5:
                return 'Maio';
                break;
            case 6:
                return 'Junho';
                break;
            case 7:
                return 'Julho';
                break;
            case 8:
                return 'Agosto';
                break;
            case 9:
                return 'Setembro';
                break;
            case 10:
                return 'Outubro';
                break;
            case 11:
                return 'Novembro';
                break;
            case 12:
                return 'Dezembro';
                break;

            default:
                break;
        }
    }
}

function converterArrayNumeroMes($array) {
    foreach ($array as $value) {
        $newArray[$value] = converterNumeroMes($value);
    }
    return $newArray;
}

function converterArrayNumeroMesAno($array) {
    foreach ($array as $value) {
        $data = explode('/', $value);
        $newArray[$value] = converterNumeroMes($value) . '/' . $data[1];
    }
    return $newArray;
}

function converterArrayIndice($data, $id, $descricao) {
    foreach ($data as $value) {
        $newArray[$value[$id]] = $value[$descricao];
    }
    return $newArray;
}

function converteMoedaBanco(&$valor) {
    return $valor = str_replace(',', '.', str_replace('.', '', $valor));
}

function chk_array($array, $key) {
    // Verifica se a chave existe no array
    if (isset($array[$key]) && !empty($array[$key])) {
        // Retorna o valor da chave
        return $array[$key];
    }

    // Retorna nulo por padrão
    return null;
}

/**
 * redirect
 *
 * @param  bool $public Está no módulo admin
 * @param  string $action Nome do controlador
 * @param  string $controller Nome da ação
 */
function redirect($controller = null, $action = null, $public = true) {

    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    $url = $public ? 'admin' : '';
    $url .= $controller ? "/$controller" : '';
    $url .= $action ? "/$action" : '';

    header("Location:  " . PROTOCOLO . "$host$uri/$url");
}

function loadMessagem($array) {
    if (!empty($array))
        echo <<<MSG
        <div class="alert alert-{$array['tipo']}">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h4>{$array['texto']}</h4>
        </div>
MSG;
}

function limpaMascara(&$valor) {
    $valor = str_replace("(", "", $valor);
    $valor = str_replace(")", "", $valor);
    $valor = str_replace("/", "", $valor);
    $valor = str_replace("|", "", $valor);
    $valor = str_replace(".", "", $valor);
    $valor = str_replace(",", "", $valor);
    $valor = str_replace("-", "", $valor);
    $valor = str_replace(" ", "", $valor);
    return $valor;
}

function dateSmalltoFull(&$valor) {
    if ($valor != null && $valor != '') {
        $date_small = explode('/', $valor);
        return $valor = '01/' . $date_small[0] . '/' . $date_small[1];
    }
}

function dateFulltoSmall(&$valor) {
    if ($valor != null && $valor != '') {
        $date_small = explode('/', $valor);
        return $valor = $date_small[1] . '/' . $date_small[2];
    }
}

function newNumber_format(&$number, $decimals = null, $dec_point = null, $thousands_sep = null) {
    if ($number != null && $number != '') {
        return $number = number_format($number, $decimals, $dec_point, $thousands_sep);
    }
}

function setHashId(&$id) {
    if ($id == null || $id != '') {
        $id = uniqid(time());
    }
    return $id;
}

function gerarOptionSelect($array, $valor) {
    foreach ($array as $key => $value) {
        $selected = $key == $valor ? 'selected="selected"' : '';
        $html .= "<option $selected value=\"$key\">$value</option>";
    }
    return $html;
}
