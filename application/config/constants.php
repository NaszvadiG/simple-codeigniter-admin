<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

/*
|--------------------------------------------------------------------------
| Roots/Paths to folder
|--------------------------------------------------------------------------
|
*/

define('ROOT_FOLDER','http://www.darrr.com/');
define('ADMIN_ROOT_FOLDER','http://www.darrr.com/administrator/');
define('MEDIA_FOLDER',ROOT_FOLDER.'media/');
define('ICON',ROOT_FOLDER.'favicon.ico');

define('ROOT_FILE_PATH',$_SERVER['DOCUMENT_ROOT'].'/');
define('UPLOAD_RESOURCES',ROOT_FILE_PATH.'resources/useruploads/');

define('IMAGES_FOLDER',MEDIA_FOLDER.'images/');

define('DOWNLOADS',ROOT_FOLDER.'downloads/');
define('DOWNLOAD_RESOURCES',ROOT_FOLDER.'resources/');

define('UPLOADS',ROOT_FOLDER.'upload/');

define('CSS_PATH',MEDIA_FOLDER.'css/');
define('JS_PATH',MEDIA_FOLDER.'js/');
define('FRONT_JS',MEDIA_FOLDER.'frontjs/');

define('ADMINIMAGES_FOLDER',MEDIA_FOLDER.'images/admin/');
define('ADMINCSS_PATH',MEDIA_FOLDER.'admin/css/');
define('ADMINJS_PATH',MEDIA_FOLDER.'admin/js/');

define('GRAPH_PATH',MEDIA_FOLDER.'admin/graph/');

define('JQUERY',MEDIA_FOLDER.'js/jquery/');
define('JQUERY_CORE',MEDIA_FOLDER.'js/jquery-latest.min.js');
define('JQUERY_VALIDATE',JQUERY.'jquery.validate.js');


define('VIEW_FOLDER',ROOT_FOLDER.'system/application/views/');

/*
|--------------------------------------------------------------------------
| Table names
|--------------------------------------------------------------------------
|
*/

define('SITE_NAME','Darrr.com');

define('USERS','users');
define('USER_GENDER','user_gender');
define('COUNTRIES','countries');
define('STATES','states');
define('DOWNLOADRESOURCES','downloadresources');
define('QP_SUBJECTS','qp_subjects');
define('QUESTIONPAPERS','questionpapers');
define('ADSENSE','adsense');
define('USERCONTRIBUTIONS','usercontributions');

define('ADMIN_TABLE','admin');
define('CMS_TABLE','cms_pages');
define('MAILS_TABLE','user_mails');
define('LOGIN_FAILED_TABLE','login_failed_attempts');
define('NEWSLETTERS_TABLE','newsletters');
define('NEWSLETTERS_CATEGORY_TABLE','newsletter_category');
define('NEWSLETTER_SUBSCRIBERS','newsletter_subscribers');
define('WHOISONLINE_TABLE','who_is_online');
define('CONTACT_US','user_mails');
define('FEEDBACK_TYPES','feedback_types');

/* End of file constants.php */
/* Location: ./application/config/constants.php */