<?php
/*  
 * SAMS (Squid Account Management System)
 * Author: Dmitry Chemerik chemerik@mail.ru
 * (see the file 'main.php' for license details)
 */

function DeleteShablon()
{
  global $SAMSConf;
  $DB=new SAMSDB($SAMSConf->DBNAME, $SAMSConf->ODBC, $SAMSConf->MYSQLHOSTNAME, $SAMSConf->MYSQLUSER, $SAMSConf->MYSQLPASSWORD, $SAMSConf->SAMSDB);
  
  $lang="./lang/lang.$SAMSConf->LANG";
  require($lang);

  if(isset($_GET["id"])) $id=$_GET["id"];

   if($SAMSConf->access!=2)     {       exit;     }
  
  if($sname!="default")
    {
        //$DB->samsdb_query_value("SELECT * FROM shablon WHERE name=\"$id\" ");
        //$row=$DB->samsdb_fetch_array();
        $DB->samsdb_query("DELETE FROM shablon WHERE s_shablon_id='$id' ");
        //$result=mysql_query("DELETE FROM sconfig WHERE sname=\"$id\" ");
        //UpdateLog("$SAMSConf->adminname","$shablonbuttom_9_delete_DeleteShablon_1 $row[nick]","01");
    }
  //$result=mysql_query("UPDATE squidusers SET shablon=\"default\" WHERE shablon=\"$id\" ");
  print("OK<BR>");

  print("<SCRIPT>\n");
  print("        parent.lframe.location.href=\"lframe.php\";\n");
  print("        parent.basefrm.location.href=\"main.php?show=exe&function=newshablonform&filename=shablonnew.php\";\n");
  print("</SCRIPT> \n");
}


function shablonbuttom_9_delete()
{
  global $SAMSConf;
  global $SHABLONConf;
//  $DB=new SAMSDB($SAMSConf->DBNAME, $SAMSConf->ODBC, $SAMSConf->MYSQLHOSTNAME, $SAMSConf->MYSQLUSER, $SAMSConf->MYSQLPASSWORD, $SAMSConf->SAMSDB);
  
  $lang="./lang/lang.$SAMSConf->LANG";
  require($lang);

//  if(isset($_GET["id"])) $id=$_GET["id"];
//  $DB->samsdb_query_value("SELECT * FROM shablon WHERE s_shablon_id='$id' ");
//  $row=$DB->samsdb_fetch_array();

  if($SAMSConf->access==2)
    {
       print("<SCRIPT language=JAVASCRIPT>\n");
       print("function ReloadBaseFrame()\n");
       print("{\n");
       print("   window.location.reload();\n");
       print("}\n");
       print("function DeleteUser()\n");
       print("{\n");
       print("  value=window.confirm(\"$shablonbuttom_9_delete_shablonbuttom_9_delete_1 $SHABLONConf->s_name? \" );\n");
       print("  if(value==true) \n");
       print("     {\n");
       print("        parent.basefrm.location.href=\"main.php?show=exe&function=deleteshablon&filename=shablonbuttom_9_delete.php&id=$SHABLONConf->s_shablon_id\";\n");
       print("     }\n");
       print("}\n");
       print("</SCRIPT> \n");

       print("<TD VALIGN=\"TOP\" WIDTH=\"10%\">\n");
       print("<IMAGE id=Trash name=\"Trash\" src=\"$SAMSConf->ICONSET/trash_32.jpg\" \n ");
       print("TITLE=\"$shablonbuttom_9_delete_shablonbuttom_9_delete_1 '$SHABLONConf->s_name'\"  border=0 ");
       print("onclick=DeleteUser() \n");
       print("onmouseover=\"this.src='$SAMSConf->ICONSET/trash_48.jpg'\" \n");
       print("onmouseout= \"this.src='$SAMSConf->ICONSET/trash_32.jpg'\" >\n");
    }

}




?>
