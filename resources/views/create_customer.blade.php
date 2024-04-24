<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Cliente</title>
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
        <h1>Criar Cliente</h1>
        <form method="POST" action="{{ route('create.customer') }}">
            @csrf
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Telefone:</label>
            <input type="text" id="phone" name="phone" required>

            <label for="cpfCnpj">CPF/CNPJ:</label>
            <input type="text" id="cpfCnpj" name="cpfCnpj" required>

            <label for="postalCode">CEP:</label>
            <input type="text" id="postalCode" name="postalCode">

            <label for="address">Endereço:</label>
            <input type="text" id="address" name="address">

            <label for="addressNumber">Número:</label>
            <input type="text" id="addressNumber" name="addressNumber">

            <label for="complement">Complemento:</label>
            <input type="text" id="complement" name="complement">

            <label for="province">Bairro:</label>
            <input type="text" id="province" name="province">

            <label for="externalReference">Referência Externa:</label>
            <input type="text" id="externalReference" name="externalReference">

            <label for="notificationDisabled">Desabilitar Notificação:</label>
            <input type="checkbox" id="notificationDisabled" name="notificationDisabled" value="true">

            <button type="submit">Criar Cliente</button>
        </form>
    </div>
</body>
@if ($errors->any())
    <div style="color: red; background-color: #333; padding: 10px; border-radius: 4px; margin: 20px; width: 90%; max-width: 350px; text-align: center; position: fixed; top: 5px; left: 50%; transform: translateX(-50%);">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</html>