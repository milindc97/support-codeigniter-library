# support-codeigniter-library
Providing Simple Features for PHP-Codeigniter-Web-Application
like:-
1. Auth
2. Set Session
3. Handling Session Data
4. Uploading Files
with just a simple steps.

Set this paramenter in application/config/config.php
    
    define('auth_table', 'table_name_here'); //Replace table_name with your users storing table name
    define('session', 'true');  //set true to start session automatic after register/login
    define('upload_folder', './folder_name/'); //set folder, where you want to upload files. (./ belong to main folder of project.);



Download Support.php and paste in application/libraries.<br>
simply use this file where you want to by using 
    $this->load->library('support');
<br><b>How to register</b>:

    $this->support->register(array_data);
Just pass array data to register function.<br>
Eg:-

    $data = array('Name' => 'Milind Chaudhari','Email'=>'email@gmail.com','Password' =>'1234');
    $this->support->register($data);
    
  Output:-<br> 
  This will return true/false with started session (defined session is true).
  
<br><b>Login</b>
    
    $data = array('Email'=>'email@gmail.com','Password' =>'1234');
		$this->support->login($data);
    
 Output:-<br> 
  This will also return true/error message with started session (defined session is true).
