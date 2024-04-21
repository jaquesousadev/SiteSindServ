<?php
// Inclua o arquivo de autoload do TCPDF
require_once('tcpdf/tcpdf.php');

// Crie uma nova instância do TCPDF
$pdf = new TCPDF();

// Defina informações do documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Confirmação de Cadastro');
$pdf->SetSubject('Confirmação de Cadastro');
$pdf->SetKeywords('Cadastro, Confirmação');

// Defina o cabeçalho e rodapé
$pdf->setHeaderData('', PDF_HEADER_LOGO_WIDTH, 'Confirmação de Cadastro', '');

// Defina o nome do arquivo de saída
$filename = 'confirmacao_cadastro.pdf';

// Defina o tamanho da fonte
$pdf->SetFont('helvetica', '', 12);

// Adicione uma nova página
$pdf->AddPage();

// Coletar dados do formulário
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

// Escrever os dados no PDF
$html = "
    <h1>Confirmação de Cadastro</h1>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Data de Nascimento:</strong> $data_nascimento</p>
    <p><strong>RG:</strong> $rg</p>
    <p><strong>CPF:</strong> $cpf</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Telefone:</strong> $telefone</p>
    <p><strong>Endereço:</strong> $endereco, $numero - $bairro</p>
    <p><strong>Cidade:</strong> $cidade</p>
    <p><strong>Estado:</strong> $estado</p>
";

$pdf->writeHTML($html, true, false, true, false, '');

// Saída do PDF para o navegador
$pdf->Output('confirmacao_cadastro.pdf', 'I');
