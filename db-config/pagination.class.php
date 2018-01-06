<?php

class Pagination {

    private $num_pages = 1;
    private $start = 0;
    private $display;
    private $start_display;
    private $db;

    function __construct($query, $display = 10) {

        if (!empty($query)) {
            $this->display = $display;
            if (isset($_GET['display']) && is_numeric($_GET['display']))
                $this->display = (int) $_GET['display'];
            if (isset($_GET['np']) && is_numeric($_GET['np']) && $_GET['np'] > 0) {
                $this->num_pages = (int) $_GET['np'];
            } else {
                if (is_numeric($query)) {
                    $num_records = $query;
                } else {
                    $result = mysqli_query($query);
                    if (mysqli_num_rows($result) > 1 || strstr($query, 'COUNT') === false) {
                        $num_records = mysqli_num_rows($result);
                    } else {
                        $row = mysqli_fetch_row($result);
                        $num_records = $row[0];
                    }
                }
                if ($num_records > $this->display)
                    $this->num_pages = ceil($num_records / $this->display);
            }
            if (isset($_GET['s']) && is_numeric($_GET['s']) && $_GET['s'] > 0)
                $this->start = (int) $_GET['s'];
            $this->start_display = " LIMIT {$this->start}, {$this->display}";
        }
    }

    public function display($split = 3) {
        $html = '';
        if ($this->num_pages <= 1)
            return $html;
        // $this->link('pagination.css');
        $url = $this->url('add', '', 'np', $this->num_pages);
        $current_page = ($this->start / $this->display) + 1;
        $begin = $current_page - $split;
        $end = $current_page + $split;
        if ($begin < 1) {
            $begin = 1;
            $end = $split * 2;
        }
        if ($end > $this->num_pages) {
            $end = $this->num_pages;
            $begin = $end - ($split * 2);
            $begin++; // add one so that we get double the split at the end
            if ($begin < 1)
                $begin = 1;
        }
        if ($current_page != 1) {
            $html .= '<a class="pag_nav" title="Primera" href="' . $this->url('add', $url, 's', 0) . '"> &laquo; Primera | </a>';
            $html .= '<a class="prev" title="Anterior" href="' . $this->url('add', $url, 's', $this->start - $this->display) . '"> Anterior | </a>';
        } else {
            $html .= '<span class="disabled first" title="Primero"></span>';
            $html .= '<span class="disabled prev" title="Anterior"></span>';
        }
        for ($i = $begin; $i <= $end; $i++) {
            if ($i != $current_page) {
                $html .= '<a title="' . $i . '" href="' . $this->url('add', $url, 's', ($this->display * ($i - 1))) . '">' . $i . ' | </a>';
            } else {
                $html .= '<span class="pag_act">' . $i . ' | </span>';
            }
        }
        if ($current_page != $this->num_pages) {
            $html .= '<a class="next" title="Siguiente" href="' . $this->url('add', $url, 's', $this->start + $this->display) . '"> Siguiente | </a>';
            $last = ($this->num_pages * $this->display) - $this->display;
            $html .= '<a class="last" title="Ultimo" href="' . $this->url('add', $url, 's', $last) . '"> Ultima &raquo; </a>';
        } else {
            $html .= '<span class="disabled next" title="Siguiente"></span>';
            $html .= '<span class="disabled last" title="Ultimo"></span>';
        }
        return '<p class="paginador fright">' . $html . '</p>';
    }

    public function limit() {
        return $this->start_display;
    }

    /*
     * Lo que sigue corresponde a otra clase pero del cual solo es necesario estos metodos
     * se puede ver la clase original en php-ease.com
     */

    public function url($action = '', $url = '', $key = '', $value = NULL) {
        $protocol = ($_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
        if (empty($url))
            $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if ($action == 'ampify')
            return $this->ampify($url);
        $url = str_replace('&amp;', '&', $url);
        if (empty($action) && empty($key)) { // clean the slate
            $url = explode('?', $url);
            return $url[0]; // no amps to convert
        }
        $fragment = parse_url($url, PHP_URL_FRAGMENT);
        if (!empty($fragment)) {
            $fragment = '#' . $fragment; // to add on later
            $url = str_replace($fragment, '', $url);
        }
        if ($key == '#') {
            if ($action == 'delete')
                $fragment = '';
            elseif ($action == 'add')
                $fragment = '#' . urlencode($value);
            return $this->ampify($url . $fragment);
        }
        $url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
        $url = substr($url, 0, -1);
        $value = urlencode($value);
        if ($action == 'delete') {
            return $this->ampify($url . $fragment);
        } elseif ($action == 'add') {
            if (strpos($url, '?') === false) {
                return ($url . '?' . $key . '=' . $value . $fragment); // no amps to convert
            } else {
                return $this->ampify($url . '&' . $key . '=' . $value . $fragment);
            }
        }
    }

    private function ampify($string) { // used in $this->url
        return str_replace(array('&amp;', '&'), array('&', '&amp;'), $string);
    }

}
?>