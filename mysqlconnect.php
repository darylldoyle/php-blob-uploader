<?php $link = mysql_connect('SERVER_HOSTNAME', 'MYSQL_USERNAME', 'MYSQL_PASSWORD');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db(blobs, $link); ?>