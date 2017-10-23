<?php
require_once 'API.class.php';
require_once 'UserKey.php';

class MyAPI extends AbstractAPI
{
    protected $User;

    public function __construct($request, $origin) {
        parent::__construct($request);

        
        $Key = new Key;
        $User = new User;

        if (!array_key_exists('apiKey', $this->request)) {
            throw new Exception('No API Key provided');
        } else if (!$Key->verifyKey($this->request['apiKey'], $origin)) {
            throw new Exception('Invalid API Key');
        } else if (array_key_exists('token', $this->request) &&
             !$User->verifyUserToken('token', $this->request['token'])) {
            throw new Exception('Invalid User Token');
        }

        $this->User = $User;
    }

    /**
     * Example of an Endpoint
     */
     protected function example() {
        if ($this->method == 'GET') {
            return "Your name is " . $this->User->name;
        } else {
            return "Only accepts GET requests";
        }
     }
 }
 ?>