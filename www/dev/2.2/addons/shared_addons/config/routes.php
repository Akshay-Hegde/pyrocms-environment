<?php defined('BASEPATH') OR exit('No direct script access allowed');


/* default controller
-------------------------------------------------- */
$route['default_controller'] = 'pages';

/* module::robots
-------------------------------------------------- */
$route['robots.txt']         = 'robots';

/* english
-------------------------------------------------- */
$route['register']           = 'users/register';

$route['login']              = 'users/login';
$route['logout']             = 'users/logout';

$route['my-profile']         = 'users/index';
$route['edit-profile']       = 'users/edit';

/* spanish
-------------------------------------------------- */
$route['registro']           = 'users/register';

$route['entrar']             = 'users/login';
$route['salir']              = 'users/logout';

$route['mi-perfil']          = 'users/index';
$route['editar-perfil']      = 'users/edit';

/* End of file routes.php */
