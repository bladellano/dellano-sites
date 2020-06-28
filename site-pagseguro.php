<?php

use \Sts\PagSeguro;
use \Sts\MailNative;
use \Sts\Page;

$app->get('/pedido/:codigo', function ($codigo) {
    echo "CODIGO: " . $codigo;
    exit;
});

$app->get('/retornopagamento', function () {
    $transactionId = str_replace("-","",$_GET['transaction_id']);
    header("Location: /getstatusbycode?code={$transactionId}");
    exit;   
});

$app->get('/getstatusbycode',function(){

    $code = $_GET['code'];
    $PagSeguro = new PagSeguro();
    $result = current($PagSeguro->getStatusByCode($code));
    $textStatus = $PagSeguro->getStatusText((int)$result);
    $aResult = ['codeStatus'=> $result , 'textStatus'=>$textStatus];
    $page = new Page();
    $page->setTpl("return-sale", [
        'data'=>$aResult
    ]);
});
/*
$app->get('/getstatus',function(){

    if(isset($_GET['reference'])){
		$PagSeguro = new PagSeguro();
		$P = $PagSeguro->getStatusByReference($_GET['reference']);
		echo $PagSeguro->getStatusText($P->status);
	}else{
	    echo "Parâmetro \"reference\" não informado!";
    }
    exit;
});
*/
$app->get('/checkout/100', function () {
    header("access-control-allow-origin: https://pagseguro.uol.com.br");
    header("Content-Type: text/html; charset=UTF-8", true);
    date_default_timezone_set('America/Sao_Paulo');

    $PagSeguro = new PagSeguro();
    #Efetuar pagamento	
    $order = array(
        "codigo" => 'REF'.mt_rand(12, 1500),
        //Dados do produto
        "cod_produto" => "0001",
        "quantidade" => 1,
        "valor" => 100.00,
        "descricao" => "Plano Básico - Redes Sociais",
        //Dados do cliente
        "nome" => "Emanuelle Figueiredo da Silva",
        "email" => "bladellano@yahoo.com.br",
        "telefone" => "(91) 98010-4721",
        "rua" => "Rua Dois de Junho, Trav J",
        "numero" => "01",
        "bairro" => "Águas Brancas",
        "cidade" => "Ananindeua",
        "estado" => "PA",
        "cep" => "67.033-160",
        "codigo_pagseguro" => ""
    );

    $PagSeguro->executeCheckout($order, "https://dellanosites.local.com/pedido/");
    #$PagSeguro->executeCheckout($order, "https://dellanosites.local.com/pedido/" . $_GET['codigo']);
    #Receber retorno
    if (isset($_GET['transaction_id'])) {

        $pagamento = $PagSeguro->getStatusByReference($_GET['codigo']);

        $pagamento->codigo_pagseguro = $_GET['transaction_id'];
        if ($pagamento->status == 3 || $pagamento->status == 4) {
            //Atualizar dados da venda, como data do pagamento e status do pagamento
            die('ATUALIZAR DADOS_LINHA_58');
        } else {
            //Atualizar na base de dados
        }
    }
});

/////////////PAGSEGURO ENVIA NOTIFICAÇÃO DO ANDAMENTO DE UMA VENDA/////////////
$app->post('/pagseguro/notificacao', function () {  
    
    header("access-control-allow-origin: https://pagseguro.uol.com.br");

    $emailOwner = "caio@dellanosites.com.br";
    $oMail = new MailNative($emailOwner,"pagseguro@pagseguro.com.br","RETORNO PAGSEGURO");

    if (isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction') {
        $PagSeguro = new PagSeguro();
        $response = $PagSeguro->executeNotification($_POST);
        if ($response->status == 3 || $response->status == 4) {

            /*ENVIANDO EMAIL PARA AVISAR*/
            $oMail->setBody("<h3>RETORNO PAGSEGURO - PAGAMENTO CONFIRMADO OU LIBERADO</h3>");
            $oMail->send();

            die('PAGAMENTO CONFIRMADO OU LIBERADO');
            #ATUALIZAR O STATUS NO BANCO DE DADOS

        } else {
            $oMail->setBody("<h3>RETORNO PAGSEGURO - PENDENTE OU CANCELADO</h3>");
            $oMail->send();

            die('PAGAMENTO PENDENTE OU CANCELADO');
        }
    }
});
