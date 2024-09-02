<?php

    include "connect.php";

    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHP/src/Exception.php';
    require 'PHP/src/PHPMailer.php';
    require 'PHP/src/SMTP.php';    
    
   $email =  $_POST['mail'];

   $query = 'SELECT * FROM `user` WHERE `mail`= "'.$email.'"';
        $data = mysqli_query($scon, $query);
        $result = array();
        while ($row = mysqli_fetch_assoc($data)){
                $result[] = ($row);
        }
        
    if (empty($result)) {
        $arr = [
            'success' => false,
            'message' => "mail khong chinh xac",
            'result' => $result
        ];
    } else {
        // print_r($result);
        $email=($result[0]["mail"]);
        $pass=($result[0]["password"]);

        $link="<a href='http://192.168.1.100/qlbhapp/reset_pass.php?key=".$email."&reset=".$pass."'>Click To Reset password</a>";
        // require_once('phpmail/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->CharSet =  "utf-8";
        $mail->IsSMTP();
        // enable SMTP authentication
        $mail->SMTPAuth = true;                  
        // GMAIL username
        $mail->Username = "nd98678@gmail.com";
        // GMAIL password
        $mail-> Password = "jaymqnznzefcgtju"; // pass của mail
        $mail-> SMTPSecure = "ssl";  
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "465";
        $mail->From = "nd986789@gmail.com"; // mail người nhận
        $mail->FromName = 'App bán hàng';
        $mail->AddAddress( $email, 'reciever_name');
        $mail->Subject  =  'Reset Password';
        $mail->IsHTML(true);
        $mail->Body = $link;
        if($mail->Send())
        {
            $arr = [
                'success' => true,
                'message' => "Vui long kiem tra mail",
                'result' => $result
            ];
        }
        else
        {
            $arr = [
                'success' => false,
                'message' => "Khong gui duoc mail",
                'result' => $result
            ];
        }
    }
    print_r(json_encode($arr));
?>
