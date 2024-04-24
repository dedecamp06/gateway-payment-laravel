<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pagamento</title>
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
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
        }
        input, select {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #333;
            background: #333; 
            color: #fff; 
            width: calc(100% - 22px);
        }
        button {
            background-color: #32CD32;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #28a745; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulário de Pagamento</h1>
        <form action="/process-payment" method="post">
        @csrf
            <label for="amount">Valor:</label>
            <input type="number" id="amount" name="amount" required>

            <label for="paymentType">Tipo de pagamento:</label>
            <select id="paymentType" name="paymentType">
                <option value="boleto">Boleto</option>
                <option value="credit_card">Cartão de Crédito</option>
                <option value="pix">Pix</option>
            </select>

            <button type="submit">Pagar</button>
        </form>
    </div>
</body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</html>