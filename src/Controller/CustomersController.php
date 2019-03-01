<?php
// file: src/Controller/CustomersController.php

namespace App\Controller;
use Cake\ORM\TableRegistry;

class CustomersController extends AppController {

    public function index() {
        //$customers = $this->Customers->find();
        //$this->set(compact('index'));

        //$this->viewBuilder()->setLayout('default');
        //die('näytä etusivu');
        $this->render('index');
    }

    public function search() {
      
        $etsittavanimi = $this->request->getQuery('nimi');
        $etsittavatyyppi = $this->request->getQuery('tyyppikoodi');
   
        echo $etsittavanimi;      
        echo $etsittavatyyppi;

        $haku = $this->Customers
            ->find()
            ->where(['nimi' => $etsittavanimi])
            ->first();
           // ->all();

            print_r($haku);
        print_r('Haun tulos: ' . $haku['nimi']);
        print_r('Haun tulos: ' . $haku['sposti']);
        print_r('Haun tulos: ' . $haku['osoite']);

        $this->element('cust_result', $haku);
             
        //return $this->redirect(['action' => 'viewone', $haku]);

        /* ao. ei toimi
        if($haku) {
            echo "Löytyi";
            //$this->setAction('view', $haku);
         } else {
            echo "Ei oo tommost asiakast.";
         }
 */


   
       
        //$haku = $this->Customers->hae($etsittavanimi, $etsittavatyyppi);
        
        // The 'pass' key is provided by CakePHP and contains all
    // the passed URL path segments in the request.
   //$tags = $this->request->getParam('pass');
    //echo $tags;

   // $customers_table = TableRegistry::get('customers');
          
          //  $customers = $customers_table->get($etsittavanimi, $etsittavatyyppi);

    /* Use the CustomersTable to find tagged customer.
    $asiakas = $this->Customers->find('', [
        'haku' => $etsittava
    ]);

    // Pass variables into the view template context.
    $this->set([
        'asiakkaat' => $asiakas,
        'haku' => $etsittava
    ]);
    */

/*
        if($this->request->is('get')){
            $asname = $this->request->getData('nimi');  
            $tyyppi = $this->request->getData('tyyppikoodi');
            echo ('asname on: ' .$asname);
            echo ('tyyppikoodi on: ' .$tyyppi);
            //
            $customers_table = TableRegistry::get('customers');
          
            $customers = $customers_table->get(1);
            //die();                      
         
            if($customers) {
            echo "Löytyi";
            //$this->setAction('view', $customers);
         } else {
            echo "Ei oo tommost asiakast.";
         }
        }
 */   


        /*kokeilu:
        $customer = $this->Customers
                ->find()
                ->where(['nimi' => 'Kaisa Kukkonen'])
                ->first();

            debug($customer);
            die();


        if ($this->request->is('get')) {
            // Get a single customer
            $etsittavanimi = $this->request->getData(['nimi']);
            $etsittavanimi2 = $this->request->getQueryParams(['nimi']);
            print_r('nimi on: ' . $etsittavanimi);
            print_r('getQueryParams antaa: ' . $etsittavanimi2);
            //$customer = $this->Customers->get($etsittava);

            $customer = $this->Customers
                ->find()
                ->where(['nimi' => $etsittavanimi])
                ->first();

            print_r('customer on: ' . $customer->osoite); 
               */
        
        //$customer = $this->Customers->findByName($nimi)->firstOrFail();
        //$this->set(compact('customer')); //passing DB result to the template

        // Kun search on tehty, näytä tulos view-sivulla:
        //$this->setAction('view');        
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
        $this->set($loydetty);
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
    

    public function edit($id) {
        //$customer = $this->Customers->findById($id)->firstOrFail();

        //vaihtoehtoisesti:
        $customer = $this->Customers->get($id);

        if ($this->request->is(['post', 'put'])) {
            $this->Customers->patchEntity($customer, $this->request->getData());
            if ($this->Customers->save($customer)) {
                $this->Flash->success(__('Asiakastiedot on nyt päivitetty.'));
                return $this->redirect(['action'=> 'view']);
            }
            $this->Flash->error(__('Päivitys EI onnistunut'));
        }
        $this->set('customer', $customer);
    }

    public function delete() {
        $this->request->allowMethod(['post', 'delete']);

        $customer = $this->Customers->get($id);  //miten saadaan id?

        if($this->Customers->delete($customer)) {
            $this->Flash->success(__('Asiakkaan tiedot poistettu.'));
            return $this->redirect(['action'=> 'index']); //paluu pääsivulle
        }
    }
}
?>