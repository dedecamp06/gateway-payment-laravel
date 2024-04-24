
## Pré-requisitos
- PHP.
- Laravel.
- Composer

## Instalação

- No terminal, navegue até o diretório do projeto e execute: 
```bash
  composer install
```

- Insira a chave da API do Gateway no campo ASAAS_API_KEY. Caso não possua uma, utilize a chave de exemplo fornecida no .env.example.

- Inicie o servidor local com o comando:

```bash
  php artisan serve
  ```
- Acesse o projeto através da URL http://localhost:8000. A rota principal (/) é destinada à criação de clientes. Use um CPF válido, que pode ser gerado em Gerador de CPF (https://www.4devs.com.br/gerador_de_cpf).

- Criação de Cliente:
Após acessar a rota principal e inserir um CPF válido, o cliente será criado.

- Pagamento:
Você será redirecionado para a página de pagamento, onde poderá escolher entre três métodos de pagamento: boleto, cartão de crédito ou pix.
Não é necessário criar um usuário para cada transação. Simplesmente volte à página de pagamento para realizar uma nova transação.

- Suporte
Em caso de dúvidas ou problemas, estou à disposição por email (pedrosouza-developer@hotmail.com) ou WhatsApp (31 99111-2008).


![image](https://github.com/dedecamp06/gateway-payment-laravel/assets/16025244/8bc82f10-5c02-4e65-ba2e-aed2d7aa2d6f)


![image](https://github.com/dedecamp06/gateway-payment-laravel/assets/16025244/b8fa60de-eecc-449d-95bd-0b21b17f6c62)


![image](https://github.com/dedecamp06/gateway-payment-laravel/assets/16025244/9d9ec598-fa7e-435a-8ccd-73feb36d1c1d)


![image](https://github.com/dedecamp06/gateway-payment-laravel/assets/16025244/d9277cc0-a156-492b-8529-400b01344e65)


![image](https://github.com/dedecamp06/gateway-payment-laravel/assets/16025244/63259041-8c1e-4401-bbe0-873114a61f39)

