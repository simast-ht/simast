<?php /* TASKS $Id: tasksperuser.php 4800 2007-03-06 00:34:46Z merlinyoda $ */
if (!defined('DP_BASE_DIR')){
	die('You should not access this file directly.');
}

$AppUI->savePlace();

if (isset( $_POST['company_id'] )) {
	$AppUI->setState( 'CompanyIdxFilter', $_POST['company_id'] );
}
$company_id = $AppUI->getState( 'CompanyIdxFilter' ) ? $AppUI->getState( 'CompanyIdxFilter' ) : 'all';

$log_all_projects = true; // show tasks for all projects
$df = $AppUI->getPref('SHDATEFORMAT'); // get the prefered date format

// get CCompany() to filter tasks by company
require_once( $AppUI->getModuleClass( 'companies' ) );
$comp = new CCompany();
$companies = $comp->getAllowedRecords( $AppUI->user_id, 'company_id,company_name', 'company_name' );
$compFilter = arrayMerge(  array( 'all' => $AppUI->_('All Agencies') ), $companies );

// setup the title block
$titleBlock = new CTitleBlock( 'Activities per User', '', $m, "$m.$a" );
//$titleBlock = new CTitleBlock( 'Activities per User', 'applet-48.png', $m, "$m.$a" );
$titleBlock->addCell( $AppUI->_('Agency') . ':' );
$titleBlock->addCell(
	arraySelect( $compFilter, 'company_id', 'size="1" class="text" onChange="document.companyFilter.submit();"', $company_id, false ), '',
	'<form action="?m=tasks&a=tasksperuser" method="post" name="companyFilter">', '</form>'
);
$titleBlock->addCrumb( "?m=tasks", "activities list" );
$titleBlock->addCrumb( "?m=tasks&a=todo&user_id=$user_id", "my todo" );
$titleBlock->show();

// include the re-usable sub view
	$min_view = false;
	include(DP_BASE_DIR.'/modules/tasks/tasksperuser_sub.php');
?>