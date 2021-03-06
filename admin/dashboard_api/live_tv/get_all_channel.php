<?php
 require '../../../db/config.php';
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'live_tv_channels';
 
// Table's primary key
$primaryKey = 'id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id', 'dt' => 2 ),
    array( 'db' => 'name', 'dt' => 4 ),
    array( 'db' => 'banner',  'dt' => 3 ),
    array( 'db' => 'stream_type',   'dt' => 5 ),
    array( 'db' => 'url',     'dt' => 6 ),
    array( 'db' => 'status',     'dt' => 7 ),
    array( 'db' => 'featured',     'dt' => 8 )
);
 
// SQL server connection information
$sql_details = array(
    'user' => "$username",
    'pass' => "$password",
    'db'   => "$dbname",
    'host' => "$servername"
);
 
$order = "ORDER BY id DESC";

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $order )
);