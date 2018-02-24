<?php

require_once 'database.class.php';

class Utils {

    private $db;

    public function __construct() {
        $this->db = DataBase::getInstance();
    }

    /*
     * Retorna una cadena HTML con todos los options listos para ser usados en un SELECT HTML
     */

    public function getCitiesOptions($selected = null) {
        $this->db->setQuery("SELECT id, user FROM asterisk.devices ORDER BY user DESC");
        $cities = $this->db->loadObjectList();
        $optionsList = '';

        if ($selected):
            foreach ($cities as $city):
                if ($selected == $city->id):
                    $optionsList .= '<option value="' . $city->id . '" selected="selected">' . $city->user . '</option>\n';
                else:
                    $optionsList .= '<option value="' . $city->id . '" >' . $city->user . '</option>\n';
                endif;
            endforeach;
        else:
            foreach ($cities as $city):
                $optionsList .= '<option value="' . $city->id . '" >' . $city->user . '</option>\n';
            endforeach;
        endif;

        return $optionsList;
    }

    public function getSingleBdConection() {
        $conf = $conf = new DATABASE_CONFIG();
    }

}

?>
