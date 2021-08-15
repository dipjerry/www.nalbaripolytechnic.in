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
                     case 'electrical':
                            $page = 'electrical.html';
                            $GLOBALS['title'] = 'Electrical Department';
                            break;
                     case 'computer':
                            $page = 'computer.html';
                            $GLOBALS['title'] = 'Computer Department';
                            break;
                     case 'printing':
                            $page = 'printing.html';
                            $GLOBALS['title'] = 'Printing Department';
                            break;
                     case 'science':
                            $page = 'science.html';
                            $GLOBALS['title'] = 'Science';
                            break;
                     case 'humanities':
                            $page = 'humanities.html';
                            $GLOBALS['title'] = 'Humanities';
                            break;
                     case 'workshop':
                            $page = 'workshop.html';
                            $GLOBALS['title'] = 'Workshop';
                            break;
                     case 'faculties':
                            $page = 'faculties.html';
                            $GLOBALS['title'] = 'Faculties';
                            break;
                     case 'home':
                            $page = 'homePage.php';
                            $GLOBALS['title'] = 'NALPO';
                            break;
                     case 'gallery':
                            $page = 'gallery.html';
                            $GLOBALS['title'] = 'College gallery';
                            break;
                     case 'admission':
                            $page = 'admission.html';
                            $GLOBALS['title'] = 'Admission';
                            break;
                     case 'timeTable':
                            $page = 'timeTable.html';
                            $GLOBALS['title'] = 'Time Table';
                            break;
                     case 'rules':
                            $page = 'rules.html';
                            $GLOBALS['title'] = 'Rules and regulation';
                            break;
                     case 'library':
                            $page = 'library.html';
                            $GLOBALS['title'] = 'Library';
                            break;
                     case 'about':
                            $page = 'about.html';
                            $GLOBALS['title'] = 'About NALPO';
                            break;
                     case '2NDSEMESTER':
                            $page = 'sem2.html';
                            $GLOBALS['title'] = '2ndSEMESTER';
                            break;
                     case '4THSEMESTER':
                            $page = 'sem4.html';
                            $GLOBALS['title'] = '4thSEMESTER';
                            break;
                     case '6THSEMESTER':
                            $page = 'sem6.html';
                            $GLOBALS['title'] = '6thSEMESTER';
                            break;
                     case 'contact':
                            $page = 'contact.html';
                            $GLOBALS['title'] = 'Contact us';
                            break;
                     case 'event':
                            $page = 'events.html';
                            $GLOBALS['title'] = 'NALPO events';
                            break;
                     case 'staff':
                            $page = 'ntstaff.html';
                            $GLOBALS['title'] = 'Staff';
                            break;
                     case 'magazine':
                            $page = 'magazine.html';
                            $GLOBALS['title'] = 'Magazine';
                            break;
                     case 'TPO':
                            $page = 'tpo.html';
                            $GLOBALS['title'] = 'Training and Placement';
                            break;
                     case 'diploma':
                            $page = 'diploma.html';
                            $GLOBALS['title'] = 'Why Diploma?';
                            break;
                     case 'StudentsL':
                            $page = 'students.php';
                            $GLOBALS['title'] = 'Student list';
                            break;
                     case 'Batch2017':
                            $page = 'students/students.php';
                            $GLOBALS['title'] = 'Student list 2017';
                            break;
                     case 'Allumuni':
                            $page = 'forms.php';
                            $GLOBALS['title'] = 'Allumuni register';
                            break;
                     default:
                            $page = 'homePage.php';
                            $GLOBALS['title'] = 'NALPO';
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
