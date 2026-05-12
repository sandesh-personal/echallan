<?php
/* Database config — copy this file to connect.php and fill in your credentials */
$db_host     = 'localhost';
$db_user     = 'your_db_username';
$db_pass     = 'your_db_password';
$db_database = 'tos';

/* End config */

$db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_database, $db_user, $db_pass);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


class App {
    public static function message($type, $message, $code = '') {
        if ($type == 'error') {
            return '<div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        ' . $message . ' <a class="alert-link" href="#">' . $code . '</a>.
                    </div>';
        } else {
            return '<div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        ' . $message . ' <a class="alert-link" href="#">' . $code . '</a>.
                    </div>';
        }
    }
}

function get($val) {
    return @$_GET[$val];
}
