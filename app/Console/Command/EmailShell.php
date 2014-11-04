<?php

//THIS IS FOR CRON JOBS
class EmailShell extends AppShell {
    
    public function send_outbound_emails() {
        
        $options = array(
            'fields' => array(
                'OutboundMail.id',
                'OutboundMail.email_address',
                'OutboundMail.from_name',
                'OutboundMail.from_address',
                'OutboundMail.subject',
                'OutboundMail.message'
            ),
            'conditions' => array(
                'OutboundMail.send_date <=' => date("Y-m-d H:i:s",strtotime('NOW')),
                'OutboundMail.status' => 1
            ),
            'recursive' => -1,
            'limit' => 50
        );
        
        $outbound_mails = $this->OutgoingMail->find('all',$options);
        
        if(empty($outbound_mails)){
            $this->out('No Mails in QUEUE');
            return;
        }
        
        foreach ($outbound_mails as $outbound_mail){
            
            $to = $outbound_mail['OutboundMail']['email_address'];
            $from = $outbound_mail['OutboundMail']['from_address'];
            $fromname = $outbound_mail['OutboundMail']['from_name'];
            $subject = $outbound_mail['OutboundMail']['subject'];
            $html = $outbound_mail['OutboundMail']['message'];

            
            //IF SUCCESSFUL UPDATE RECORD, ELSE UPDATE RECORDS WITH FAIL STATUS
            //this must change
            App::uses('CakeEmail', 'Network/Email');
                $Email = new CakeEmail('smtp');
                $Email->from(array('info@wheresthewine.co.za' => $fromname));
                $Email->to($to);
                $Email->emailFormat('html');
                $Email->subject($subject);
                $Email->send($html);
            
            $data = array();
            $data['OutboundMail']['id'] = $outbound_mail['OutboundMail']['id'];
            $data['OutboundMail']['sent_date'] = date("Y-m-d H:i:s",strtotime('NOW'));
            $data['OutboundMail']['status'] = 2;
            
            if(!$this->OutgoingMail->save($data)){
                $this->log('Email status was not saved','email_cron');
            }
            
        }
        
        $this->out('No more Mails in QUEUE');
    }
}

?>
