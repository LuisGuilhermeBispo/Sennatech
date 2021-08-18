<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* 
	Tested working with PHP5.4 and above (including PHP 7 )
 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;

$mAssunto = " - Trabalhe Aqui";
//$mAssunto = " - Trabalhe Conosco";

$pp = new FormHandler(); 
 
$validator = $pp->getValidator();
$validator->fields(['nome','email','telefone','nascimento','area','cargo'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
//$validator->field('mensagem')->maxLength(6000);

//SMTP --> Inicio 
$mailer = $pp->getMailer();
//SMTP --> Config
$mailer->IsSMTP();
$mailer->SMTPAuth   = true;
$mailer->SMTPSecure = 'tls'; // Protocolo de porta
$mailer->Port       = '587'; //  Usar a sua porta SMTP
$mailer->Host       = 'smtp.gmail.com';  //Servidor SMTP (Autenticação, use smtp.seudomínio.com.br)
$mailer->Username   = 'contato.Sennatech@gmail.com'; // Usuário do servidor SMTP (endereço de email)
$mailer->Password   = 'Sennatech#2021'; // Senha do servidor SMTP (senha do email usado)

$mailer->setFrom('contato@Sennatech.com.br', 'Sennatech'); // E-mail e Nome que o deseja representa-lo
//SMTP --> Final

$pp->Subject = "Trabalhe na Sennatech";

$pp->attachFiles(['image']);

$pp->sendEmailTo('contato@Sennatech.com.br'); // ← Troque o E-Mail Aqui // 

echo $pp->process($_POST);

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/* 
	Tested working with PHP5.4 and above (including PHP 7 )
 
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;

$mAssunto = " - Trabalhe Aqui";
//$mAssunto = " - Trabalhe Conosco";

$pp = new FormHandler(); 
 
$validator = $pp->getValidator();
$validator->fields(['nome','email','telefone','nascimento','area','cargo'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
//$validator->field('mensagem')->maxLength(6000);

//SMTP --> Inicio 
$mailer = $pp->getMailer();
//SMTP --> Config
$mailer->IsSMTP();
$mailer->SMTPAuth   = true;
$mailer->SMTPSecure = 'tls'; // Protocolo de porta
$mailer->Port       = '587'; //  Usar a sua porta SMTP
$mailer->Host       = 'smtp.Sennatech.com.br';  //Servidor SMTP (Autenticação, use smtp.seudomínio.com.br)
$mailer->Username   = 'luis.bispo@Sennatech.com.br'; // Usuário do servidor SMTP (endereço de email)
$mailer->Password   = 'Sennatech#2021'; // Senha do servidor SMTP (senha do email usado)

$mailer->setFrom(['luis.bispo@Sennatech.com.br', 'Eric']); // E-mail e Nome que o deseja representa-lo
//SMTP --> Final


$pp->Subject = "Form - Trabalhe na Sennatech";

$pp->attachFiles(['image']);

$pp->sendEmailTo('luis.bispo@Sennatech.com.br'); // ← Troque o E-Mail Aqui // 

echo $pp->process($_POST); */