<?php
function sendMail($de,$para,$nome,$telefone,$mensagem,$assunto){
  require_once('phpmailer/class.phpmailer.php');
  $mail = new PHPMailer(true);

  $mail->IsSMTP();
  try {
    $mail->SMTPAuth   = true;                 
    $mail->Host       = 'smtp.Sennatech.com.br';     
    /*$mail->SMTPSecure = "tls";                #remova se nao usar gmail
  $mail->Port       = 587;                  #remova se nao usar gmail*/
    $mail->Username   = 'luis.bispo@sennatech.com.br'; 
    $mail->Password   = 'Intcon@2001';
    $mail->AddAddress($para);
    $mail->AddReplyTo($de);
    $mail->SetFrom($de);
    $mail->Subject = $assunto;

            $body = "
            <meta charset='utf-8'>
            <div style='color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 12.8px; margin-bottom: 0pt;'>
               <p dir='ltr'><strong>De: </strong><i>{$de}</i></p>
               
               <p dir='ltr'><strong>Assunto: </strong><i>{$assunto}</i></p>

               <p dir='ltr'><strong>Nome: </strong><i>{$nome}</i></p>

               <p dir='ltr'><strong>Telefone: </strong><i>{$telefone}</i></p>

               <p dir='ltr'><strong>Mensagem: </strong></p>
               <p>{$mensagem}</p>
               
              <span style='font-size:10px'>Esse email é automatico por favor não responder.</span>
            </div>";


    
    $mail->MsgHTML($body);
    $mail->Send();     
    $envio = true;
  } catch (phpmailerException $e) {
    $envio = false;
  } catch (Exception $e) {
    $envio = false;
  }
  return $envio;
}
?>
