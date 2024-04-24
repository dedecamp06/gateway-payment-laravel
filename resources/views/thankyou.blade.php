<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Agradecimento</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000; 
            color: #fff; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #222; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.5); 
            width: 100%;
            max-width: 400px;
        }
        h1 {
            color: #00ff00; 
            text-align: center;
        }
        .link-boleto, .pix-details, .credit-card-details {
            margin-top: 20px;
            text-align: center;
        }
        a, p {
            color: #32CD32;
            text-decoration: none;
            text-align: center;
        }
        a:hover {
            text-decoration: underline;
        }
        img {
            margin-top: 10px;
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Obrigado pela sua operação!</h1>
        @if (session('paymentType') == 'BOLETO' && session('boletoUrl'))
            <div class="link-boleto">
                <p>Seu boleto está pronto para pagamento!</p>
                <a href="{{ session('boletoUrl') }}" target="_blank">Clique aqui para visualizar e imprimir seu boleto</a>
            </div>
        @elseif (session('paymentType') == 'PIX' && session('pixDetails'))
            <div class="pix-details">
                <p>Pagamento via PIX:</p>
                @if (session('pixDetails')['qrCodeImage'])
                    <img src="data:image/png;base64, {{ session('pixDetails')['qrCodeImage'] }}" alt="QR Code PIX">
                @else
                    <p>Código PIX não disponível ou não foi possível recuperar o QR Code.</p>
                @endif
            </div>
        @elseif (session('paymentType') == 'CREDIT_CARD' && session('transactionReceiptUrl'))
            <div class="credit-card-details">
                <p>Seu pagamento via cartão de crédito foi registrado. Você pode visualizar e imprimir seu recibo no link abaixo:</p>
                <a href="{{ session('transactionReceiptUrl') }}" target="_blank">Clique aqui para acessar o pagamento</a>
            </div>
        @else
            <p>Detalhes do seu pagamento estão sendo processados ou não estão disponíveis.</p>
        @endif
    </div>
</body>
</html>
