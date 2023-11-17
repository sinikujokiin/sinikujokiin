<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['cms/dashboard'] = 'cms/Dashboard';
$route['cms/get-data-dashboard'] = 'cms/Dashboard/getData';


/*CMS*/
/*Tata cara order*/
$route['cms/tata-cara-order'] = 'cms/TataCaraOrder';
$route['cms/get-data-tata-cara-order'] = 'cms/TataCaraOrder/getData';
$route['cms/get-data-tata-cara-order/(:any)'] = 'cms/TataCaraOrder/getDataById/$1';
$route['cms/save-tata-cara-order/(:any)'] = 'cms/TataCaraOrder/$1';
$route['cms/delete-tata-cara-order/(:any)'] = 'cms/TataCaraOrder/delete/$1';
$route['cms/update-status-tata-cara-order/(:any)'] = 'cms/TataCaraOrder/updateStatus/$1';
/*End*/

/*Tata Tugas*/
$route['cms/list-tugas'] = 'cms/Tugas';
$route['cms/list-tugas/add'] = "cms/Tugas/add";
$route['cms/list-tugas/(:any)/(:any)'] = "cms/Tugas/$1/$2";

$route['cms/get-data-tugas'] = 'cms/Tugas/getData';
$route['cms/get-data-tugas/(:any)'] = 'cms/Tugas/getDataById/$1';
$route['cms/save-tugas/(:any)'] = 'cms/Tugas/$1';
$route['cms/delete-tugas/(:any)'] = 'cms/Tugas/delete/$1';
$route['cms/update-status-tugas/(:any)'] = 'cms/Tugas/updateStatus/$1';


$route['cms/upload-image-tugas'] = "cms/Tugas/uploadImage";
$route['cms/delete-image-tugas'] = "cms/Tugas/deleteImage";
$route['cms/delete-tugas/(:any)'] = "cms/Tugas/delete/$1";

/*End*/

/*Tata Tugas*/
$route['cms/list-fitur'] = 'cms/Fitur';
$route['cms/list-fitur/add'] = "cms/Fitur/add";
$route['cms/list-fitur/(:any)/(:any)'] = "cms/Fitur/$1/$2";

$route['cms/get-data-fitur'] = 'cms/Fitur/getData';
$route['cms/get-data-fitur/(:any)'] = 'cms/Fitur/getDataById/$1';
$route['cms/save-fitur/(:any)'] = 'cms/Fitur/$1';
$route['cms/delete-fitur/(:any)'] = 'cms/Fitur/delete/$1';
$route['cms/update-status-fitur/(:any)'] = 'cms/Fitur/updateStatus/$1';


$route['cms/upload-image-fitur'] = "cms/Fitur/uploadImage";
$route['cms/delete-image-fitur'] = "cms/Fitur/deleteImage";
$route['cms/delete-fitur/(:any)'] = "cms/Fitur/delete/$1";

/*End*/

/*FAQ*/
$route['cms/list-faq'] = 'cms/Faq';
$route['cms/get-data-faq'] = 'cms/Faq/getData';
$route['cms/get-data-faq/(:any)'] = 'cms/Faq/getDataById/$1';
$route['cms/save-faq/(:any)'] = 'cms/Faq/$1';
$route['cms/delete-faq/(:any)'] = 'cms/Faq/delete/$1';
$route['cms/update-status-faq/(:any)'] = 'cms/Faq/updateStatus/$1';
/*End*/

/*Pembayaran*/
$route['cms/list-pembayaran'] = 'cms/Pembayaran';
$route['cms/get-data-pembayaran'] = 'cms/Pembayaran/getData';
$route['cms/get-data-pembayaran/(:any)'] = 'cms/Pembayaran/getDataById/$1';
$route['cms/save-pembayaran/(:any)'] = 'cms/Pembayaran/$1';
$route['cms/delete-pembayaran/(:any)'] = 'cms/Pembayaran/delete/$1';
$route['cms/update-status-pembayaran/(:any)'] = 'cms/Pembayaran/updateStatus/$1';
/*End*/

/*Section*/
$route['cms/list-section'] = 'cms/Section';
$route['cms/get-data-section'] = 'cms/Section/getData';
$route['cms/get-data-section/(:any)'] = 'cms/Section/getDataById/$1';
$route['cms/save-section/(:any)'] = 'cms/Section/$1';
$route['cms/delete-section/(:any)'] = 'cms/Section/delete/$1';
$route['cms/update-status-section/(:any)'] = 'cms/Section/updateStatus/$1';
/*End*/

