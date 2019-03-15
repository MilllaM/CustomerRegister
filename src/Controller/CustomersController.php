<?php
// file: src/Controller/CustomersController.php

namespace App\Controller;
use Cake\ORM\TableRegistry;
	
use Setasign\tFpdf;

class CustomersController extends AppController {

    public function index() {       
        $this->render('index');
    }


    public function viewAll() { //view all
        $customers = $this->Customers->find(); //testaa find('all') - onko eroa?
        $this->set(compact('customers'));  //passing DB result (from the model) to the template        
    }


    public function view($nimi) { //view just one
        $customers = $this->Customers->find('all'); 
        $customer = $this->Customers->get($nimi);        
        
        if (!$nimi) {
            throw new NotFoundException(__('Ei löydy'));
        }
              
        $this->set(compact('customers', 'customer'));  //passing DB result (from the model) to the template  
    }


    public function viewone($loydetty) {            
        $this->set('loydetty', $loydetty);
        $this->render('viewone');  
    }


    public function add() {
        $customer = $this->Customers->newEntity();

        if ($this->request->is('post')) { //checks the request method            
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());          
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('Uusi asiakas on nyt lisätty.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Asiakkaan lisäys EI onnistunut.'));
        }
        $this->set('customer', $customer);
    }
    

    public function edit($id=null) {      
        $customer = $this->Customers->get($id, [
            'contain'=>[]
            ]);

        if ($this->request->is(['post', 'put'])) {
            $customer = $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('Asiakastiedot on nyt päivitetty.'));
                //return $this->redirect(['action'=> 'view']); TÄÄ TOIMII
                
                return $this->redirect(['action'=> 'view', $id]);
            }
            $this->Flash->error(__('Päivitys EI onnistunut'));
        }
        $this->set(compact('customer'));
    }


    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $customer = $this->Customers->get($id);  //miten saadaan id?

        if($this->Customers->delete($customer)) {
            $this->Flash->success(__('Asiakkaan tiedot poistettu.'));
            return $this->redirect(['action'=> 'index']); //paluu pääsivulle
        }
    }
    

    public function search() {
        if($this->request->is('get')) {      
            $etsittavanimi = $this->request->getQuery('nimi');
            $etsittavatyyppi = $this->request->getQuery('tyyppikoodi');
          
            $haku = $this->Customers
                ->find()
                ->where(['nimi' => $etsittavanimi, 'tyyppikoodi'=> $etsittavatyyppi])
                ->first();
            // ->all();

           //hakuehtojen tarkistus:
            if($haku) {   
                $this->viewone($haku);  //lähetetään haun tulos viewone-functiolle - TOIMII!                        
            } else {           
                $this->Flash->error('Ei oo tommost asiakast.');
            }
        } //END if
        //$this->set(compact('customer')); //passing DB result to the template             
    }


    public function hae() {        
        if ($this->request->is(['post', 'put'])) {
            $etsittavanimi = $this->request->getData('nimi');
            $etsittavatyyppi = $this->request->getData('tyyppikoodi');
           
            $haku = $this->Customers
            ->find()
            ->where(['nimi' => $etsittavanimi, 'tyyppikoodi'=> $etsittavatyyppi])
            ->first();

            //tee elementti ctp-sivulle, ja vie hakutulos siihen
            $this->set('haku', $haku);    
        }
        
    }

   


    public function teefilu($id) {
               
        $haettava = $this->Customers->get($id);

        $pdf = new \tFPDF();
        $pdf->AddPage();
        //$pdf->SetFont('Arial','B',16);
        $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $pdf->SetFont('DejaVu','',16);
    
        $pdf->Cell(60,30, $haettava['nimi']);
        $pdf->Ln(30);
        $pdf->SetFont('DejaVu','',12);
        $pdf->Cell(60,20, 'Sposti: ' .$haettava['sposti']);
        $pdf->Ln(10);
        $pdf->Cell(60,20, 'Puhelin: ' .$haettava['puhelin']);
        $pdf->Ln(10);
        $pdf->Cell(60,20,'Osoite: '.$haettava['osoite']);
        $pdf->Ln(10);
        $pdf->Cell(60,20, 'Rekisterissä ' .date('d/m/Y', strtotime($haettava['created'])) . ' alkaen');
 
        $pdf->Ln(10);
        $pdf->Cell(60,20, 'Viimeisin muokkaus: ' . date('d/m/Y', strtotime($haettava['modified'])));


        $pdf->Output();
        exit;

    }

    public function autoComplete() {
        $this->autoRender = false;
        $customers = $this->Customer->find('all', array(
            'conditions' => array(
            'Customer.nimi LIKE' => '%' . $_GET['term'] . '%',
            )));
        echo json_encode($this->_encode($customers));
    }

    public function select2haku() {
        //$this->Customer->recursive = 0; //mitä recursive tekee?
        //$this->set('customers');
    }

    public function search2() {
        $this->autoRender = false;
        echo('Kiekuu');
        $term = $this->request->query['q'];  // get the search term from URL
        echo('Kukkuu');
        echo $term;
        //die();
        $customers = $this->Customer->find('all', array(  //db query
            'conditions' => array(
                'Customer.nimi LIKE' => '%'.$term.'%'
            )
        ));
        // Format the result for select2
        $result = array();
        foreach($customers as $key => $customer) {
            $result[$key]['id'] = (int) $customer['Customer']['id'];
            $result[$key]['text'] = $customer['Customer']['nimi'];
        }
        $customers = $result;
        //echo $customers;
        
        echo json_encode($customers);
    }
}
?>