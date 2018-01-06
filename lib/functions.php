<?php

/**
 * LIBRER�A DE FUNCIONES
 * ADMINISTRADOR - IMAGENWEBHQ.COM
 * @author "Raul Ramirtez" <raulramirezolmedo@gmail.com>
 * @copyright 2015 Imagenwebhq.com
 * @version 1 2015-12-06
 */

/**
 * Funcion para obtener la url
 * @return string Retorna la url actual
 */
function getUrl() {
    //$url = "http://" . $_SERVER['HTTP_HOST'] . '/argor.com.py/';
    $url = "http://" . $_SERVER['HTTP_HOST'] . '/';
    return $url;
}

/**
 * Funcion para obtener la pagina actual
 * @return string Retorna la pagina actual
 */
function getPage() {
    $uri = $_SERVER['REQUEST_URI'];
    $uri = str_replace('/', '', $uri);
    return $uri;
}

/**
 * Funcion que obtiene el nombre del archivo que se esta ejecutando actualmente
 * @return string
 */
function getPageName() {
    $page = basename($_SERVER['PHP_SELF']);
    return $page;
}

/**
 * Encripta una contrase�a con la funcion crypt
 * @param string $password para realizar el hash
 * @return string Hash
 */
function crypt_hash($password, $digito = 7) {
    $set_salt = './1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz@!_;';
    $salt = sprintf('$2a$%02d$', $digito);
    for ($i = 0; $i < 22; $i++) {
        $salt .= $set_salt[mt_rand(0, 22)];
    }
    return crypt($password, $salt);
}

/**
 * Elimina caracteres especiales de un input
 * @param string $data ha ser eliminado de caracteres especiales
 * @return string
 */
function input_special($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Funcion para verificar si el usuario esta logueado
 * @param string $session ha ser eliminado de caracteres especiales
 * @return bool true=logged, false=not logged
 */
function login($session) {
    var_dump($session);
    if (!isset($session)) {
        //header('Location:admin/');
        echo 'no se logueo';
    } else {
        //header('Location:admin/#dashboard');
        echo 'si';
    }
}

/**
 * Funcion para limpiar los caracteres especiales
 * @param string
 * @return string formateado
 */
function limpiar($String) {
    $String = str_replace(array('á', 'à', 'â', 'ã', 'ª', 'ä'), "a", $String);
    $String = str_replace(array('Á', 'À', 'Â', 'Ã', 'Ä'), "A", $String);
    $String = str_replace(array('Í', 'Ì', 'Î', 'Ï'), "I", $String);
    $String = str_replace(array('í', 'ì', 'î', 'ï'), "i", $String);
    $String = str_replace(array('é', 'è', 'ê', 'ë'), "e", $String);
    $String = str_replace(array('É', 'È', 'Ê', 'Ë'), "E", $String);
    $String = str_replace(array('ó', 'ò', 'ô', 'õ', 'ö', 'º'), "o", $String);
    $String = str_replace(array('Ó', 'Ò', 'Ô', 'Õ', 'Ö'), "O", $String);
    $String = str_replace(array('ú', 'ù', 'û', 'ü'), "u", $String);
    $String = str_replace(array('Ú', 'Ù', 'Û', 'Ü'), "U", $String);
    $String = str_replace(array('[', '^', '´', '`', '¨', '~', ']'), "", $String);
    $String = str_replace("ç", "c", $String);
    $String = str_replace("Ç", "C", $String);
    $String = str_replace("ñ", "n", $String);
    $String = str_replace("Ñ", "N", $String);
    $String = str_replace("Ý", "Y", $String);
    $String = str_replace("ý", "y", $String);

    $String = str_replace("&aacute;", "a", $String);
    $String = str_replace("&Aacute;", "A", $String);
    $String = str_replace("&eacute;", "e", $String);
    $String = str_replace("&Eacute;", "E", $String);
    $String = str_replace("&iacute;", "i", $String);
    $String = str_replace("&Iacute;", "I", $String);
    $String = str_replace("&oacute;", "o", $String);
    $String = str_replace("&Oacute;", "O", $String);
    $String = str_replace("&uacute;", "u", $String);
    $String = str_replace("&Uacute;", "U", $String);
    return $String;
}

/**
 * Funcion para generar un string Aleatorio
 * @param int $lenght Default 10
 * @return string aleatorio
 */
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Funcion para reemplazar los espacios por guion bajo
 * @param string
 * @return string formateado
 */
function limpia_espacios($cadena) {
    $cadena = str_replace(' ', '_', $cadena);
    return $cadena;
}

function caracteres($string) {
    $string = trim($string);

    $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
    );

    $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
    );

    $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
    );

    $string = str_replace(
            array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
    );

    $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
    );

    $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C',), $string
    );

    //Esta parte se encarga de eliminar cualquier caracter extraño
    $string = str_replace(
            array("/\/", "¨", "º", "-", "~", "#", "@", "|", "!", "·", "$", "%", "&", "/", "(", ")", "?", "'", "¡", "¿", "[", "^", "<code>", "]", "+", "}", "{", "¨", "´", ">", "< ", ";", ",", ":", ".", " "), '', $string);



    return $string;
}

function obtenerDestacados($idSeccion) {
    $db = DataBase::getInstance();
    $sql = "SELECT
                    p.*, m.descripcion AS marca
            FROM producto p
            LEFT JOIN marca m ON m.id = p.id_marca
            LEFT JOIN producto_seleccionado ps on ps.id_producto = p.id
            LEFT JOIN seccion_producto sp on sp.id = ps.id_seccion_producto
            WHERE sp.id = $idSeccion";
    $db->setQuery($sql);
    $lista = $db->loadObjectList();
    return $lista;
}

