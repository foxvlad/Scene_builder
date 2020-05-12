<?php
/**
* РљРѕРЅСЃС‚СЂСѓРєС‚РѕСЂ СЃС†РµРЅРЅ 
* @package project
* @author Wizard <sergejey@gmail.com>
* @copyright http://majordomo.smartliving.ru/ (c)
* @version 0.1 (wizard, 22:05:49 [May 12, 2020])
*/
//
//
class scene_builder extends module {
/**
* scene_builder
*
* Module class constructor
*
* @access private
*/
function __construct() {
  $this->name="scene_builder";
  $this->title="Конструктор сценн";
  $this->module_category="<#LANG_SECTION_OBJECTS#>";
  $this->checkInstalled();
}
/**
* saveParams
*
* Saving module parameters
*
* @access public
*/
function saveParams($data=1) {
 $p=array();
 if (IsSet($this->id)) {
  $p["id"]=$this->id;
 }
 if (IsSet($this->view_mode)) {
  $p["view_mode"]=$this->view_mode;
 }
 if (IsSet($this->edit_mode)) {
  $p["edit_mode"]=$this->edit_mode;
 }
 if (IsSet($this->tab)) {
  $p["tab"]=$this->tab;
 }
 return parent::saveParams($p);
}
/**
* getParams
*
* Getting module parameters from query string
*
* @access public
*/
function getParams() {
  global $id;
  global $mode;
  global $view_mode;
  global $edit_mode;
  global $tab;
  if (isset($id)) {
   $this->id=$id;
  }
  if (isset($mode)) {
   $this->mode=$mode;
  }
  if (isset($view_mode)) {
   $this->view_mode=$view_mode;
  }
  if (isset($edit_mode)) {
   $this->edit_mode=$edit_mode;
  }
  if (isset($tab)) {
   $this->tab=$tab;
  }
}
/**
* Run
*
* Description
*
* @access public
*/
function run() {
 global $session;
  $out=array();
  if ($this->action=='admin') {
   $this->admin($out);
  } else {
   $this->usual($out);
  }
  if (IsSet($this->owner->action)) {
   $out['PARENT_ACTION']=$this->owner->action;
  }
  if (IsSet($this->owner->name)) {
   $out['PARENT_NAME']=$this->owner->name;
  }
  $out['VIEW_MODE']=$this->view_mode;
  $out['EDIT_MODE']=$this->edit_mode;
  $out['MODE']=$this->mode;
  $out['ACTION']=$this->action;
  $this->data=$out;
  $p=new parser(DIR_TEMPLATES.$this->name."/".$this->name.".html", $this->data, $this);
  $this->result=$p->result;
}
/**
* BackEnd
*
* Module backend
*
* @access public
*/
function admin(&$out) {
}
/**
* FrontEnd
*
* Module frontend
*
* @access public
*/
function usual(&$out) {
 $this->admin($out);
}
/**
* Install
*
* Module installation routine
*
* @access private
*/
 function install($data='') {
  parent::install();
 }
 
 /**
* Uninstall
*
* Module uninstall routine
*
* @access public
*/
 function uninstall() {
  SQLExec('DROP TABLE IF EXISTS scene_builder');
  SQLExec('DROP TABLE IF EXISTS scenes_element_builder');
  parent::uninstall();
 }
/**
* dbInstall
*
* Database installation routine
*
* @access private
*/
 function dbInstall($data) {
/*

*/
  $data = <<<EOD
 scene_builder: ID int(10) unsigned NOT NULL auto_increment
 scene_builder: SCENES_ID int(10) NOT NULL DEFAULT '0'
 scene_builder: TEMPLATE varchar(255) NOT NULL DEFAULT ''
 scene_builder: TEMPLATE_CSS varchar(255) NOT NULL DEFAULT ''
 scene_builder: ADDITION varchar(255) NOT NULL DEFAULT ''
 scene_builder: HOME_IMG varchar(255) NOT NULL DEFAULT ''
 scene_builder: TYPE_SCENE varchar(255) NOT NULL DEFAULT ''
 scene_builder: HOME_SCENE varchar(255) NOT NULL DEFAULT ''
 scene_builder: CLONE_MENU varchar(255) NOT NULL DEFAULT ''
 scene_builder: PRIORITY int(10) NOT NULL DEFAULT '0'
 scenes_element_builder: ID int(10) unsigned NOT NULL auto_increment
 scenes_element_builder: TITLE varchar(100) NOT NULL DEFAULT ''
 scenes_element_builder: POSITION varchar(100) NOT NULL DEFAULT ''
 scenes_element_builder: VALUE varchar(255) NOT NULL DEFAULT ''
 scenes_element_builder: HTML longtext NOT NULL DEFAULT ''
 scenes_element_builder: TEXTAREA longtext NOT NULL DEFAULT ''
 scenes_element_builder: TYPE varchar(255) NOT NULL DEFAULT ''
 scenes_element_builder: SCENE_LINK varchar(100) NOT NULL DEFAULT ''
 scenes_element_builder: ICO varchar(255) NOT NULL DEFAULT ''
 scenes_element_builder: SHOW1 varchar(255) NOT NULL DEFAULT ''
 scenes_element_builder: SHOW2 varchar(255) NOT NULL DEFAULT ''
 scenes_element_builder: PARENT_ID int(10) NOT NULL DEFAULT '0'
 scenes_element_builder: LINKED_OBJECT varchar(100) NOT NULL DEFAULT ''
 scenes_element_builder: LINKED_PROPERTY varchar(100) NOT NULL DEFAULT ''
 scenes_element_builder: LINKED_METHOD varchar(100) NOT NULL DEFAULT ''
 scenes_element_builder: PRIORITY int(10) NOT NULL DEFAULT '0'
 
 
EOD;
  parent::dbInstall($data);
 }
 
 
 
 
 
 
// --------------------------------------------------------------------
}
/*
*
* TW9kdWxlIGNyZWF0ZWQgTWF5IDEyLCAyMDIwIHVzaW5nIFNlcmdlIEouIHdpemFyZCAoQWN0aXZlVW5pdCBJbmMgd3d3LmFjdGl2ZXVuaXQuY29tKQ==
*
*/
