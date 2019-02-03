<?php

    require_once ("PHPMailer/PHPMailerAutoload.php");
    $ok = "";

    if(isset($_POST["email"])){
        
        $assunto = "Fada Madrinha Pet";
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $mensagem = $_POST["mens"];
            
     
        $phpmail = new PHPMailer(); // Instânciamos a classe PHPmailer para poder utiliza-la          
        $phpmail->isSMTP(); // envia por SMTP
        
        $phpmail->SMTPDebug = 0;
        $phpmail->Debugoutput = 'html';
        
        $phpmail->Host = "smtp.gmail.com"; // SMTP servidor de envio         
        $phpmail->Port = 587; // Porta SMTP do GMAIL
        
        //$phpmail->SMTPSecure = 'tls';
        $phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação   
        
        $phpmail->Username = "programador.web.smp@gmail.com"; // SMTP e-mail de envio         
        $phpmail->Password = "Senac@2019"; // SMTP senha          
        $phpmail->IsHTML(true);         
        
        $phpmail->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  
                 
        $phpmail->addAddress("programador.web.smp@gmail.com", "Sistema Web - Fada Madrinha Pet");// E-mail do destinatario/*  
        
        $phpmail->Subject = $assunto; // Assunto do remetende enviado pelo method post
                
        $phpmail->msgHTML(" Nome: $nome <br>
                            E-mail: $email <br>
                            Mensagem: $mensagem");
        
        $phpmail->AlrBody = "Nome: $nome \n
                            E-mail: $email \n
                            Mensagem: $mensagem";
            
        if($phpmail->send()){
            echo "<script>alert('Dados Salvos com sucesso!');</script>";
            echo "A Mensagem foi enviada com sucesso.";
            $ok = "OK";
        }else{
            echo "Não foi possível enviar a mensagem. Erro: " .$phpmail->ErrorInfo;
        }
         
        
        // ############## RESPOSTA AUTOMATICA
        $phpmailResposta = new PHPMailer();        
        $phpmailResposta->isSMTP();
        
        $phpmailResposta->SMTPDebug = 0;
        $phpmailResposta->Debugoutput = 'html';
        
        $phpmailResposta->Host = "smtp.gmail.com";         
        $phpmailResposta->Port = 587;
        
        $phpmailResposta->SMTPSecure = 'tls';
        $phpmailResposta->SMTPAuth = true;   
        
        $phpmailResposta->Username = "programador.web.smp@gmail.com";         
        $phpmailResposta->Password = "Senac@2019";          
        $phpmailResposta->IsHTML(true);         
        
        $phpmailResposta->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  
                 
        $phpmailResposta->addAddress($email, "Sistema Web - Fada Madrinha Pet");// E-mail do destinatario/*  
        
        $phpmailResposta->Subject = "Restosta - " .$assunto; // Assunto do remetende enviado pelo method post
                
        $phpmailResposta->msgHTML(" Nome: $nome <br>
                            Em breve daremos o retorno");
        
        $phpmailResposta->AlrBody = "Nome: $nome \n
                            Em breve daremos o retorno";
            
        $phpmailResposta->send();
        
    } // FECHAR O IF

    
?>