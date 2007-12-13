<?php

/*
+---------------------------------------------------------------------------+
| Openads v${RELEASE_MAJOR_MINOR}                                                              |
| ============                                                              |
|                                                                           |
| Copyright (c) 2003-2007 Openads Limited                                   |
| For contact details, see: http://www.openads.org/                         |
|                                                                           |
| Copyright (c) 2000-2003 the phpAdsNew developers                          |
| For contact details, see: http://www.phpadsnew.com/                       |
|                                                                           |
| This program is free software; you can redistribute it and/or modify      |
| it under the terms of the GNU General Public License as published by      |
| the Free Software Foundation; either version 2 of the License, or         |
| (at your option) any later version.                                       |
|                                                                           |
| This program is distributed in the hope that it will be useful,           |
| but WITHOUT ANY WARRANTY; without even the implied warranty of            |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
| GNU General Public License for more details.                              |
|                                                                           |
| You should have received a copy of the GNU General Public License         |
| along with this program; if not, write to the Free Software               |
| Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA |
+---------------------------------------------------------------------------+
$Id: affiliate-edit.php 12839 2007-11-27 16:32:39Z bernard.lange@openads.org $
*/

// Require the initialisation file
require_once '../../init.php';

// Required files
require_once MAX_PATH . '/www/admin/config.php';

// Register input variables
phpAds_registerGlobalUnslashed ('info');


/*-------------------------------------------------------*/
/* HTML framework                                        */
/*-------------------------------------------------------*/

phpAds_PageHeader("4.1.3.4.7");
echo "<img src='images/icon-affiliate.gif' align='absmiddle'>&nbsp;<b>GoogleAdSense Accounts</b><br /><br /><br />";
phpAds_ShowSections(array("4.1.3.4.7"));


/*-------------------------------------------------------*/
/* Main code                                             */
/*-------------------------------------------------------*/

require_once MAX_PATH . '/lib/OA/Admin/Template.php';

$accountsExist = false;

if ($accountsExist) {
   $oTpl = new OA_Admin_Template('adsense-accounts.html');

   $oTpl->assign('info', $info);

   $oTpl->assign('adsenseAccounts', array(
     'aAdsenseAccounts'  => array (
            array  (
               'name' => 'Adsense 1',
               'affiliateCode' => 'Ca-pub-292876283746',
               'status' => 'pending'
            ),

            array  (
               'name' => 'Another Google Adsense Account',
               'affiliateCode' => 'Ca-pri-292876283746',
               'status' => 'approved'
            ),

            array  (
               'name' => 'One more',
               'affiliateCode' => 'bd-pub-292876283746',
               'status' => 'approved'
            ),
         )
     )
   );
}
else
{
   $oTpl = new OA_Admin_Template('adsense-start.html');

   // TODO: fields are the same as in adsense-link.php, it would be a good idea to
   // refactor them to one common place to avoid duplication
   $oTpl->assign('fieldsLink', array(
       array(
           'title'     => 'Existing AdSense Account Identification',
           'fields'    => array(
               array(
                   'name'      => 'email',
                   'label'     => 'Email',
                   'value'     => $email
               ),
               array(
                   'name'      => 'phone5digits',
                   'label'     => 'Last 5 digits of phone number',
                   'value'     => ''
               ),
               array(
                   'name'      => 'postalcode',
                   'label'     => 'Postal Code',
                   'value'     => ''
               )
           )
       )
   ));

   $oTpl->assign('fieldsCreate', array(
       array(
           'title'     => 'Email address for AdSense Account',
           'fields'    => array(
               array(
                   'name'      => 'email',
                   'label'     => 'Email',
                   'value'     => ''
               )
           )
       )
   ));

}

//var_dump($oTpl);
//die();
$oTpl->display();

/*-------------------------------------------------------*/
/* HTML framework                                        */
/*-------------------------------------------------------*/

phpAds_PageFooter();

?>
