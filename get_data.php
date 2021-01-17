<?php
include(ROOT_PATH."/database/db.php"); 
$service=selectAll('service');
$general_info=selectOne('general_info',['general_id'=>'1']);
$acc_info=selectAll('infomation');
$acc=selectCol('*','account, infomation','account.id=infomation.id');
$skill=selectAll('skill');
