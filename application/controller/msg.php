<?php

class Msg extends Controller
{
    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/msg/mymsg.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function postPage()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/msg/mymsg.php';
        require APP . 'view/_templates/footer.php';
    }
    
    public function sendMsg()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/msg/mymsg.php';
        require APP . 'view/_templates/footer.php';
    }
    //
    public function displayMsg()
    {
        $result ="";
        
        // Using getAllMessages() for testing purposes, 
        // will use getMessages($aid, $user_id) in final version
        
        $messages = $this->apartment_db->getAllMessages();
//        $messages = $this->apartment_db->getMessages($aid, $user_id);

//        $users = $this->user_db->getUser(1);
//        print_r($users);
//        print_r($users->email);
//        print_r($messages);
        $result .='<table class="table table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>aid</th>
                <th>idMessages</th>
                <th>parent_id</th>
                <th>message_recipient</th>
                <th>message</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>';
        foreach($messages as $message) {
            
            // Need to figure out how to get the current Apartment ID
            
//            if ($message->aid == 1)
//            {
                $users = $this->user_db->getUser($message->parent_id);
                
                foreach($users as $user) {
                    $result .= '<tr><td>'.htmlspecialchars($user->name).'</td>';
                }
                $result .= '<td>'.htmlspecialchars($message->aid).'</td>';
                $result .= '<td>'.htmlspecialchars($message->idMessages).'</td>';
                $result .= '<td>'.htmlspecialchars($message->parent_id).'</td>';
                $result .= '<td>'.htmlspecialchars($message->message_recipient).'</td>';
                $result .= '<td>'.htmlspecialchars($message->message).'</td>';
                

                foreach($users as $user) {
                    $result .= '<td>'.htmlspecialchars($user->email).'</td></tr>';
                }
//            }
        }
        
        
        $result .= '</tbody></table>';
        
        return $result;
    }
   
    
}

