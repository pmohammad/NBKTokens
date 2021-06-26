<?
class Usermodel extends CI_model{

#Constructor
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Kuwait');
    }
    
#Function to update date and time
    public function update_main($cname, $cid, $tname, $data){
        $this->db->where($cname, $cid);
        $this->db->update($tname,$data);
    }

#Function to get nationality
    public function get_nationality(){
        $query = $this->db->get('nationality_08');
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

#Function to get gender
    public function get_gender(){
        $query = $this->db->get('gender_14');
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

#Function to get age_group
    public function get_agegroup(){
        $query = $this->db->get('agegroup_13');
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }


#Function to get language
    public function get_language(){
        $query = $this->db->get('preferred_language_11');
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

#Function to get interest
    public function get_interest(){
        $query = $this->db->get('user_interest_10');
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

#Function to check mobile
    public function check_mobile($mobile){
        $query = $this->db->select('01_mobile')
                          ->where('01_mobile', $mobile)
                          ->get('register_01');
        if($query->num_rows()>0){
            return 0;
        }else{
            $query = $this->db->where('is_sms', 1)
                              ->where('number', $mobile)
                              ->get('verify_otp_12');
            if($query->num_rows()>0){
                return 'sent';
            }else{
                $query = $this->db->where('number', $mobile)
                              ->delete('verify_otp_12');
                $otp = rand(10000, 1000000);
                $data = array(
                    'number' => $mobile,
                    'otp' => $otp,
                );
                $query = $this->db->insert('verify_otp_12', $data);
                return true;
            }
        }
    }
#Function to check email
    public function check_email($email){
        $query = $this->db->select('01_email')
                          ->where('01_email', $email)
                          ->get('register_01');
        if($query->num_rows()>0){
            return 0;
        }else{
            $query = $this->db->where('is_sms', 1)
                              ->where('number', $email)
                              ->get('verify_otp_12');
            if($query->num_rows()>0){
                return 'sent';
            }else{
                $query = $this->db->where('number', $email)
                                 ->delete('verify_otp_12');
                $otp = rand(10000, 1000000);
                $data = array(
                    'number' => $email,
                    'otp' => $otp,
                    );
                $query = $this->db->insert('verify_otp_12', $data);
                return true;
            }
        }
    }

#Function to check otp
    public function check_otp($mobile, $otp){
        $query = $this->db->select('id')
                          ->where('number', $mobile)
                          ->where('otp', $otp)
                          ->get('verify_otp_12');
        if($query->num_rows()>0){
           $query = $this->db->where('number', $mobile)
                             ->delete('verify_otp_12');
            return true;
        }else{
            return false;
        }
    }

#Function to check referral
    public function check_referral($referral){
        $query = $this->db->select('01_id')
                          ->where('01_referring_code', $referral)
                          ->get('register_01');
        if($query->num_rows()>0){
            $result = $query->row_array();
            return $result['01_id'];
        }else{
            return 0;
        }
    }

#Function to get balance
    public function get_userbalance($id){
        $query = $this->db->join('register_01 b', 'a.01_id = b.01_id')
                         ->where('a.01_id', $id)
                         ->order_by('09_date', 'DESC')
                         ->limit(1)
                         ->get('wallet_09 a');
        if($query){
            return $query->row_array();
        }
    }

#Function to get balance
    public function get_kyc_info($id){
        $query = $this->db->where('01_id', $id)
                         ->get('bank_details_16');
        if($query){
            return $query->row_array();
        }
    }

#Function to complete registration
    public function registration($name,$mobile,$nationality,$referral,$pass,$email,$gender, $dob, $interest,$language){
        $data = array(
            '01_name' => $name,
            '01_mobile' => $mobile,
            '01_nationality' => $nationality,
            '01_referby' =>$referral,
            '01_password' => $pass,
            '01_role'=> '3',
            '01_email'=> $email,
            '01_gender'=> $gender,
            '01_age'=> $dob,
            '01_interest'=> $interest,
            '01_language'=> $language,
		);
		$query = $this->db->insert('register_01', $data);
		if($query){
		    $q = $this->db->select('*')
		                  ->where('01_id', $this->db->insert_id())
		                  ->get('register_01');
		    $rcode = substr($name,0,2).substr($mobile,-2).$this->db->insert_id().$nationality;
		    $data = array(
		        '01_email_verified_on' =>date('Y-m-d H:i:s'),
		        '01_mobile_verified_on'=>date('Y-m-d H:i:s'),
		        "01_created_on" => date('Y-m-d H:i:s'),
		        "01_created_by" => $this->db->insert_id(),
		        "01_updated_on" => date('Y-m-d H:i:s'),
		        "01_updated_by" => $this->db->insert_id(),
		        "01_referring_code" =>$rcode,
		        );
		    $this->update_main('01_id', $this->db->insert_id(), 'register_01', $data);
		    if($referral>0){
		        $updaterefer = $this->db->set('01_total_refer', '`01_total_refer`+ 1', FALSE)
		                                ->where('01_id',$referral)
		                                ->update('register_01');
		        $balance =$this->db->select('sum(09_balance)')
		                           ->where('01_id', $referral)
		                           ->get('wallet_09');
		        $bal = $balance->row_array();
		        $b = $bal['09_balance'];
		        $data = array(
		            '01_id' => $referral,
		            '09_description' => 'Referred to '.$mobile.'( '. $name. ' )',
		            '09_date' =>date('Y-m-d'),
		            '09_earn' =>0,
		            '09_balance' =>$b+0,
                '09_effective_balance' => 0
		            );
		            $query = $this->db->insert('wallet_09', $data);
		    }
		    return $q->row_array();
		}else{
		    return false;
		}
    }

#Function to verify email
    public function verify_email($email){
        $query = $this->db->where('01_email', $email)
                          ->get('register_01');
        if(sizeof($query->result_array())>0){
            return true;
        }
        else{
            return false;
        }
    }
#Function to update user
    public function update_user($email,$link){
        $query = $this->db->where('01_email', $email)
                          ->set('forgot_token', $link)
                          ->update('register_01');
        if($query){
            return true;
        }else{
            return false;
        }
    }

#Function to update password
    public function update_password($email, $password){
        $query = $this->db->where('01_email', $email)
                          ->set('01_password', $password)
                          ->update('register_01');
        if($query){
            return true;
        }else{
            return false;
        }
    }

#Function to get user data
    public function get_userdata($link){
        $query = $this->db->where('forgot_token', $link)
                          ->get('register_01');
        if($query){
            return $query->row_array();
        }else{
            return false;
        }
    }
#Function to update token
    public function update_token($uid, $token){
        $query = $this->db->where('01_id', $uid)
                         ->set('01_token', $token)
                         ->update('register_01');
        if($query){
            return true;
        }else{
            return false;
        }
    }

#Function to get token
    public function get_token($uid){
        $query = $this->db->select('01_token')
                          ->where('01_id', $uid)
                          ->get('register_01');
        $token = $query->row_array();
        return $token['01_token'];
    }

#Function to validate login
    public function validate_login($mobile,$password){
        $query=$this->db->where('01_mobile',$mobile)
                        ->where('01_password',$password)
                        ->where('01_role',3)
					    ->get('register_01');
		if($query->num_rows()==1){
		    return $query->row_array();
		}else{
		    return false;
		}
    }

#Function to get user details
    public function fetch_profile_details($id){
        $query = $this->db->join('nationality_08 b', 'a.01_nationality=b.08_id')
                          ->where('a.01_id', $id)
                          ->get('register_01 a');
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }

#Function to get user details
    public function fetch_bank_profile($id){
        $query = $this->db->join('nationality_08 b', 'a.01_nationality=b.08_id')
                          ->join('bank_details_16 c', 'a.01_id=c.01_id')
                          ->where('a.01_id', $id)
                          ->get('register_01 a');
        if($query){
            return $query->result_array();
        }
        else{
            return false;
        }
    }
    
#Function to fetch wallet
    public function fetch_wallet($id){
        $query = $this->db->where('01_id', $id)
                          ->get('wallet_09');
        if($query){
            return $query->result_array();
        }else{
            return false;
        }
    }
#Function to fetch wallet
        public function get_wallet($id){
            $query = $this->db->where('01_id', $id)
                              ->get('wallet_09');
            if($query){
                return $query->result_array();
            }else{
                return false;
            }
        }
#Function to fetch thumbnailsrView to display link campaign
/*    public function fetch_thumbnails($uid,$newer){
        $date = date('Y-m-d H:i:s');
        $video_end = $this->db->where('01_id', $uid)
                            ->where('07_status', 0)
                            ->set('07_status', 2)
                            ->set('07_end_time', 0)
                            ->set('07_video_seconds', 0)
                            ->update('watch_history_07');
        /*$watched_camapign = $this->db->select('group_concat(distinct(05_id)) as campaign')
                                     ->where('01_id', $uid)
                                     ->get('watch_history_07');
        //$campaign = $watched_camapign->row_array();
        //$campaign = $campaign['campaign'];
        $campaign = 0;
        $userq = $this->db->where('01_id', $uid)
                          ->get('register_01');
        $res = $userq->row_array();
        $interest  = explode(',', $res['01_interest']);
        $nationality  = explode(',', $res['01_nationality']);
        $age  = explode(',', $res['01_age']);
        $lang  = explode(',', $res['01_language']);
        $gender  = explode(',', $res['01_gender']);
        $campaign  = explode(',', $campaign);
        $query = $this->db->join('campaign_rules_06 b', 'b.05_id=a.05_id')
                          ->join('company_04 c', 'a.04_id=c.04_id')
                          ->Like('06_nationality', $res['01_nationality'])
                          ->Like('06_gender', $res['01_gender'])
                          ->Like('06_interest', $res['01_interest'])
                          ->Like('06_agegroup', $res['01_age'])
                          ->Like('06_language', $res['01_language'])
                          ->where('05_campaign_status', 3)
                          ->where('05_end_date>=', $date)
                          ->where('c.04_balance_left>= b.06_price')
                          ->where_not_in('a.05_id', $campaign)
                          ->where_not_in('a.05_id', $newer)
                          ->order_by('06_price', "DESC")
                          ->group_by('b.05_id')
                          ->limit(9)
                          ->get('campaign_05 a');
        if($query){
            return $query->result_array();
        }else{
            return false;
        }
    }*/

#Function to fetch thumbnailsrView to display link campaign
    public function fetch_thumbnails($uid,$newer){
        $date = date('Y-m-d H:i:s');
        $video_end = $this->db->where('01_id', $uid)
                            ->where('07_status', 0)
                            ->set('07_status', 2)
                            ->set('07_end_time', 0)
                            ->set('07_video_seconds', 0)
                            ->update('watch_history_07');
        $watched_camapign = $this->db->select('group_concat(distinct(05_id)) as campaign')
                                     ->where('01_id', $uid)
                                     ->get('watch_history_07');
        $campaign = $watched_camapign->row_array();
        $campaign = $campaign['campaign'];
        
        $userq = $this->db->where('01_id', $uid)
                          ->get('register_01');
                          
        
        
        $res = $userq->row_array();
        $interest  = explode(',', $res['01_interest']);
        $nationality  = explode(',', $res['01_nationality']);
        $age  = explode(',', $res['01_age']);
        $lang  = explode(',', $res['01_language']);
        $gender  = explode(',', $res['01_gender']);
        $campaign  = explode(',', $campaign);
        $query = $this->db->select('a.05_id, max(b.06_price) as p')
                          ->join('campaign_rules_06 b', 'b.05_id=a.05_id')
                          ->join('company_04 c', 'a.04_id=c.04_id')
                          ->Like('06_nationality', $res['01_nationality'])
                          ->Like('06_gender', $res['01_gender'])
                          ->Like('06_interest', $res['01_interest'])
                          ->Like('06_agegroup', $res['01_age'])
                          ->Like('06_language', $res['01_language'])
                          ->where('05_campaign_status', 3)
                          ->where('05_start_date<=', $date)
                          ->where('05_end_date>=', $date)
                          ->where('05_remaining_budget>=b.06_price')
                          ->where('c.04_balance_left>= b.06_price')
                          ->where_not_in('a.05_id', $campaign)
                          ->group_by('a.05_id')
                          ->order_by('06_price', "DESC")
                          ->get('campaign_05 a');
        if($query && $query->num_rows()>0){
            $id5 = [];
            $price = [];
            $q = $query->result_array();
            foreach($q as $key){
                array_push($id5,$key['05_id']);
                array_push($price, $key['p']);
            }
            $fetch = $this->db->join('campaign_rules_06 b', 'b.05_id=a.05_id')
                              ->join('company_04 c', 'a.04_id=c.04_id')
                              ->where_in('a.05_id', $id5)
                              ->where_in('b.06_price', $price)
                              ->group_by('a.05_id')
                              ->order_by('b.06_price', "DESC")
                              ->get('campaign_05 a');
            if($fetch){
                return $fetch->result_array();
                die();
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    

#Function to get camp ids
    public function get_camp_ids($uid,$newer){
        $date = date('Y-m-d H:i:s');
        /*$watched_camapign = $this->db->select('group_concat(distinct(05_id)) as campaign')
                                     ->where('01_id', $uid)
                                     ->get('watch_history_07');*/
        //$campaign = $watched_camapign->row_array();
        //$campaign = $campaign['campaign'];
        $campaign = 0;
        $userq = $this->db->where('01_id', $uid)
                          ->get('register_01');
        $res = $userq->row_array();
        $interest  = explode(',', $res['01_interest']);
        $interest = array_map('intval', $interest);
        $nationality  = explode(',', $res['01_nationality']);
        $nationality = array_map('intval', $nationality);
        $age  = explode(',', $res['01_age']);
        $age = array_map('intval', $age);
        $lang  = explode(',', $res['01_language']);
        $lang = array_map('intval', $lang);
        $gender  = explode(',', $res['01_gender']);
        $gender = array_map('intval', $gender);
        $campaign  = explode(',', $campaign);
        $campaign = array_map('intval', $campaign);
        $this->db->where_in('06_interest', $interest);
        //$this->db->limit(9);
        $query = $this->db->select('group_concat(distinct(a.05_id)) as camp_ids')
                          ->join('campaign_rules_06 b', 'b.05_id=a.05_id')
                          ->join('company_04 c', 'a.04_id=c.04_id')
                          ->where_in('06_nationality', $nationality)
                          ->where_in('06_gender', $gender)
                          ->where_in('06_agegroup', $age)
                          ->where_in('06_language', $lang)
                          ->where('05_campaign_status', 3)
                          //->where('05_end_date>=', $date)
                          ->where('04_balance_left>= b.06_price')
                          ->where_not_in('a.05_id', $campaign)
                          ->where_not_in('a.05_id', $newer)
                          ->order_by('06_price', "DESC")
                          //->limit(9)
                          ->get('campaign_05 a');
        if($query){
            $q = $query->row_array();
            return $q['camp_ids'];
        }else{
            return false;
        }
    }
#Function to fetch video
    public function fetch_video($id){
        $query = $this->db->join('campaign_rules_06 b', 'a.05_id=b.05_id')
                          ->where('b.06_id', $id)
                          ->get('campaign_05 a');
        if($query){
            return $query->row_array();
        }else{
            return false;
        }
    }
#Function to add history
    public function add_history($id, $uid,$id6){
        $q = $this->db->where('01_id', $uid)
                      ->where('07_status', 0)
                      ->get('watch_history_07');
        $resq  = $q->row_array();
        if(!isset($resq)){

            $price = $this->db->where('06_id', $id6)
                              ->get('campaign_rules_06');
            $get_price = $price->row_array();

            $cid = $this->db->where('05_id', $id)
                            ->get('campaign_05');
            $company_id = $cid->row_array();

            $get_balance = $this->db->select('04_balance_left')
                                ->where('04_id', $company_id['04_id'])
                                ->get('company_04');
            $balance = $get_balance->row_array();
            $balance = $balance['04_balance_left'];
            
            $remaining_bal = $this->db->select('05_remaining_budget')
                                ->where('05_id', $id)
                                ->get('campaign_05');
            $remaining_budget = $remaining_bal->row_array();
            $remaining_budget = $remaining_budget['05_remaining_budget'];
            

            if($balance >= $get_price['06_price'] && $remaining_budget>=$get_price['06_price']){
                
                $remaining_budget = $remaining_budget - $get_price['06_price'];
                $this->db->where('05_id', $id)->set('05_remaining_budget', $remaining_budget)->update('campaign_05');
                
                $reserve_bal = $balance - $get_price['06_price'];
                $this->db->where('04_id', $company_id['04_id'])->set('04_balance_left', $reserve_bal)->update('company_04');

                $data = array(
                    '01_id' =>$uid,
                    '05_id' =>$id,
                    '07_start_time' =>0,
                    '07_video_seconds' =>0,
                    '07_pay_me' =>0,
                    '07_status' =>0,
                    '07_amount' =>$get_price['06_price'],
                    '07_date' => date('Y-m-d H:i:s'),
                );
                $query = $this->db->insert('watch_history_07', $data);
                if($query){
                    return "true";
                }else{
                    return "false";
                }
            }
            else{
                return '-1';
            }
        }
        else{
            return $resq['07_id'];
        }
    }

#Function to fetch history video
    public function fetch_history_video($id,$uid){
        $query = $this->db->join('campaign_rules_06 b', 'a.05_id=b.05_id')
                          ->join('watch_history_07 c', 'a.05_id=c.05_id')
                          ->where('c.01_id', $uid)
                          ->where('c.07_id', $id)
                          ->where('c.07_status', 0)
                          ->get('campaign_05 a');
        if($query){
            return $query->row_array();
        }else{
            return false;
        }
    }

#Function to add time out
    public function set_timeout($uid, $time, $id6,$type){
        if($type==0){
            $q = $this->db->where('01_id', $uid)->where('07_status', 2)
                      ->order_by('07_id','DESC')->limit(1)
                      ->get('watch_history_07');
            $resq  = $q->row_array();
            if(empty($resq)){
                return 'data not found';
            }
        }else{
            $q = $this->db->where('01_id', $uid)->where('07_status', 0)->get('watch_history_07');
            $resq  = $q->row_array();
            if(empty($resq)){
                return 'data not found';
            }
        }
        $duration  = $this->db->where('05_id', $resq['05_id'])
                              ->get('campaign_05');
        $mobile_query = $this->db->where('01_id', $uid)
                                 ->get('register_01');
        $res_mobile = $mobile_query->row_array();
        $resdur = $duration->row_array();
        $percentage =floatval($time / $resdur['05_seconds']) * 100;
        if($resdur['05_type']==0 && $time>5 && $time<7){
            $query = $this->db->where('01_id', $uid)
                              ->where('07_status', 0)
                              ->where('05_id', $resq['05_id'])
                              ->set('07_end_time', $time)
                              ->set('07_video_seconds', $percentage)
                              ->set('07_status', 2)
                              ->set('07_company_charged', 1)
                              ->update('watch_history_07');
        }else{
            if($percentage>=$resdur['05_up_limit']){
                $query = $this->db->where('01_id', $uid)
                                  ->where('07_id', $resq['07_id'])
                                  ->where('05_id', $resq['05_id'])
                                  ->set('07_end_time', $time)
                                  ->set('07_video_seconds', $percentage)
                                  ->set('07_status', 2)
                                  ->set('07_company_charged', 1)
                                  ->update('watch_history_07');          
                                  
                                  
                
                if($resdur['05_send_sms']==1){
                    $query = $this->db->join('preferred_language_11 b','a.01_language = b. 11_id')
                                      ->where('01_id', $uid)
                                      ->get('register_01 a');
                    $resLang = $query->row_array();
                    if($resLang['11_language']=="English"){
                        $link = $resdur['05_sms_template_english'];
                        $hex="";
                        for ($i=0; $i<strlen($link); $i++){
                            $ord = ord($link[$i]);
                            $hexCode = dechex($ord);
                            $hex .= substr('0'.$hexCode, -2);
                        }
                        $url = 'http://62.215.172.203/knews/easy_api_submit.aspx?un=ACC_716-059&pw=QdkXcE7J8xqsj52t&originator=544148534545454C&mobiles_list='.$res_mobile['01_mobile'].'&msg_lang=en&msg_text='.$hex;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_POST, false);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                    }else{
                        $link = $resdur['05_sms_template_arabic'];
                        $hex="";
                        for ($i=0; $i<strlen($link); $i++){
                            $ord = ord($link[$i]);
                            $hexCode = dechex($ord);
                            $hex .= substr('0'.$hexCode, -2);
                        }
                        $url = 'http://62.215.172.203/knews/easy_api_submit.aspx?un=ACC_716-059&pw=QdkXcE7J8xqsj52t&originator=544148534545454C&mobiles_list='.$res_mobile['01_mobile'].'&msg_lang=ar&msg_text='.$hex;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_POST, false);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                    }
                }
                if($resdur['05_send_email']==1){
                    $query = $this->db->join('preferred_language_11 b','a.01_language = b. 11_id')
                                      ->where('01_id', $uid)
                                      ->get('register_01 a');
                    $resLang = $query->row_array();
                    if($resLang['11_language']=="English"){
                        $this->load->library('email');
                        $fromemail="info@adzjar.com";
                        $toemail = $email;
                        $subject = "Adzjar.com";
                        $msg = $this->load->view('email_template/'.$resdur['05_email_template_english'],'',true);
                        
                        $config=array(
                        'charset'=>'utf-8',
                        'wordwrap'=> TRUE,
                        'mailtype' => 'html'
                        );
                        
                        $this->email->initialize($config);
                        $this->email->to($res_mobile['01_email']);
                        $this->email->from($fromemail, "Adzjar.com");
                        $this->email->subject($subject);
                        $this->email->message($msg);
                        $mail = $this->email->send();
                    }else{
                        $this->load->library('email');
                        $fromemail="info@adzjar.com";
                        $toemail = $email;
                        $subject = "Adzjar.com";
                        $msg = $this->load->view('email_template/'.$resdur['05_email_template_arabic'],'',true);
                        
                        $config=array(
                        'charset'=>'utf-8',
                        'wordwrap'=> TRUE,
                        'mailtype' => 'html'
                        );
                        
                        $this->email->initialize($config);
                        $this->email->to($res_mobile['01_email']);
                        $this->email->from($fromemail, "Adzjar.com");
                        $this->email->subject($subject);
                        $this->email->message($msg);
                        $mail = $this->email->send();
                    }
                }
                
            }else if($percentage==100){
                $query = $this->db->where('01_id', $uid)
                                  ->where('07_id', $resq['07_id'])
                                  ->where('05_id', $resq['05_id'])
                                  ->set('07_end_time', $time)
                                  ->set('07_video_seconds', $percentage)
                                  ->set('07_status', 1)
                                  ->set('07_company_charged', 1)
                                  ->update('watch_history_07');
                                  
                if($resdur['05_send_sms']==1){
                    $query = $this->db->join('preferred_language_11 b','a.01_language = b. 11_id')
                                      ->where('01_id', $uid)
                                      ->get('register_01 a');
                    $resLang = $query->row_array();
                    if($resLang['11_language']=="English"){
                        $link = $resdur['05_sms_template_english'];
                        $hex="";
                        for ($i=0; $i<strlen($link); $i++){
                            $ord = ord($link[$i]);
                            $hexCode = dechex($ord);
                            $hex .= substr('0'.$hexCode, -2);
                        }
                        $url = 'http://62.215.172.203/knews/easy_api_submit.aspx?un=ACC_716-059&pw=QdkXcE7J8xqsj52t&originator=544148534545454C&mobiles_list='.$res_mobile['01_mobile'].'&msg_lang=en&msg_text='.$hex;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_POST, false);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                    }else{
                        $link = $resdur['05_sms_template_arabic'];
                        $hex="";
                        for ($i=0; $i<strlen($link); $i++){
                            $ord = ord($link[$i]);
                            $hexCode = dechex($ord);
                            $hex .= substr('0'.$hexCode, -2);
                        }
                        $url = 'http://62.215.172.203/knews/easy_api_submit.aspx?un=ACC_716-059&pw=QdkXcE7J8xqsj52t&originator=544148534545454C&mobiles_list='.$res_mobile['01_mobile'].'&msg_lang=ar&msg_text='.$hex;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_POST, false);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        print_r($response);
                        die();
                        curl_close($ch);
                    }
                }
                
                if($resdur['05_send_email']==1){
                    $query = $this->db->join('preferred_language_11 b','a.01_language = b. 11_id')
                                      ->where('01_id', $uid)
                                      ->get('register_01 a');
                    $resLang = $query->row_array();
                    if($resLang['11_language']=="English"){
                        $this->load->library('email');
                        $fromemail="info@adzjar.com";
                        $toemail = $email;
                        $subject = "Adzjar.com";
                        $msg = $this->load->view('email_template/'.$resdur['05_email_template_english'],'',true);
                        
                        $config=array(
                        'charset'=>'utf-8',
                        'wordwrap'=> TRUE,
                        'mailtype' => 'html'
                        );
                        
                        $this->email->initialize($config);
                        $this->email->to($res_mobile['01_email']);
                        $this->email->from($fromemail, "Adzjar.com");
                        $this->email->subject($subject);
                        $this->email->message($msg);
                        $mail = $this->email->send();
                    }else{
                        $this->load->library('email');
                        $fromemail="info@adzjar.com";
                        $toemail = $email;
                        $subject = "Adzjar.com";
                        $msg = $this->load->view('email_template/'.$resdur['05_email_template_arabic'],'',true);
                        
                        $config=array(
                        'charset'=>'utf-8',
                        'wordwrap'=> TRUE,
                        'mailtype' => 'html'
                        );
                        
                        $this->email->initialize($config);
                        $this->email->to($res_mobile['01_email']);
                        $this->email->from($fromemail, "Adzjar.com");
                        $this->email->subject($subject);
                        $this->email->message($msg);
                        $mail = $this->email->send();
                    }
                }
            }else{
                $price = $this->db->where('06_id', $id6)
                                  ->get('campaign_rules_06');
                $get_price = $price->row_array();
                
                $get_balance = $this->db->select('04_balance_left')
                                        ->where('04_id', $resdur['04_id'])
                                        ->get('company_04');
                $balance = $get_balance->row_array();
                $balance = $balance['04_balance_left'] + $get_price['06_price'];
    
                $this->db->where('04_id', $resdur['04_id'])->set('04_balance_left', $balance)->update('company_04');
                
                $remaining_budget = $this->db->select('05_remaining_budget')
                                             ->where('05_id', $resq['05_id'])
                                             ->get('campaign_05');
                $rem_budget = $remaining_budget->row_array();
                $rem_budget = $rem_budget['05_remaining_budget'] + $get_price['06_price'];
    
                $this->db->where('05_id', $resq['05_id'])->set('05_remaining_budget', $rem_budget)->update('campaign_05');
    
                $query = $this->db->where('01_id', $uid)
                                  ->where('07_id', $resq['07_id'])
                                  ->where('05_id', $resq['05_id'])
                                  ->set('07_end_time', $time)
                                  ->set('07_video_seconds', $percentage)
                                  ->set('07_status', 2)
                                  ->update('watch_history_07');
            }
        }
        
        if($query){
            return true;
        }else{
            return false;
        }
    }

#Function to add time out
    public function add_money($uid, $time,$type){
        if($type==0){
            $q = $this->db->where('01_id', $uid)
                      ->where('07_status', 2)
                      ->order_by('07_id','DESC')
                      ->limit(1)
                      ->get('watch_history_07');
                      $resq  = $q->row_array();
        }else{
            $q = $this->db->where('01_id', $uid)
                          ->where('07_status', 0)
                          ->get('watch_history_07');
                          $resq  = $q->row_array();
        }
        //$resq  = $q->row_array();
        $mobile_query = $this->db->where('01_id', $uid)
                                 ->get('register_01');
        $res_mobile = $mobile_query->row_array();
        $duration  = $this->db->join('company_04 b', 'a.04_id = b.04_id')
                              ->where('05_id', $resq['05_id'])
                              ->get('campaign_05 a');
        $resdur = $duration->row_array();
        $percentage = floatval($time / $resdur['05_seconds']) *100;
            $query = $this->db->where('01_id', $uid)
                              ->where('05_id', $resq['05_id'])
                              ->where('07_id', $resq['07_id'])
                              ->set('07_end_time', $time)
                              ->set('07_video_seconds', $percentage)
                              ->set('07_status', 1)
                              ->set('07_pay_me', 1)
                              ->set('07_company_charged', 1)
                              ->update('watch_history_07');

            $wallet = $this->db->select('09_balance')
                               ->where('01_id', $uid)
                               ->order_by('09_id', "DESC")
                               ->limit(1)
                               ->get('wallet_09');
            $walletres = $wallet->row_array();
            $wallet_balance = $walletres['09_balance'] + $resq['07_amount'];

            $data = array(
                        '01_id' =>$uid,
                        '09_description' =>$resdur['04_name'].' - '.$resdur['05_name'],
                        '09_date' =>date('Y-m-d H:i:s'),
                        '09_earn' =>$resq['07_amount'],
                        '09_balance' => $wallet_balance,
                        '09_type' =>2,
                        '07_id' => $resq['07_id'],
                        '09_effective_balance'=> $resq['07_amount'],
                    );
            $add_wallet = $this->db->insert('wallet_09', $data);
            
            if($resdur['05_send_sms']==1){
                    $query = $this->db->join('preferred_language_11 b','a.01_language = b. 11_id')
                                      ->where('01_id', $uid)
                                      ->get('register_01 a');
                    $resLang = $query->row_array();
                    if($resLang['11_language']=="English"){
                        $link = $resdur['05_sms_template_english'];
                        $hex="";
                        for ($i=0; $i<strlen($link); $i++){
                            $ord = ord($link[$i]);
                            $hexCode = dechex($ord);
                            $hex .= substr('0'.$hexCode, -2);
                        }
                        $url = 'http://62.215.172.203/knews/easy_api_submit.aspx?un=ACC_716-059&pw=QdkXcE7J8xqsj52t&originator=544148534545454C&mobiles_list='.$res_mobile['01_mobile'].'&msg_lang=en&msg_text='.$hex;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_POST, false);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                    }else{
                        $link = $resdur['05_sms_template_arabic'];
                        $hex="";
                        for ($i=0; $i<strlen($link); $i++){
                            $ord = ord($link[$i]);
                            $hexCode = dechex($ord);
                            $hex .= substr('0'.$hexCode, -2);
                        }
                        $url = 'http://62.215.172.203/knews/easy_api_submit.aspx?un=ACC_716-059&pw=QdkXcE7J8xqsj52t&originator=544148534545454C&mobiles_list='.$res_mobile['01_mobile'].'&msg_lang=ar&msg_text='.$hex;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_POST, false);
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $response = curl_exec($ch);
                        curl_close($ch);
                        print_r($response);
                        die();
                    }
                }
            if($resdur['05_send_email']==1){
                    $query = $this->db->join('preferred_language_11 b','a.01_language = b. 11_id')
                                      ->where('01_id', $uid)
                                      ->get('register_01 a');
                    $resLang = $query->row_array();
                    if($resLang['11_language']=="English"){
                        $this->load->library('email');
                        $fromemail="info@adzjar.com";
                        $toemail = $email;
                        $subject = "Adzjar.com";
                        $msg = $this->load->view('email_template/'.$resdur['05_email_template_english'],'',true);
                        
                        $config=array(
                        'charset'=>'utf-8',
                        'wordwrap'=> TRUE,
                        'mailtype' => 'html'
                        );
                        
                        $this->email->initialize($config);
                        $this->email->to($res_mobile['01_email']);
                        $this->email->from($fromemail, "Adzjar.com");
                        $this->email->subject($subject);
                        $this->email->message($msg);
                        $mail = $this->email->send();
                    }else{
                        $this->load->library('email');
                        $fromemail="info@adzjar.com";
                        $toemail = $email;
                        $subject = "Adzjar.com";
                        $msg = $this->load->view('email_template/'.$resdur['05_email_template_arabic'],'',true);
                        
                        $config=array(
                        'charset'=>'utf-8',
                        'wordwrap'=> TRUE,
                        'mailtype' => 'html'
                        );
                        
                        $this->email->initialize($config);
                        $this->email->to($res_mobile['01_email']);
                        $this->email->from($fromemail, "Adzjar.com");
                        $this->email->subject($subject);
                        $this->email->message($msg);
                        $mail = $this->email->send();
                    }
                }
            
        if($query){
            return true;
        }else{
            return false;
        }
    }

#Function to load watch history
    public function watch_history($id){
        $query = $this->db->join('campaign_05 b', 'a.05_id = b.05_id')
                          ->where('01_id', $id)
                          ->order_by('07_id', "DESC")
                          ->get('watch_history_07 a');
        if($query){
            return $query->result_array();
        }else{
            return false;
        }
    }

#Function to add bank details
    public function bank_details($id,$civil_front,$civil_back,$iban,$acc_name,$banks){
        $data = array(
            '01_id' => $id,
            '16_civil_front' =>$civil_front,
            '16_civil_back' =>$civil_back,
            '16_iban' =>$iban,
            '16_account_name' => $acc_name,
            'bank_id' => $banks,
            'created_on'=>date('Y-m-d H:i:s')
        );
        $query = $this->db->insert('bank_details_16', $data);
        if($query){
            $update = $this->db->set('is_bank_details', 1)->where('01_id', $id)->update('register_01');
            if($update){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

#Function to request withdraw
    public function request_withdraw($id,$pass){
        $query=$this->db->where('01_id',$id)
                        ->where('01_password',$pass)
                        ->where('01_role',3)
					    ->get('register_01');
		if($query->num_rows()==1){
		    $amount = $this->db->select('09_balance')->where('01_id', $id)->order_by('09_date', 'DESC')->limit(1)->get('wallet_09');
            $balance = $amount->row_array();
            $bal = $balance['09_balance'];
            $withdraw = array(
                '01_id' =>$id,
                '09_date' =>date('Y-m-d H:i:s'),
                '09_description'=>'Withdrawal Raised',
                '09_withdraw' =>$bal,
                '09_balance' =>0.000,
                '09_type'=>3,
                '09_effective_balance'=>-$bal,
                );
            $with_req = $this->db->insert('wallet_09',$withdraw);
            if($with_req){
                return true;
            }else{
                return false;
            }
		}
		else{
		    return false;
		}
    }

#Function to fetch banks
    public function fetch_banks(){
        $query = $this->db->where('status_id', 1)->get('banks');
        if($query){
            return $query->result_array();
        }else{
            return false;
        }
    }

#Function to get wallet $amount
  public function get_wallet_amount($id){
    $query = $this->db->select('sum(09_effective_balance) as amount')->where('01_id', $id)->get('wallet_09');
    if($query){
        $amt = $query->row_array();
        return $amt['amount'];
    }else{
        return false;
    }
  }
 
#Function to fetch bank_details
    public function edit_bank_details($id){
        $query = $this->db->join('banks b', 'a.bank_id = b.bank_id')
                          ->where('01_id', $id)
                          ->get('bank_details_16 a');
        if($query){
            return $query->row_array();
        }else{
            return false;
        }
    }
 
#Function to edit profile
    public function edit_profile($id){
        $query = $this->db->where('01_id', $id)
                          ->get('register_01');
        if($query){
            return $query->row_array();
        }else{
            return false;
        }               
    }
}
?>