function obtenerCorporativoLocal($idLocal) {
    $db = DataBase::getInstance();
    $sql = "select l.id, 
                    cl.corporativo, 
                    l.nombre as sucursal
            from corporativos_locales cl 
            LEFT JOIN locales l on l.id = cl.id_local
            where cl.id_local = $idLocal;";
    $db->setQuery($sql);
    $lista = $db->loadObjectList();
    return $lista;
}

/**
 * Funcion para mostrar el menu del sitio
 * @param int $padre
 * @param type $nivel
 */
function mostrarMenu($padre, $nivel) {
    $db = DataBase::getInstance();
    $sql = "SELECT c.id, c.descripcion, c.url_rewrite, Deriv1.Count FROM categoria c LEFT OUTER JOIN (SELECT padre_id, COUNT(*) AS Count FROM categoria GROUP BY padre_id) Deriv1 ON c.id = Deriv1.padre_id WHERE c.padre_id= $padre and estado = 1 ORDER BY c.orden ASC LIMIT 6";
    $db->setQuery($sql);
    $result = $db->loadObjectList();
    echo '<ul class="nav navbar-nav margin0">';
    foreach ($result as $row) {
        if ($row->Count > 0) {
            echo "<li class='dropdown mega-dropdown'><a href='" . getUrl() . $row->id . '/ofertas/' . utf8_encode($row->url_rewrite) . "' class='dropdown-toggle' data-toggle='dropdown'>" . utf8_encode($row->descripcion) . "<span class='caret'></span></a>";
            subMenu($row->id, $nivel + 1);
            echo "</li>";
        } elseif ($row->Count == 0) {
            if ($row->id == 71) {
                echo "<li><a href='" . getUrl() . $row->url_rewrite . "'><span>" . utf8_encode($row->descripcion) . "</span></a></li>";
            } elseif ($row->id == 85) {
                echo "<li><a href='" . getUrl() . $row->url_rewrite . "'><span>" . utf8_encode($row->descripcion) . "</span></a></li>";
            } else {
                echo "<li><a href='" . getUrl() . $row->id . '/ofertas/' . utf8_encode($row->url_rewrite) . "'><span>" . utf8_encode($row->descripcion) . "</span></a></li>";
            }
        } 
            else;
    }
    echo '<li class="dropdown mega-dropdown"><a href="#"> <span>+</span></a>';
    menuPlus(0, 1);
    echo '</li>';
    echo "</ul>";
}

function subMenu($padre, $nivel) {
    $db = DataBase::getInstance();
    $sql = "SELECT c.id, c.descripcion, c.url_rewrite, Deriv1.Count FROM categoria c LEFT OUTER JOIN (SELECT padre_id, COUNT(*) AS Count FROM categoria GROUP BY padre_id) Deriv1 ON c.id = Deriv1.padre_id WHERE c.padre_id = $padre";
    $db->setQuery($sql);
    $result = $db->loadObjectList();
    echo '<ul class="dropdown-menu mega-dropdown-menu">';
    foreach ($result as $row) {
        if ($row->Count > 0) {
            echo "<li class='floatNone'><a href='" . getUrl() . $row->id . '/ofertas/' . utf8_encode($row->url_rewrite) . "'><span>" . utf8_encode($row->descripcion) . "</span></a>";
//$new_sub = new Helper();
            echo "</li>";
        } elseif ($row->Count == 0) {
            echo "<li class='floatNone'><a href='" . getUrl() . $row->id . '/ofertas/' . utf8_encode($row->url_rewrite) . "'><span>" . utf8_encode($row->descripcion) . "</a></li>";
        } 
            else;
    }
    echo "</ul>";
}

function menuPlus($padre, $nivel) {
    $db = DataBase::getInstance();
    $sql = "SELECT c.id, c.descripcion, c.url_rewrite, Deriv1.Count FROM categoria c LEFT OUTER JOIN (SELECT padre_id, COUNT(*) AS Count FROM categoria GROUP BY padre_id) Deriv1 ON c.id = Deriv1.padre_id WHERE c.padre_id= $padre AND c.orden > 6 and c.estado = 1 ORDER BY c.orden ASC";
    $db->setQuery($sql);
    $result = $db->loadObjectList();
    echo '<ul class="dropdown-menu mega-dropdown-menu">';
    foreach ($result as $row) {
        if ($row->Count > 0) {
            echo "<li class='floatNone'><a href='" . getUrl() . $row->id . '/ofertas/' . utf8_encode($row->url_rewrite) . "'><span>" . utf8_encode($row->descripcion) . "</span></a>";
            //$new_sub->subMenuPlus($row['id'], $nivel + 1);
            echo "</li>";
        } elseif ($row->Count == 0) {
            echo "<li class='floatNone'><a href='" . getUrl() . $row->id . '/ofertas/' . utf8_encode($row->url_rewrite) . "'><span>" . utf8_encode($row->descripcion) . "</span></a></li>";
        } 
            else;
    }
    echo "</ul>";
}

/**
 * Funcion para limpiar un input antes de enviarlo por post
 * @param type $data
 * @return type
 */
function cleanInput($data) {
    $data = trim($data);
    $data = str_replace("'", "\'", $data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);

    return $data;
}
