<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\I18n;

class PaymentsController extends AppController
{


    /**
     * Display all payments.
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('Payments');

        $this->paginate = [
            'maxLimit' => 15
        ];

        $payments = $this->Payments
            ->find()
            ->order([
                'Payments.created' => 'desc'
            ]);

        $payments = $this->paginate($payments);

        $this->set(compact('payments'));
    }

    /**
     * Edit a Payment.
     *
     * @return \Cake\Network\Response|void
     */
    public function edit()
    {
        $this->loadModel('Payments');

        $payment = $this->Payments
            ->find('all')
            ->where([
                'Payments.id' => $this->request->id
            ])
            ->first();

        //Check if the payment is found.
        if (empty($payment)) {
            $this->Flash->error('This payment doesn\'t exist or has been deleted.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is('put')) {
            $this->Payments->patchEntity($payment, $this->request->data());
            if ($this->Payments->save($payment)) {
                $this->Flash->success('This payment has been updated successfully !');
                return $this->redirect(['action' => 'index']);
            }
        }

        $this->set(compact('payment'));
    }

}
