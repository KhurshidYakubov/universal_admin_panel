<?php

namespace App\Helpers;


class CreateInputs
{
    public static function getColSix($attribute, $label): string
    {
        $html = '<div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>' . $label . '</strong>
                <input type="text" name="' . $attribute . '" class="form-control" value="' . old($attribute) . '">
            </div>
        </div>';
        return $html;
    }

    public static function getColFour($attribute, $label): string
    {
        $html = '<div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>' . $label . '</strong>
                <input type="text" name="' . $attribute . '" class="form-control" value="' . old($attribute) . '">
            </div>
        </div>';
        return $html;
    }
}

?>
