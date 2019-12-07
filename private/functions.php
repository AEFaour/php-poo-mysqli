<?php
function url_for($script_path)
{
    // add the leading '/' if not present
    /*if($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }*/
    return WWW_ROOT . $script_path;
}

;
//var_dump(WWW_ROOT);

function u($string = "")
{
    return urlencode($string);
}

function raw_u($string = "")
{
    return rawurlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}

function error_404()
{
    header($_SERVER["SERVER_PROTOCOL"] . "404 Not Found");
    exit();
}

function error_500()
{
    header($_SERVER["SERVER_PROTOCOL"] . "500 Internal Server Error");
    exit();
}

function redirect_to($location)
{
    header("Location: " . $location);
    exit();
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function display_errors($errors = array())
{
    $output = '';
    if (!empty($errors)) {
        $output .= "<div class=\"errors card\">";
        $output .= "Please fix the following errors";
        $output .= "<ul class=\"list-group\">";
        foreach ($errors as $error) {
            $output .= "<li class=\"list-group-item list-group-item-action list-group-item-warning\">" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}
