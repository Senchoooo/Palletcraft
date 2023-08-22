<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
  <script>
					function text(x) {
						if (x == 0) document.getElementById("mycode").style.display = "block";
						else document.getElementById("mycode").style.display = "none";
						return;
					}
				</script>
		
       

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	

	<?php include 'includes/navbar.php'; ?>


	<form method="POST" action="sales.php">

	<?php
		
	function createRandomPassword() {
					$chars = "abcdefghijkmnopqrstuvwxyz023456789";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 7) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
				$confirmation = createRandomPassword1();
				
					function createRandomPassword1() {
					$chars = "ABCDEFGHIJKLNOPQRSTUVWXYZ1234567";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 7) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
				$confirmation1 = createRandomPassword1();
				
				
		?>

	 
	  <div class="content-wrapper" style="background-color: #ebe9e8;">
	    <div class="container" >

	      <!-- Main content -->
	      <section class="content" >
	        <div class="row">
	        	<div class="col-sm-6">
	        				<a type="button" class='btn btn-primary btn-md' href="cart_view.php">Go Back</a>
	        			<div>
	        				<div class="card-body"></div>
            <h3 class="text-center"><b>Checkout</b></h3>
            <hr class="border-dark">	        				

		            		</div>		
            
             <h3><b>Transaction Number:</b></h3>
                 <input type="confirmation" id="confirmation" name="confirmation" style="width:50%;" class="form-control form-control-sm rounded-0" value=<?php echo $confirmation; ?> readonly>

				<?php
				
						if(isset($_SESSION['user'])){
							$conn = $pdo->open();
							
							$total = 0;
							$pallettotal = 0;
							$stmt = $conn->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id=:user");
								$stmt->execute(['user'=>$user['id']]);
			foreach($stmt as $row){
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$subtotal = $row['price']*$row['quantity'];
				$total += $subtotal;
				$pallet = $row['pallet_quantity']*$row['quantity'];
				$pallettotal += $pallet;
				

				echo "
					<input type='hidden' value='pallet' name='palletwood'>
					<input type='hidden' value='".$pallettotal."' name='pallettotal'>
					
						<h4>".$row['name']."</h4>
						<img src='".$image."' width='200px' height='200px'><h4>Quantity: ".$row['quantity']."</h4>
						
				";
			}

							$pdo->close();

						} 
					?>	
           
        
    
						<br>
            <br>
	        	</div>
	        	 	<div class="col-sm-6">
	        	 		<br>
            <br>
            <br>
            <br>
            <br>
            
     	<h3><b>Order type:</b></h3>

				  <div class="col-2" style="text-align:center;">
					<div class="input-group">
						 <div class="form-group col mb-0">
                    <!--  <h3 class="text-center"><b>Order type</b></h3> -->
                    </div>
						<div class="p-t-10">

							<label  class="form-check-label">
								<input style="display: none;" type="radio" name="ordertype" class="form-control form-control-sm rounded-0" value="delivery" onclick="text(0)" checked />
								<span  class="form-control form-control-sm rounded-0" style="border: px solid; width: 100%;  height: 25px; font-size: 9pt; overflow: hidden; text-align: center;">Delivery</span>
							</label>
							<label  class="form-check-label">
								<input style="display: none;" type="radio" name="ordertype" class="form-control form-control-sm rounded-0" value="pickup" onclick="text(1)" />
								<span  class="form-control form-control-sm rounded-0" style="border: 1px solid #ccc; width: 70px; height: 25px;  overflow: hidden;  text-align: center; font-size: 9pt;  top: 50%; margin-top: -7.5px;">Pick Up</span>
								
							</label>
							
						</div>
						
					</div>
					
				</div>
				  
				  	<div  id="mycode">
				  		        
                    
                    <label>Province</label>
                    <select id="province" name="province" style="width:50%;" class="form-control form-control-sm rounded-0"></select>
                    <label>City</label>
                    <select id="city" name="city" style="width:50%;" class="form-control form-control-sm rounded-0"></select>
                    <label>Barangay</label>
                    <select id="barangay" name="barangay" style="width:50%;" class="form-control form-control-sm rounded-0"></select>


   
			  		
				  	</div>
				<hr class="border-dark">
						 <div class="col">
						 	
                            <input type="hidden" name="total_amount" id="total_amount"> 
					                                <h3><b>Total: &#8369; <?= number_format($total,2) ?></b></h3>
							
                        </div>
					
                 <br>

                
               

        
	        					
	        					 <button type="submit" name="submit" style="background-color: green;" class="btn btn-primary btn-lg"><i class="fa fa-shopping-cart"></i>Place Order</button>
	        	</div>
	        </div>

	      </section>
	       </form>
	      
	     
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<!-- <script>
var subjectObject = {
   "La Union": {
    "Rosario": ["Alipang", "Ambangonan", "Amlang", "Bacani", "Bangar", "Bani", "Benteng-Sapilang", "Cadumanian", "camp One", "Carunuan East", "Carunuan West", "Casilagan", "Cataguingtingan", "Conseption", "Damortis", "Gumot-Nangcolaran", "Inabaan Norte", "Inabaan Sur", "Nagtagaan", "Nangcamotian", "Parsapas", "Poblacion East", "Poblacion West", "Puzon", "Rabon", "San Jose", "Marcus", "Subusub", "Tabtabungao", "Tanglag", "Tay-ac", "Udiao", "Vila"],
    "Agoo": ["Ambitacay", "Balawarte", "Capas", "Consolacion(Poblacion)", "Macalva Central", "Macalva Norte", "Macalva Sur", "Nazareno", "Purok", "San Agustin East", "San Agustin Norte", "San Agustin Sur", "San Antonino", "San Antonio", "San Francisco", "San Isidro", "San Joaquin Norte", "San Joaquin Sur", "San Jose Norte", "San Jose Sur", "San Juan", "San Julian Central", "San Julian East", "San Julian Norte", "San Julian West", "San Manuel Norte", "San Manuel Sur", "San Marcos", "San Miguel", "San Nicolas Central (Poblacion)", "San Nicolas East", "San Nicolas Norte (Poblacion)", "San Nicolas Sur (Poblacion)", "San Nicolas West", "San Pedro", "San Roque East", "San Roque West", "San Vicente Norte", "San Vicente Sur", "Santa Ana", "Santa Barbara (Poblacion)", "Santa Fe", "Santa Maria", "Santa Monica", "Santa Rita East", "Santa Rita Norte", "Santa Rita Sur", "Santa Rita West"],
    "Aringay": ["Alaska", "Basca", "Dulao", "Gallano", "Macabato", "Manga", "Pangao-aoan East","Pangao-aoan West", "Pobalcion", "Samara", "San Antonio", "San Benito Norte", "San Benito Sur", "San Eugenio", "San Juan East", " San Juan West", "San Simon East", "San Simon West", "Santa Cecillia", "Santa Lucia", "Santa Rita East", "Santa Rita West", "Santo Rosario East", "Santo Rosario West"],
  },

"Pangasinan": {
    "Sison": ["Agat", "Alibeng", "Amagbagan","Artacho","Asan Norte", "Asan Sur", "Bantay Insik","Bila","Binmeckeg", "Bulaoen East", "Bulaoen West","Cabaritan","Calunetan", "Camangaan", "Cauringan","Dungon",
    "Bantay Insik","Bila",
    "Esperanza", "Inmalog", "Killo","Labayug","Paldit", "Pindangan", "Pinmilapil","Poblacion Central",
    "Poblacion Norte", "Poblacion Sur", "Sagunto","Tara-tara"],
  "Pozorrubio": ["Don Benito Magno", "Don Domingo Aldana", "Don Juan Ancheta", "Don Francisco Callao", "Don Pedro Itliong", "Don Bartolome Naniong", "Don Bernardo Olarte", "Don Tobias Paragas", "Don Antonio Sabaldoro", "Don Pedro Salcedo", "Don Jose Songcuan", "Don Protacio Venezuela"],
    "Binalonan": ["Balangobong", "Bued", "Bugayong", "Camangaan", "Capas", "Cili", "Dumayat", "Linmansangan", "Mangcasuy", "Moreno", "Pasileng Norte", "Pasileng Sur", "Poblacion", "San Felipe Central", "San Felipe Sur", "San Pablo", "Sta. Catalina", "Sta. Maria Norte", "Santiago", "Sto. Nino", "Sumabnit", "Tabuyoc", "Vacante"],
    "Laoc": ["Anis", "Balligi", "Banuar", "Botigue", "Caaringayan", "Domingo Alarcio (Cabilaoan East)", "Cabilaoan", "Cabulalaan", "Calaoagan", "Calmay", "Casampagaan", "Casanestebanan", "Casantiagoan", "Inmanduyan", "Poblacion (Laoac)", "Lebueg", "Maraboc", "Nanbagatan", "Panaga", "Talogtog", "Turko", "Yatyat"],
    "Urdaneta": ["Anonas", "Bactad East", "Bayaoas", "Bolaoen", "Cabaruan", "Cabuloan", "Camanang", "Camantiles", "Casantaan", "Catablan", "Cayambanan", "Consolacion", "Dilan-Paurido", "Labit Proper", "Mabanogbog", "Macalong", "Nancalobasaan", "Nancamaliran East", "Nancamaliran West", "Nancayasan", "Oltama", "Palina East", "Palina West", "Pedro T. Orata (Bactad Proper)", "Pinmaludpod", "Poblacion", "San Jose", "San Vicente", "Santa Lucia", "Santo Domingo", "Sugcong", "Tiposu", "Tulong"],
    "Santa Barbara": ["Alibago", "Balingueo", "Banaoang", "Banzal", "Botao", "Cablong", "Carusucan", "Dalongue", "Erfe", "Gueguesangen", "Leet", "Malanay", "Maningding", "Maronong", "Maticmatic", "Minien East", " Minien West", "Nilombot", "Patayac", "Payas", "Tebag East", "Tebag West", "Poblacion Norte", "Poblacion Sur", "Primicias", "Sapang", "Sonquil", "Tuliao", "Ventenilla"],
    "Mapandan": ["Amanoaoac", "Apaya", "Aserda", "Baloling", "Coral", "Golden", "Jimenez", "Lambayan", "Luyan", "Nilombot", "Pias", "Poblacion", "Primicias", "Santa Maria", "Torres"],
    "Manaoag": ["Babasit", "Baguinay", "Baritao", "Bisal", "Bucao", "Cabanbanan", "Calaocan", "Inamotan", "Lelemaan", "Licsi", "Lipit Norte", "Lipit Sur", "Matulong", "Mermer", "Nalsian", "Oraan East", "Oraan West", "Pantal", "Pao", "Parian", "Poblacion", "Pugaro", "San Ramon", " Santa Ines", "Sapang", "Tebuel"],
    "San Jacinto": ["Awai", "Bolo", "Capaoay (Poblacion East)", "Casibong", "Imelda (Decrito)", "Guibel", "Labney", "Magsaysay (Capay)", "Lobong", "Macayug", "Bagong Pag-asa", "San Guillermo (Poblacion West)", "San Jose", "San Juan", "San Roque", "San Vicente", "Santa Cruz", "Santa Maria", "Santo Tomas"],
    "Mangaldan": ["Alitaya", "Amansabina", "Anolid", "Banaoang", "Bantayan", "Bari", "Bateng", "Buenlag", "David", "Embarcadero", "Gueguesangen", "Guesang", "Guiguilonen", "Guilig", "Inlambo", "Lanas", "Landas", "Maasin", "Macayug", "Malabago", "Navaluan", "Nibaliw", "Osiem", "Palua", "Poblacion", "Pogo", "Salaan", "Salay", "Talogtog", "Tebag"],
     "San Fabian": ["Alacan", "Ambalangan-Dalin", "Angio", "Anonang", "Aramal", "Bigbiga", "Binday", "Bolaoen", "Bolasi", "Cabaruan", "Cayanga", "Colisao", "Gumot", "Inmalog Norte", "Inmalog Sur", "Lekep-Butao", "Lipit-Tomeeng", "Longos Central", "Longos Proper", "Longos-Amangonan-Parac-Parac Fabrica", "Mabilao", "Nibaliw Central", "Nibaliw East", "Nibaliw Magliba", "Nibaliw Narvarte (Nibaliw West Compound)", "Nibaliw Vidal (Nibaliw West Proper)", "Palapad", "Poblacion", "Rabon", "Sagud-Bahley", "Sobol", "Tempra-Guilig", "Tiblong", "Tocok"],
     "Calasiao": ["Ambonao", "Ambuetel", "Banaoang", "Bued", "Buenlag†", "Cabilocaan", "Dinalaoan", "Doyong", "Gabon", "Lasip", "Longos", "Lumbang", "Macabito", "Mancup", "Nagsaing", "Nalsian", "Poblacion East", "Poblacion West", "Quesban", "San Miguel", "San Vicnte", "Songkoy", "Talibaew"],
     "Dagupan": ["Bacayao Norte", "Bacayao Sur", "Barangay I (T. Bugallon)", "Barangay II (Nueva)", "Barangay IV (Zamora)", "Bolosan", "Bonuan Binloc", "Bonuan Boquig", "Bonuan Gueset", "Calmay", "Carael", "Caranglaan", "Herroro St.", "Lasip Chico", "Lasip Grande", "Lomboy", "Lucao Dist.", "Malued", "Mamalingling", "Mangim", "Mayombong Dist", "Pantal", "Poblacion Oeste", "Pogo Grade", "Pugaro Suit", "Salpingao", "Salisay", "Tambac", "Tapuac", "Tebeng"],
  }
}
window.onload = function() {
  var subjectSel = document.getElementById("province");
  var topicSel = document.getElementById("town");
  var chapterSel = document.getElementById("barangay");
  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    //empty Chapters- and Topics- dropdowns
    chapterSel.length = 1;
    topicSel.length = 1;
    //display correct values
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
  }
  topicSel.onchange = function() {
    //empty Chapters dropdown
    chapterSel.length = 1;
    //display correct values
    var z = subjectObject[subjectSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
    }
  }
}
</script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
        <!-- script type="text/javascript" src="../../jquery.ph-locations.js"></script -->
        <script type="text/javascript" src="https://f001.backblazeb2.com/file/buonzz-assets/jquery.ph-locations.js"></script -->
        <script type="text/javascript">
            
            var my_handlers = {

           

                fill_cities: function(){

                    var province_code = $(this).val();
                    $('#city').ph_locations( 'fetch_list', [{"province_code": province_code}]);
                },


                fill_barangays: function(){

                    var city_code = $(this).val();
                    $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
                }
            };

            $(function(){
               
                $('#province').on('change', my_handlers.fill_cities);
                $('#city').on('change', my_handlers.fill_barangays);

                $('#region').ph_locations({'location_type': 'regions'});
                $('#province').ph_locations({'location_type': 'provinces'});
                $('#city').ph_locations({'location_type': 'cities'});
                $('#barangay').ph_locations({'location_type': 'barangays'});

                $('#province').ph_locations('fetch_list');
            });
        </script>

</body>
</html>