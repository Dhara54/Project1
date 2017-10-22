<?php

//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);


//To load display.php to display contents
//class Manage {
  //  public static function autoload($class) {
    //    include 'index.php';
   // }
//}

//spl_autoload_register(array('Manage', 'autoload'));

//instantiate the program object




$obj = new main();


class main {

    public function __construct()
    {
        //set default page request to homepage
        $pageRequest = 'homepage';
        //check if there are parameters
        if(isset($_REQUEST['page'])) {
            //load the type of page the request wants into page request
            $pageRequest = $_REQUEST['page'];
        }
        //instantiate the class that is being requested
         $page = new $pageRequest;


        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $page->get();
        } else {
            $page->post();
        }

    }

}

abstract class page {
    protected $html='';
    public function __construct()
    {
        //Starting html form
        $this->html .= '<html>';
        $this->html .= '<body>';

    }
    public function __destruct()
    {
        $this->html = '</body></html>';
    }

    public function get() {
         $html='Into Abstract class Page';
        echo $html;
    }

    public function post() {
        print_r($_POST);
    }
}

class homepage extends page
{

    public function get()
    {
        //form to take csv file as input
        $form='';
        $form .='<center>';
        $form .= '<form action="index.php?page=homepage" method="post" enctype="multipart/form-data">';
        $form .='<h3>Upload CSV File</h3><br>';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload"><br><br>';
        $form .= '<input type="submit" value="Upload CSV file" name="submit"></center>';
        $form .= '</form> ';
        echo $form;                                                        
        

    }


?>