/*Testimoni*/
$route['cms/testimoni-client'] = 'cms/Testimoni';
$route['cms/get-data-testimoni'] = 'cms/Testimoni/getData';
$route['cms/get-data-testimoni/(:any)'] = 'cms/Testimoni/getDataById/$1';
$route['cms/save-testimoni/(:any)'] = 'cms/Testimoni/$1';
$route['cms/delete-testimoni/(:any)'] = 'cms/Testimoni/delete/$1';
$route['cms/update-status-testimoni/(:any)'] = 'cms/Testimoni/updateStatus/$1';
/*End*/

/*Testimoni Chat*/
$route['cms/testimoni-chat'] = 'cms/TestimoniChat';
$route['cms/get-data-testimoni-chat'] = 'cms/TestimoniChat/getData';
$route['cms/get-data-testimoni-chat/(:any)'] = 'cms/TestimoniChat/getDataById/$1';
$route['cms/save-testimoni-chat/(:any)'] = 'cms/TestimoniChat/$1';
$route['cms/delete-testimoni-chat/(:any)'] = 'cms/TestimoniChat/delete/$1';
$route['cms/update-status-testimoni-chat/(:any)'] = 'cms/TestimoniChat/updateStatus/$1';
/*End*/

/*Jenis Joki*/
$route['cms/list-jenis-joki'] = 'cms/JenisJoki';
$route['cms/get-data-jenis-joki'] = 'cms/JenisJoki/getData';
$route['cms/get-data-jenis-joki/(:any)'] = 'cms/JenisJoki/getDataById/$1';
$route['cms/save-jenis-joki/(:any)'] = 'cms/JenisJoki/$1';
$route['cms/delete-jenis-joki/(:any)'] = 'cms/JenisJoki/delete/$1';
$route['cms/update-status-jenis-joki/(:any)'] = 'cms/JenisJoki/updateStatus/$1';
/*End*/

/*Team*/
$route['cms/list-team'] = 'cms/Team';
$route['cms/get-data-team'] = 'cms/Team/getData';
$route['cms/get-data-team/(:any)'] = 'cms/Team/getDataById/$1';
$route['cms/save-team/(:any)'] = 'cms/Team/$1';
$route['cms/delete-team/(:any)'] = 'cms/Team/delete/$1';
$route['cms/update-status-team/(:any)'] = 'cms/Team/updateStatus/$1';
/*End*/

/*Team*/
$route['cms/list-portfolio'] = 'cms/Portfolio';
$route['cms/get-data-portfolio'] = 'cms/Portfolio/getData';
$route['cms/get-data-portfolio/(:any)'] = 'cms/Portfolio/getDataById/$1';
$route['cms/save-portfolio/(:any)'] = 'cms/Portfolio/$1';
$route['cms/delete-portfolio/(:any)'] = 'cms/Portfolio/delete/$1';
$route['cms/update-status-portfolio/(:any)'] = 'cms/Portfolio/updateStatus/$1';
/*End*/


// Kategori
$route['cms/data-category-article'] = "cms/Categories";
$route['cms/get-data-categories'] = 'cms/Categories/getData';
$route['cms/get-data-category/(:any)'] = 'cms/Categories/getDataById/$1';
$route['cms/save-category/(:any)'] = 'cms/Categories/$1';
$route['cms/delete-category/(:any)'] = 'cms/Categories/delete/$1';

// Artikel
$route['cms/list-artikel'] = "cms/Artikel";
$route['cms/get-data-artikel'] = 'cms/Artikel/getData';
$route['cms/list-artikel/add'] = "cms/Artikel/add";
$route['cms/save-artikel/(:any)'] = 'cms/Artikel/$1Artikel';
$route['cms/list-artikel/(:any)/(:any)'] = "cms/Artikel/$1/$2";

$route['cms/update-status-artikel/(:any)'] = 'cms/Artikel/updateStatus/$1';
$route['cms/upload-image-artikel'] = "cms/Artikel/uploadImage";
// $route['cms/data-artikel/detail/(:any)'] = "cms/Artikel/edit/$1";
$route['cms/delete-artikel/(:any)'] = "cms/Artikel/delete/$1";



