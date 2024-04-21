<?php
// Inclua o arquivo de autoload do TCPDF
require_once('tcpdf/tcpdf.php');

// Crie uma nova instância do TCPDF
$pdf = new TCPDF();

// Defina informações do documento
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Seu Nome');
$pdf->SetTitle('Confirmação de Adesão');
$pdf->SetSubject('Confirmação de Adesão');
$pdf->SetKeywords('Adesão, Confirmação');

// Defina o cabeçalho e rodapé
$pdf->setHeaderData('', PDF_HEADER_LOGO_WIDTH, 'Confirmação de Adesão', '');
$pdf->setFooterData(date('d/m/Y'), 0, 'Confirmação de Adesão', true, 'Confirmação de Adesão', [0, 0, 0]);


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


// Formatar a data de nascimento para o formato brasileiro
$data_nascimento_formatada = date('d/m/Y', strtotime($data_nascimento));

// Escrever os dados no PDF
$html = "
    <h1>Confirmação de Adesão</h1>    
    <h1>Dados do Contratante:</h1>
    <p><strong>Nome:</strong> $nome</p>
    <p><strong>Data de Nascimento:</strong> $data_nascimento_formatada</p>
    <p><strong>RG:</strong> $rg</p>
    <p><strong>CPF:</strong> $cpf</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Telefone:</strong> $telefone</p>
    <p><strong>Endereço:</strong> $endereco, $numero - $bairro</p>
    <p><strong>Cidade:</strong> $cidade</p>
    <p><strong>Estado:</strong> $estado</p>
    <p>Confirmação de Adesão ao produto funeral SindServ no valor de R$8,90 mensais a contar desta data.</p>
    <br>
    <p>Documento gerado em: " . date('d/m/Y') . "</p>
";
// Escrever HTML no PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Adicionar campo de assinatura
$pdf->SetLineStyle(array('width' => 0.5, 'color' => array(0, 0, 0)));
$pdf->Line(10, 250, 110, 250); // Linha horizontal

// Saída do PDF para o navegador
$pdf->Output('confirmacao_cadastro.pdf', 'I');
?>
