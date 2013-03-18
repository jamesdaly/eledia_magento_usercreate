<?php

//echo "in script\n<br />";
//echo $email.$password.$firstname.$lastname;

        try {//build up soap client
            $client = new SoapClient(
                NULL,
                array(
                    "location" => 'http://sandbox22.eledia.de/webservice/soap/server.php?wstoken=6da2b79ff748e367aa11b0e42818077c',
                    "uri" => "urn:xmethods-delayed-quotes",
                    "style" => SOAP_RPC,
                    "use" => SOAP_ENCODED,
                    'trace' => 1
                )
            );
//        }  catch (exception $e){
//            print_r($client->__getLastResponse());
//        }
//print_r($client);
//        echo "client build succsessful\n<br />";

        //build moodle user
        $param_users = array(new stdClass);
        $param_users[0]->username = $email;
        $param_users[0]->password = $password;
        $param_users[0]->firstname = $firstname;
        $param_users[0]->lastname = $lastname;
        $param_users[0]->email = $email;
        $param_users[0]->auth = 'manual';
        $param_users[0]->idnumber = '';
        $param_users[0]->lang = 'de';
        $param_users[0]->city = 'testlingen';
        $param_users[0]->country = 'DE';
//        echo "try call\n<br />";
        print_r($param_users);
       
            $result = $client->core_user_create_users($param_users);
        }catch(exception $e){
//            print_r($client->__getLastResponse());//hier Fehlermeldung
            $session->setCustomerFormData($this->getRequest()->getPost())
                    ->addException($e, $this->__('Cannot save the customer to Moodle.'));
        }
//        
        //test if user submitted correct
//    }
//echo "leaving script\n<br />";
//exit;

