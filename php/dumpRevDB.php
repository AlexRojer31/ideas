//dump DB
<?php

exec('mysqldump -uUser_name -pUser_password database_name > fileToSave.sql');

?>
// rev DB
<?php

exec('mysql -uUser_name -pUser_password database_namer < fileToSave.sql');

?>
