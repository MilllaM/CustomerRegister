<!-- file: src/Template/Customers/search.ctp -->

<h1>Etsi asiakas</h1>
<?php
echo $this->Form->create("", ['type' => 'get', 'autocomplete' => 'off']);
/*
echo $this->Form->control('nimi', array(
    'type' => 'text',
    'class' => 'form-control',
    'id' => 'asiakas-select2',
    'placeholder' => 'asiakkaan nimi'
));

echo $this->Form->select('asiakas-select2', ['id' => 'asiakas-select2'] );
echo '<br>';
*/
echo '<input id="asiakas-select2" type="text" placeholder="anna nimi" style="width: 50%"></input>';
echo '<br>';
//echo '<select id="asiakas-select2" type="text" placeholder="anna nimi" style="width: 50%"></select>';

/*
echo $this->Form->radio('tyyppikoodi', 
['10'=>'yritysasiakas', '20'=>'yksityisasiakas'],
['label'=> 'Asiakastyyppi'] 
);
*/
echo $this->Form->button('Etsi tämä asiakas', ['type' => 'submit', 'class'=> 'btn btn-primary btn-lg']);

echo $this->Form->end();  //closes the form

?>

<div class="hakutulos"></div>

<script>
    $(document).ready(function(){
        /*
        $('#asiakas-select2').select2({
            placeholder: 'anna etsittävä nimi',
            allowClear: true,
            minimumInputLength: 1,
            query: function (options) {
                var data = {results: []};
            }
            $.ajax({ 
                type: "GET",               
                url : '<?php echo $this->Url->build( ['controller' => 'Customers', 'action' => 'search2'] ); ?>',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: params.term  //search term
                    };
                }
                .done(function(response) {
                    if (!$.isEmptyObject(response)) {                   
                        data.results = response;
                        options.callback(data);
                    } else {
                        options.callback(data);
                    } //END if                    
                });  //END .done                    
                 
            }); //END .ajax
            
        }); //END .select2
    }); //END  
    */

    /*
        $('#asiakas-select2').select2({
            placeholder: "Etsi asiakas nimellä",
            minimumInputLength: 1,
            ajax: {
                url: '<?php echo $this->Url->build( ['controller' => 'Customers', 'action' => 'search2'] ); ?>',
                dataType: 'json',
                data: function (term, page) {
                    return { q: term };
                },
                results: function (data, page) {
                    return { results: data };
                }
            }
    }); 
    */

    
        $('#asiakas-select2').select2({
            placeholder: "Etsi asiakas nimellä", //ok
            minimumInputLength: 1,
            ajax: {
                type: "GET",
                url:  "<?php echo $this->Url->build( [ 'controller' => 'Customers', 'action' => 'search2' ] ); ?>",
                dataType: 'json',
                data: function (params) { //params = the object containing the parameters used to generate the request.
                    var queryParameters = {
                        search: params.term // search term
                    }
                    //console.log(queryParameters);
                    return queryParameters; //returns Data to be directly passed into the request
                },
                processResults: function (data) {
                    return {
                        results: data.items
                    };
                }                
            }
            //templateResult: formatRepo
        });

        function formatRepo (repo) {
            if (repo.loading) {
                console.log(repo.text);
                return repo.text;
            }
        }
/*

            var searchkey = $(this).val();
            searchCustomers( searchkey );
         });
         
        function searchCustomers( keyword ){
        var data = keyword;
        $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Customers', 'action' => 'search2' ] ); ?>",
                    data: {keyword:data},
                    success: function( response )
                    {       
                       $('.hakutulos').html(response);
                    }
                });
        };
        */
    

});


    
</script>
    