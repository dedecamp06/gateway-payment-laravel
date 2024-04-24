<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Services\AsaasService;

class PaymentController extends Controller
{
    protected $asaasService;
    public function __construct(AsaasService $asaasService)
    {
        $this->asaasService = $asaasService;
    }

    public function createCustomer(Request $request)
    {

        $data = $request->only([
            'name',
            'email',
            'phone',
            'cpfCnpj',
            'postalCode',
            'address',
            'addressNumber',
            'complement',
            'province',
            'externalReference',
            'notificationDisabled'
        ]);

        $customerResult = $this->asaasService->createCustomerService($data);

        if (isset($customerResult['id'])) {
            session(['customer_id' => $customerResult['id']]);
            return redirect('/payment')->with('success', 'Usuário criado com sucesso. ID: ' . $customerResult['id']);
        } else {
            return back()->withErrors(['error' => 'Erro ao criar o usuário: ' . $customerResult['errors'][0]['description']]);
        }

    }

    public function processPayment(PaymentRequest $request)
    {
        
        $customerId = session('customer_id');
        if (empty($customerId)) {
            return redirect('/create-customer')->withErrors(['error' => 'Por favor, crie um cliente antes de tentar realizar um pagamento.']);
        }

        $validated = $request->validated();

        $paymentResult = $this->asaasService->createPaymentService([
            'customer' => $customerId,
            'billingType' => $validated['paymentType'],
            'value' => $validated['amount'],
            'dueDate' => '2024-12-30',
        ]);

        if (isset($paymentResult['id'])) {
            \Log::error('Error:', ['paymnetresuult' => $paymentResult]);
            return $this->redirectToThankYou($paymentResult);
        } else {
            return back()->withErrors(['error' => 'Erro ao criar o pagamento: ' . $paymentResult['errors'][0]['description']]);
        }
    }

    public function redirectToThankYou($paymentResult)
    {
        session(['paymentType' => $paymentResult['billingType']]);

        switch ($paymentResult['billingType']) {
            case 'PIX':
                if (isset($paymentResult['id'])) {
                    $pixQrCodeResponse = $this->asaasService->getPixQrCode($paymentResult['id']);
                    if ($pixQrCodeResponse && $pixQrCodeResponse['success']) {
                        session([
                            'pixDetails' => [
                                'qrCodeImage' => $pixQrCodeResponse['encodedImage'],
                                'qrCodePayload' => $pixQrCodeResponse['payload']
                            ]
                        ]);
                    } else {
                        session(['pixDetails' => null]);
                    }
                } else {
                    session(['pixDetails' => null]);
                }
                break;
            case 'BOLETO':
                session(['boletoUrl' => data_get($paymentResult, 'bankSlipUrl', 'URL do boleto não disponível')]);
                break;
            case 'CREDIT_CARD':
                session(['transactionReceiptUrl' => $paymentResult['invoiceUrl'] ?? 'URL do recibo não disponível']);
                break;
        }
        return redirect('/thankYou')->with('success', 'Pagamento criado com sucesso.');
    }
}
