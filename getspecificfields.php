<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Initially developped for :
 * Université de Cergy-Pontoise
 * 33, boulevard du Port
 * 95011 Cergy-Pontoise cedex
 * FRANCE
 *
 * The inventory module is used to list the devices available in a room
 *
 * @package    mod_inventory
 * @author     Laurent Guillet
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 *
 * File : getspecificfields.php
 * Internal page used to add the fields specific to the type of device in editDevice.php
 *
 */

require_once('../../config.php');

if (isset($_REQUEST["typeid"])) {

    $tablefields = $DB->get_records('inventory_devicefield', array('categoryid' => $_REQUEST["typeid"]));
    foreach ($tablefields as $field) {

        if($field->type == "shorttext") {

            echo "
            <tr>
                <td>
                    <label>$field->name</label>
                </td>
                <td>
                    <input type=text name=$field->id></input>
                </td>
            </tr>";
        } else if($field->type == "longtext") {

            echo "
            <tr>
                <td>
                    <label>$field->name</label>
                </td>
                <td>
                    <editor name=$field->id></editor>
                </td>
            </tr>";
        }
    }

} else {

}