<?php
/**
 * Created by Breskott's Software House.
 * Programmer: Victor Breskott
 * Visit: https://breskott.com.br/
 * Date: 17/10/2021
 * Time: 17:02
 */

function checkPermission($permissions){
    $userAccess = getMyPermission(auth()->user()->is_permission);
    foreach ($permissions as $key => $value) {
        if($value == $userAccess){
            return true;
        }
    }
    return false;
}

function getMyPermission($id)
{
    switch ($id) {
        case 1:
            return 'agente';
            break;
        case 2:
            return 'admin';
            break;
        default:
            return 'municipe';
            break;
    }
}
