<?php
/*
 * SAMS (Squid Account Management System)
 * Author: Dmitry Chemerik chemerik@mail.ru
 * (see the file 'main.php' for license details)
 */

 function lffolder_4_z2_url()
 {
  global $SAMSConf;
  $DB=new SAMSDB("$SAMSConf->DBNAME", "0", $SAMSConf->MYSQLHOSTNAME, $SAMSConf->MYSQLUSER, $SAMSConf->MYSQLPASSWORD, $SAMSConf->SAMSDB);
  $lang="./lang/lang.$SAMSConf->LANG";
  require($lang);

  if($SAMSConf->access==2)
    {
      print("   context = insFld(sams, gFld(\"$lframe_sams_FolderContextDenied_1\", \"main.php?show=exe&filename=redirlisttray.php&function=addurllistform&type=regex\", \"stop.gif\"))\n");
      $num_rows=$DB->samsdb_query_value("SELECT * FROM redirect WHERE s_type='regex' ");
      while($row=$DB->samsdb_fetch_array())
         {
           print("      insDoc(context, gLnk(\"D\", \"$row[s_name]\", \"tray.php?show=exe&function=contextlisttray&id=$row[s_redirect_id]\",\"pfile.gif\"))\n");
         }
    }	 

 }
 
 

 ?>