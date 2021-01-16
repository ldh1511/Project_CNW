<?php 
include(ROOT_PATH."/database/db.php");
$info=selectOne('infomation',['id'=>'1']);
$skill=selectCol('*','skill_account, skill',"skill_account.skill_id=skill.skill_id and skill_account.id=1");
$edu=selectAll('education',['id'=>'1']);
$exp=selectAll('experience',['id'=>'1']);
$ca=selectAll('certificate',['id'=>'1']);
$acc=selectOne('account',['id'=>'1']);
$project=selectAll('projects',['id'=>'1']);
$socialLinks=selectAll('social_links',['id'=>'1']);