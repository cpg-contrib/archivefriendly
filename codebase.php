<?php
/*************************
  Coppermine Photo Gallery
  ************************
  Copyright (c) 2003-2005 Coppermine Dev Team
  v1.1 originaly written by Gregory DEMAR

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.
  ********************************************
  Coppermine version: 1.4.1
  $Source: /cvsroot/cpg-contrib/archivefriendly/codebase.php,v $
  $Revision: 1.1 $
  $Author: donnoman $
  $Date: 2005/07/15 06:02:10 $
**********************************************/

if (!defined('IN_COPPERMINE')) die('Not in Coppermine...');

// Add an install action

$thisplugin->add_filter('file_data','archivefriendly'); //function theme_html_picture()

function archivefriendly($pic_data)
{
    global $CONFIG,$lang_picinfo;
	$extensions = array('.zip','.rar');
    $file_base_name = str_replace('.'.$pic_data['extension'],'',basename($pic_data['filename']));
    foreach ($extensions as $extension) {
            if (file_exists($CONFIG['fullpath'].$pic_data['filepath'].$file_base_name.$extension)) {
                $pic_data['footer']=$pic_data['caption'].'<br/><span class="catlink"><a href="'.$CONFIG['fullpath'].$pic_data['filepath'].$file_base_name.$extension.'">'.$file_base_name.$extension.'</a></span>';
            }
    }

    return $pic_data;
}

?>
