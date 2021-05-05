<?php
session_start();

if(!isset($_REQUEST['uc'])){
  $_REQUEST['uc'] = 'accueil';
}	 
 
$uc = $_REQUEST['uc'];
switch($uc)
{
      
  case 'accueil':
    {
      include("control/controlAccueil.php");
      break; 
    }
    case 'post':
    {
      include("control/controlPost.php");
      break;
    }
  
    case 'type':
    {
      include("control/controlType.php");
      break;
    }
  
   
} 
?>