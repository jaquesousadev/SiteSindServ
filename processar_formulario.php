<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Coletar os dados do formulário
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['datansc'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // Configurar o email
    $to = $email;
    $subject = "Confirmação de adesão";
    $message = "Olá $nome,\n\nObrigado por se cadastrar!\n\nDetalhes do cadastro:\nNome: $nome\nData de nascimento: $data_nascimento\nRG: $rg\nCPF: $cpf\nEmail: $email\nTelefone: $telefone\nEndereço: $endereco\nNúmero: $numero\nBairro: $bairro\nCidade: $cidade\nEstado: $estado";
    $headers = "From: jaquelinesousaf@gmail.com";

    // Enviar o email
    mail($to, $subject, $message, $headers);

    // Redirecionar de volta para a página do formulário
    header('Location: confirmacao.html');
    exit;
}
?>