// Data Web
$route['cms/data-web-pbn'] = 'cms/Web';
$route['cms/get-data-website'] = 'cms/Web/getData';
$route['cms/get-data-website/(:any)'] = 'cms/Web/getDataById/$1';
$route['cms/save-website/(:any)'] = 'cms/Web/$1';
$route['cms/delete-website/(:any)'] = 'cms/Web/delete/$1';


$route['cms/data-web-pbn/(:any)'] = 'cms/Web/Setting/$1';
$route['cms/update-profile-website-pbn'] = 'cms/Web/updateSetting';



$route['cms/download-format-excel-website'] = 'cms/Web/downloadFormat';
$route['cms/save-export-website'] = 'cms/Web/saveExport';
$route['cms/get-data-import-website'] = 'cms/Web/getFromImport';

$route['cms/data-log'] = 'cms/Log';
$route['cms/get-data-logs'] = 'cms/Log/getData';

// Menu
$route['cms/data-menu'] = 'cms/Menu';
$route['cms/get-data-menu'] = 'cms/Menu/getData';
$route['cms/get-data-menu/(:any)'] = 'cms/Menu/getDataById/$1';
$route['cms/get-parent-menu'] = 'cms/Menu/loadParent';
$route['cms/save-menu/(:any)'] = 'cms/Menu/$1';
$route['cms/delete-menu/(:any)'] = 'cms/Menu/delete/$1';



$route['cms/sorting-menu'] = 'cms/Sorting';
$route['cms/get-sorting-menu/(:any)'] = 'cms/sorting/getSortingMenu/$1';
$route['cms/save-sorting-menu/(:any)'] = 'cms/sorting/changePosition/$1';


// Profile
$route['cms/data-profile'] = 'cms/Profile';
$route['cms/update-profile'] = 'cms/Profile/saveProfile';
$route['cms/update-password'] = 'cms/Profile/savePassword';
$route['cms/save-profile-picture'] = 'cms/Profile/saveProfilePicture';
// Setting
$route['cms/web-setting'] = 'cms/Setting';
$route['cms/update-profile-website'] = 'cms/Setting/update';


$route['cms/data-user/(:any)'] = 'cms/User/index/$1';
$route['cms/data-user'] = 'cms/User';
$route['cms/get-data-user'] = 'cms/User/getData';
$route['cms/get-data-user/(:any)'] = 'cms/User/getDataById/$1';
$route['cms/save-user/(:any)'] = 'cms/User/$1user';
$route['cms/delete-user/(:any)'] = 'cms/User/delete/$1';

// Role
$route['cms/data-role'] = 'cms/Role';
$route['cms/get-data-role'] = 'cms/Role/getData';
$route['cms/get-data-role/(:any)'] = 'cms/Role/getDataById/$1';
$route['cms/save-role/(:any)'] = 'cms/Role/$1';
$route['cms/delete-role/(:any)'] = 'cms/Role/delete/$1';
$route['cms/get-access-role/(:any)'] = 'cms/Role/akses/$1';
$route['cms/save-access-role'] = 'cms/Role/saveAkses';

$route['login'] = 'Auth';
$route['logout'] = 'Auth/logout';
$route['doLogin'] = 'Auth/doLogin';

$route['error-403'] = 'Errors/error403';
// $route['error-404'] = 'Errors/error404';

$route['trash-article'] = "cms/Trash";
$route['get-data-trash-article'] = "cms/Trash/getDataArticle";
$route['delete-trash/(:any)'] = 'cms/Trash/delete_$1';
$route['restore-trash'] = 'cms/Trash/restore';


$route['report-article'] = 'cms/Report';
$route['get-report-article'] = 'cms/Report/getArticle';


$route['cara-order'] = 'home/caraOrder';
$route['testimoni'] = 'home/testimoni';
$route['list-tugas'] = 'home/tugas';
$route['tugas/(:any)'] = 'home/tugas/$1';
$route['artikel'] = 'home/artikel';
$route['artikel/(:any)'] = 'home/artikel/$1';

$route['default_controller'] = 'home';
$route['404_override'] = 'Errors/error404';
$route['translate_uri_dashes'] = FALSE;

//$route['(.*)'] = "error404";