<?php
// file: src/Controller/CustomersController.php

namespace App\Controller;
use Cake\ORM\TableRegistry;

class CustomersController extends AppController {

    public function index() {       
        $this->render('index');
    }

    public function search() {
        //if($this->request->is('get')) {
      
        $etsittavanimi = $this->request->getQuery('nimi');
        $etsittavatyyppi = $this->request->getQuery('tyyppikoodi');
   
       // echo $etsittavanimi;      
        //echo $etsittavatyyppi;
        

        $haku = $this->Customers
            ->find()
            ->where(['nimi' => $etsittavanimi, 'tyyppikoodi'=> $etsittavatyyppi])
            ->first();
           // ->all();

           //hakuehtojen tarkistus:
        if($haku) {
            /*
            echo "Löytyi! <br>";
            //$this->setAction('view', $haku);
            print_r('Haun tulos, nimi: ' . $haku['nimi'] . '<br>');
            print_r('Haun tulos, sposti: ' . $haku['sposti']. '<br>');
            print_r('Haun tulos, osoite: ' . $haku['osoite']);
    */
            $this->viewone($haku);  //lähetetään haun tulos viewone-functiolle - TOIMII!
            
            //$this->redirect(['action' => 'viewone', $haku]);
         }
        //  echo "Ei oo tommost asiakast.";
                  
        //} 
        //return $this->redirect(['action' => 'viewone', $haku]);
        //if($this->request->is('get')){
        //    $this->redirect(['action' => 'viewone', $haku]);
        //}          
 
        //$this->set(compact('customer')); //passing DB result to the template             
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
        //echo '<br> No nyt tultiin viewoneen <br>';
        //print_r('Haun tulos, sposti: ' . $loydetty['sposti']. '<br>');
          
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
}
?>