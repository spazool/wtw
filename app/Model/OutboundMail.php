<?php
App::uses('AppModel', 'Model');

class OutboundMail extends AppModel {
    
    public function create_register_email($user_id){
        $this->output = '';
        $viewing = new View($this, FALSE);
        $html = $viewing->render('/Emails/html/register_email'); // get the rendered markup
        
        $user = ClassRegistry::init('User');
        $replacements = $user->createRegistrationEmail($user_id);
        
        $html_mail = str_replace(array_keys($replacements), $replacements, $html);
        
//        $data = array();
//        $data['OutboundMail']['send_date'] = date("Y-m-d H:i:s",strtotime('NOW'));
//        $data['OutboundMail']['type'] = 1;
//        $data['OutboundMail']['email_address'] = $replacements['{{email}}'];
//        $data['OutboundMail']['from_name'] = 'Wheres the wine';
//        $data['OutboundMail']['from_address'] = 'info@wheresthewine.co.za';
//        $data['OutboundMail']['subject'] = 'Welcome to Wheres the wine';
//        $data['OutboundMail']['message'] = $html_mail;
//        $data['OutboundMail']['status'] = 1;
        
        App::uses('CakeEmail', 'Network/Email');
                $Email = new CakeEmail('smtp');
                $Email->from(array('info@wheresthewine.co.za' => 'Wheres the wine site'));
                $Email->to($replacements['{{email}}']);
                $Email->emailFormat('html');
                $Email->subject('Website');
                $Email->send($html_mail);
        
        
            return TRUE;
        
            
        
        
        
    }
    
    
    
}

?>
