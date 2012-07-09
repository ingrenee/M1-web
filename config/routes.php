<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*

| -------------------------------------------------------------------------

| URI ROUTING

| -------------------------------------------------------------------------

| This file lets you re-map URI requests to specific controller functions.

|

| Typically there is a one-to-one relationship between a URL string

| and its corresponding controller class/method. The segments in a

| URL normally follow this pattern:

|

|	example.com/class/method/id/

|

| In some instances, however, you may want to remap this relationship

| so that a different class/function is called than the one

| corresponding to the URL.

|

| Please see the user guide for complete details:

|

|	http://codeigniter.com/user_guide/general/routing.html

|

| -------------------------------------------------------------------------

| RESERVED ROUTES

| -------------------------------------------------------------------------

|

| There area two reserved routes:

|

|	$route['default_controller'] = 'welcome';

|

| This route indicates which controller class should be loaded if the

| URI contains no data. In the above example, the "welcome" class

| would be loaded.

|

|	$route['404_override'] = 'errors/page_missing';

|

| This route will tell the Router what URI segments to use if those provided

| in the URL cannot be matched to a valid route.

|

*/



$route['default_controller'] = "home";

$route['404_override'] = 'error/page_404';

$route['empleo/:num/:any'] = "empleo/index";

$route['empleo/:num'] = "empleo/index";

$route['sitemap.xml'] = "sitemap/index";
/*lista de ofertas*/
$route['(:num)'] = "home/web/$1";

$route['sitemap(:num).xml'] = "sitemap/index/$1";

$route['(:num)/empresa'] = "empleador/perfil/$1";
$route['(:num)/(:num)'] = "home/web/$1/$2";



$route['trabajo-(:any)-(:num).html'] = "empleo/index/$2";
$route['(:num)/trabajo-(:any)-(:num).html'] = "empleo/index/$3/$1";




$route['empresa-(:any)-(:num).html'] = 'empleador/info/$2/$1';



$route['buscar/:any/:num'] = "buscar/index";

$route['buscar/:any'] = "buscar/index";

$route['cv/:num'] = "cv/index";
$route['cv/(:any)'] = "cv/web/$1";

$route['buscar/busco'] = "buscar/busco";

/* End of file routes.php */

/* Location: ./application/config/routes.php */