<?php

namespace App\Http\Controllers;

use App\Factories\PaymentFactory;
use App\Repositories\PaymentRepository;

class PaymentController extends Controller
{
    private $paymentRepository;
    private $paymentFactory;

    public function __construct(PaymentRepository $paymentRepository, PaymentFactory $paymentFactory)
    {
        $this->paymentRepository = $paymentRepository;
        $this->paymentFactory = $paymentFactory;
    }

    public function add()
    {
        $paymentInstance = $this->paymentFactory->createInstance(request()->input('products_ids'));
        $payment = $this->paymentRepository->save($paymentInstance);

        return response()->json($payment);
    }
}
