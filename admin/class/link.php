<?php
$objURL = new URLpage();
$lnkID = isset($_GET['lnk']) ?  $_GET['lnk'] : '';
$objURL->getMyUrl($lnkID);
global $title;
class URLpage
{
       var $page;
       public function getMyUrl($lnk = NULL)
       {
              switch ($lnk):
                     case 'student_List':
                            $page = 'studentList.php';
                            $GLOBALS['title'] = 'Update Student List';
                            break;
                     case 'teacher_List':
                            $page = 'TeacherList.php';
                            $GLOBALS['title'] = 'Update Teachers List';
                            break;
                     case 'allumuni_List':
                            $page = 'Allumuni.php';
                            $GLOBALS['title'] = 'Update allumuni List';
                            break;
                     case 'homeCont_List':
                            $page = 'HP_Contents.php';
                            $GLOBALS['title'] = 'Update Homepage Content List';
                            break;

                     case 'home':
                            $page = 'homepage.php';
                            $GLOBALS['title'] = 'NALPO';
                            break;

                     default:
                            $page = 'homepage.php';
                            $GLOBALS['title'] = 'NALPO Admin';
                            break;
              endswitch;
              if (!file_exists($page)) :
                     $page = '';
              endif;
              $this->page = $page;
              function myTitle()
              {
                     global $title;
                     echo $title;
              }
       }
}
