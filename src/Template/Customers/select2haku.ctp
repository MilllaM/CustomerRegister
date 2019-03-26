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
//echo '<input id="asiakas-select2" type="text" placeholder="anna nimi" style="width: 50%"></input>';
echo '<br>';
echo '<select id="asiakas-select2" type="text" placeholder="anna nimi" style="width: 50%;"></select>';

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


/*

        //SELECT2 -osio    
        $('#asiakas-select2').select2({
            placeholder: "Etsi asiakkaan nimellä", //ok
            minimumInputLength: 1,
            ajax: {
                type: "GET",
                url:  "<?php echo $this->Url->build( [ 'controller' => 'Customers', 'action' => 'search2' ] ); ?>",
                //url:  "/customers/search2",
                dataType: 'json',
                
                data: function (params) { //params = the object containing the parameters used to generate the request.
                    var queryParameters = {
                        search: params.term // search term
                    }
                    console.log(queryParameters);  //ei printtaannu 
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
*/

/*
//Ollin koodi
$('#asiakas-select2').select2({
	  placeholder: '',
	  minimumInputLength: 1,
	  allowClear: true,
	  query: function (options) {
	    var data = { results: [] };
	    console.log(options.term+';'+$('#asiakas-select2').val());
	    
	    //Ollaanko hakemassa puhdasrotuisia vai risteytyksiä
	    $.ajax({
	      type: "GET",
	      dataType: 'json',
	      global: false,
          //url: "/jalostustodistus/elossa_olevat_haku",
          url:  "<?php echo $this->Url->build( [ 'controller' => 'Customers', 'action' => 'search2' ] ); ?>",
          
	      data: { q: options.term }
	    })
	    .done(function(response) {
	      console.log('response: '+JSON.stringify(response)+', '+typeof response); // @DEBUG OK!!
	      
	      if ( ! $.isEmptyObject(response)) {
	        data.results = response;
	        options.callback(data);
	      
	      } else {
	        options.callback(data);
	      }// End if
	    });// End $.ajax 
	  }
	});//End function


*/


//koodi Selectin sivulta:
$("#asiakas-select2").select2({
  ajax: {
    //url: "https://api.github.com/search/repositories",
   // url: "<?php echo $this->Url->build( [ 'controller' => 'Customers', 'action' => 'search2' ] ); ?>",
    //url: "customers/search2",
    url: "customers/search2",
    dataType: 'json',
    delay: 250,
    data: function (params) {
      console.log(params);        
      return {
        q: params.term, // search term, given by the user
        //page: params.page
      };
    },
 /*
    processResults: function (data, params) {
      // parse the results into the format expected by Select2
      // since we are using custom formatting functions we do not need to
      // alter the remote JSON data, except to indicate that infinite
      // scrolling can be used
    params.page = params.page || 1;
    console.log(data.items);

      return {
        results: data.items     
      };
    }, */
    cache: true,
    results: function (data) {
      console.log(data);
        return { results: data };
      }
  },
  placeholder: 'Search for a customer, eiku repo',
  //escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
  minimumInputLength: 1,
  //templateResult: formatRepo,
  //templateSelection: formatRepoSelection
});

function formatRepo (repo) {
  if (repo.loading) {
    //return repo.text;
    return repo.text;
  }

  //var markup = "<div class='select2-result-repository clearfix'>" +    
  //  "<div class='select2-result-repository__meta'>" +
  //    "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
      var markup = "<div class='select2-result-repository clearfix'>" +    
    "<div class='select2-result-repository__meta'>" +
      "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

  if (repo.description) {
    markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
  }

  markup += "<div class='select2-result-repository__statistics'>" +    
  "</div>" +
  "</div></div>";

  return markup;
}

function formatRepoSelection (repo) {
  return repo.full_name || repo.text;
}
    

});


    
</script>
    