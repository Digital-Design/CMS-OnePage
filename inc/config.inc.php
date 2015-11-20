<?php
// log SQL
define('SQL_HOST', 'localhost');
define('SQL_USER', 'root');
define('SQL_PASS', 'korsi29yk');
define('SQL_DATABASE', 'cms_one_page');
// admin dir
define('ADMIN_FOLDER', 'admin');
//temps analytique en minute
define('TEMPS_ANALYTIQUE', 15);
//liste des ip blacklistées
define('IP_BLACKLIST', serialize( array(
  '127.0.0.1',
  'localhost',
  '193.251.19.19',
  '192.168.1.2'
)));
//admin adresse
define('ADMIN_ADRESSE','konstantin.sidorenko@orange.fr');
//salt
define('SALT','4%rwj=ZmdFqh+6NYJL_86x');
define('MAX_LENGTH_SALT', 6);

?>