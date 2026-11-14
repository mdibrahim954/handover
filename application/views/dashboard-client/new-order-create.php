<?php
if (isset($header)) {
    echo $header;
}

$date = new DateTime("now", new DateTimeZone('Asia/Dhaka') );
$cdate= $date->format('m/d/Y');
$ctime=$date->format('h:i A');
?>
<style>
    .Forecourior.hidden {
        display: none;
}

#loader {
            display: none;
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 2s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: 246px;
            margin-left: -20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }


</style>

<div class="col-sm-8 col-md-8 col-lg-10 col-sm-offset-4 col-md-offset-2 col-lg-offset-2">

                    <script type="text/javascript">
                        $(document).ready(function () {
                            $counter = 1;
                            $serial = 2;
                            $('#buttonadd').click(function () {
                                $counter++;
                                $serial++;
                                $('#invoiceitems > tbody:last').append('<tr><td>' + $serial + '</td><td><input class="form-control regular-text" name="item[' + $counter + '][itemname]" placeholder="Item Name" style="width:180px;"></td><td><input class="form-control text-center item_code" style="width:90px;" name="item[' + $counter + '][item_code]" value="0" placeholder="Item Code" /></td><td><input class="form-control text-center quantity" style="width:80px;"  maxlength="3" name="item[' + $counter + '][quantity]" value="0" /></td><td><input class="form-control text-center price" style="width:80px;"  name="item[' + $counter + '][price]" value="0" /></td><td><label class="subtotal" style="font-weight: bold"></label></td><td><input type="button" class="btn btn-xs btn-danger deleteitem" value="Delete"/></td></tr>');
                                $('.quantity , .price').unbind().on('change', function () {
                                    UpdateTotals(this);
                                });
                            });

                            $('#invoiceitems').on('click', '.deleteitem', function () {
                                if ($('#invoiceitems tbody tr').length == 1) {
                                    alert('Cant delete single row');
                                    return false;
                                }
                                $(this).closest('tr').remove();
                            });
                            
                            
                     //COde from here
                     var field = document.querySelector('[name="customermobile"]');

                                field.addEventListener('keypress', function ( event ) {  
                                   var key = event.keyCode;
                                    if (key === 32) {
                                      event.preventDefault();
                                    }
                                });
                                var minLength=11;
                                $("#customermobile").on("change", function(){
                                var value = $(this).val();
                                if (value.length < minLength)
                                    alert(' Phone number length must be 11');
                                else if (value.length > minLength)
                                    alert('Phone number length must be 11');
                                
                            });
                     
                                let allData = {};
        function fetchDataByDistrict(selectedDistrict) {
        $.ajax({
          type: "POST",
          url: "https://backoffice.ecourier.com.bd/api/area-by-district",
          headers: {
            'API-SECRET': 'UYPm7',
            'API-KEY': 'XfRh',
            'USER-ID': 'C1721',
            'Content-Type': 'application/json'
          },
          data: JSON.stringify({ "district": selectedDistrict }),
          success: function(response) {
                console.log(response);
            allData[selectedDistrict] = response.data;
            populateSelectOptions(selectedDistrict);
          },
          error: function(error) {
            console.error("Error fetching data:", error);
          }
        });
      }

      function populateSelectOptions(selectedDistrict) {
        const areas = allData[selectedDistrict].map(item => item.name);
        const uniqueAreas = [...new Set(areas)];
        $("#area").html(uniqueAreas.map(area => `<option value="${area}">${area}</option>`).join(""));

        const thanas = allData[selectedDistrict].map(item => item.thana);
        const uniqueThanas = [...new Set(thanas)];
        $("#thana").html(uniqueThanas.map(thana => `<option value="${thana}">${thana}</option>`).join(""));

        const postcodes = allData[selectedDistrict].map(item => item.post_code);
        const uniquePostcodes = [...new Set(postcodes)];
        $("#postcode").html(uniquePostcodes.map(postcode => `<option value="${postcode}">${postcode}</option>`).join(""));
      }

      function clearSelectOptions() {
        $("#area, #thana, #postcode").empty();
      }

      function updateThanaAndPostcodeOptions(selectedArea) {
        const selectedDistrict = $("#district").val();
        if (selectedArea && selectedDistrict && allData[selectedDistrict]) {
          const selectedData = allData[selectedDistrict].filter(item => item.name === selectedArea);
          const thanas = selectedData.map(item => item.thana);
          const uniqueThanas = [...new Set(thanas)];
          $("#thana").html(uniqueThanas.map(thana => `<option value="${thana}">${thana}</option>`).join(""));

          const postcodes = selectedData.map(item => item.post_code);
          const uniquePostcodes = [...new Set(postcodes)];
          $("#postcode").html(uniquePostcodes.map(postcode => `<option value="${postcode}">${postcode}</option>`).join(""));
        }
      }

      function updateAreaAndThanaOptions(selectedPostcode) {
        const selectedDistrict = $("#district").val();
        if (selectedPostcode && selectedDistrict && allData[selectedDistrict]) {
          const selectedData = allData[selectedDistrict].filter(item => item.post_code === selectedPostcode);
          const areas = selectedData.map(item => item.name);
          const uniqueAreas = [...new Set(areas)];
          $("#area").html(uniqueAreas.map(area => `<option value="${area}">${area}</option>`).join(""));

          const thanas = selectedData.map(item => item.thana);
          const uniqueThanas = [...new Set(thanas)];
          $("#thana").html(uniqueThanas.map(thana => `<option value="${thana}">${thana}</option>`).join(""));
        }
      }

      function updateAreaAndPostcodeOptions(selectedThana) {
        const selectedDistrict = $("#district").val();
        if (selectedThana && selectedDistrict && allData[selectedDistrict]) {
          const selectedData = allData[selectedDistrict].filter(item => item.thana === selectedThana);
          const areas = selectedData.map(item => item.name);
          const uniqueAreas = [...new Set(areas)];
          $("#area").html(uniqueAreas.map(area => `<option value="${area}">${area}</option>`).join(""));

          const postcodes = selectedData.map(item => item.post_code);
          const uniquePostcodes = [...new Set(postcodes)];
          $("#postcode").html(uniquePostcodes.map(postcode => `<option value="${postcode}">${postcode}</option>`).join(""));
        }
      }

      
      $("#district").change(function() {
         
        const selectedDistrict = $(this).val();
        const couriorlistR = $('#couriorlistR').val();
        console.log(couriorlistR);
       if(couriorlistR ==='130'){
           
            let all_Data = {};
            let selected_District = $("#district").val();
            if(selected_District=="Chapai Nawabganj"){
                selected_District="Chapai%20Nawabganj";
                
            }else if(selected_District=="Cox bazar"){
                selected_District="2";
            }
            let areaDropdown = $("#redex_area");
            let postcodeDropdown = $("#redex_postcode");
            let districtDropdown = $("#district");
            let checkAreas = [];
            
            function updateOptions(selectedDistrict) {
            $.ajax({
              type: "POST",
              url: "https://handoverexpressbd.com/get_district.php",
              data: { selected_District: selectedDistrict },
            })
              .done(function (response) {
                var newData = JSON.parse(response);
                
                checkAreas = newData.areas;
            
                areaDropdown.empty();
                postcodeDropdown.empty();
            
                $.each(checkAreas, function (index, area) {
                  var areaOption = $("<option>").val(area.id).text(area.name);
                  areaDropdown.append(areaOption);
            
                  var postcodeOption = $("<option>")
                    .val(area.post_code || "N/A")
                    .text(area.post_code || "N/A");
                  postcodeDropdown.append(postcodeOption);
                });
              })
              .fail(function (jqXHR, textStatus, errorThrown) {
                console.log("Request failed:", textStatus, errorThrown);
              });
            }
            
            updateOptions(selected_District);
            
            districtDropdown.on("change", function () {
            var selectedDistrict = $(this).val();
            updateOptions(selectedDistrict);
            });
            
            areaDropdown.on("change", function () {
            var selectedAreaId = parseInt(areaDropdown.val());
            
            var selectedArea = checkAreas.find(function (area) {
              return area.id === selectedAreaId;
            });
            
            postcodeDropdown.val(selectedArea.post_code || "N/A");
            });
            
            function clearOptions() {
            areaDropdown.empty();
            postcodeDropdown.empty();
            }
           
           
           
            //alert('e');
        
        }else{
            
           if (selectedDistrict) {
          if (!allData[selectedDistrict]) {
            fetchDataByDistrict(selectedDistrict);
          } else {
            populateSelectOptions(selectedDistrict);
          }
            } else {
              clearSelectOptions();
            }

                
        }
            
      });

      $("#area").change(function() {
        const selectedArea = $(this).val();
        updateThanaAndPostcodeOptions(selectedArea);
      });

      $("#postcode").change(function() {
        const selectedPostcode = $(this).val();
        updateAreaAndThanaOptions(selectedPostcode);
      });

      $("#thana").change(function() {
        const selectedThana = $(this).val();
        updateAreaAndPostcodeOptions(selectedThana);
      });
      //COde upto here                    
                            
           $('#redex_area').change(function() {
        var selectedOptionText = $('#redex_area option:selected').text();
    
                $('#area_name_redx').val(selectedOptionText);
            });
        $('#redex_postcode').change(function() {
            
            var selectedOptionText = $('#redex_area option:selected').text();
                $('#area_name_redx').val(selectedOptionText);
            });
            
            $('#redex_packagecode').change(function() {
            
            var selectedOptionText = $('#redex_area option:selected').text();
                $('#area_name_redx').val(selectedOptionText);
            });  
            
  $('#couriorlistR').on('change', function() {
    if ($(this).val() === '130') {
        
              $('.Forecourior').addClass('hidden');
             $('.ForRedx').removeClass('hidden');
              $('.ForPathao').addClass('hidden');
             $('#district option[value="Lakhshmipur"]').remove();
             $('#district option[value="Narsingdi"]').remove();
              $("#district").append('<option value="Norshingdi">Narsingdi</option>');
             $('#district option[value="Takurgaon"]').remove(); 
             $('#district option[value="Chapainawabganj"]').remove();
        $("#district").append('<option value="Chapai%20Nawabganj">Chapai Nawabganj</option>');     
            $("#district").append('<option value="Laksmipur">Laksmipur</option>');
             $("#district").append('<option value="Thakurgaon">Thakurgaon</option>');
             $(".distric1").show();
        } else if ($(this).val() === '126'){
            //console.log('pathao');
             $('.ForPathao').removeClass('hidden');
               $('.ForRedx').addClass('hidden');
                 $('.Forecourior').addClass('hidden');
                 $(".distric1").hide();
        }else {
            $('.Forecourior').removeClass('hidden');
             $('.ForRedx').addClass('hidden');
             $('.ForPathao').addClass('hidden');
             $(".distric1").show();
        } 
     //alert('assa');
     });              
                            
              $('#pathao_city').change(function() {
          $("#loader").show();
            var selectedOptionText = $('#pathao_city option:selected').val();
            //console.log(selectedOptionText);
              $.ajax({
              type: "POST",
              url: "https://handoverexpressbd.com/get_city_pathao.php",
              data: { selectedOptionText: selectedOptionText },
              
            })
              .done(function (response) {
                var newData = JSON.parse(response);
                var $select = $("#pathao_zone");
                  $select.empty();
                    $.each(newData, function(index, item) {
                        $select.append($("<option>", {
                            value: item.zone_id,
                            text: item.zone_name
                        }));
                    });
                 $("#loader").hide();
                
              })
              .fail(function (jqXHR, textStatus, errorThrown) {
                console.log("Request failed:", textStatus, errorThrown);
              });
        });
        
        
        

                        });

                        $(function () {
                            CalculateSubTotals();
                            CalculateTotal();
                            // Adding the change events for the Price and
                            // quantity fields only..
                            // Changing the total should not affect anything
                            $('.quantity , .price').on('change', function () {
                                UpdateTotals(this);
                            });
                        });

                        function UpdateTotals(elem) {
                            // This will give the tr of the Element Which was changed
                            var $container = $(elem).parent().parent();
                            var quantity = $container.find('.quantity').val();
                            var price = $container.find('.price').val();
                            var subtotal = parseInt(quantity) * parseFloat(price);
                            $container.find('.subtotal').text(subtotal.toFixed(2));
                            CalculateTotal();
                        }

                        function CalculateSubTotals() {
                            // Calculate the Subtotals when page loads for the 
                            // first time
                            var lineTotals = $('.subtotal');
                            var quantity = $('.quantity');
                            var price = $('.price');
                            $.each(lineTotals, function (i) {
                                var tot = parseInt($(quantity[i]).val()) * parseFloat($(price[i]).val());
                                $(lineTotals[i]).text(tot.toFixed(2));
                            });
                        }

                        function CalculateTotal() {
                            // This will Itearate thru the subtotals and
                            // claculate the grandTotal and Quantity here
                            var lineTotals = $('.subtotal');
                            var quantityTotal = $('.quantity');
                            var grandTotal = 0.0;
                            var totalQuantity = 0;
                            $.each(lineTotals, function (i) {
                                grandTotal += parseFloat($(lineTotals[i]).text());
                                totalQuantity += parseInt($(quantityTotal[i]).val())
                            });

                            $('.totalquantity').text(totalQuantity);
                            $('.grandtotal').text(parseFloat(grandTotal).toFixed(2));

                        }
                    </script>

        <br>

<?php $this->load->view('error-message-display'); ?>

        <form class="form-horizontal" action="<?php echo base_url(); ?>client/dashboard/order_save" method="post">
            <div class="card" style="max-width:700px;margin:10px auto;">
                <div class="header" style="text-align:center">
                    <h4 class="title"><span>New Order</span> </h4>
                </div>
                <div class="content">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Delivery Type <span class="text-danger">*</span></label>
                        <div class="col-xs-8">			
                            <select class="form-control" name="deliverytypeid" required="">
                                <option value="">Select any..</option>
                                <?php foreach ($delivery as $row) { ?>
                                    <option value="<?php echo $row->order_type_id; ?>"><?php echo $row->order_type_name; ?></option>
<?php } ?>

                            </select>			
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Seller's Name<span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <input class="form-control" name="sellersname" placeholder="" value="<?php echo $userinfo->first_name . ' ' . $userinfo->last_name; ?>" type="text">
                            <!---->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Phone<span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input class="form-control" id="sellersmobile" name="sellersmobile" placeholder="" value="<?php echo $userinfo->mobile; ?>" type="text" required="">
                            </div>
                            <!---->
                        </div>
                    </div>
                        
                        
                        
                        

                    <div class="form-group">
                        <label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">	
                            <textarea class="form-control"formcontrolname="sellersaddress" id="sellersaddress" name="sellersaddress" style="height:80px;"><?php echo $userinfo->address; ?></textarea>
                            <!---->
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3">Pickup Area<span class="text-danger">*</span></label>
                        <div class="col-xs-8">			
                            <select class="form-control " name="pickupareaid" required="">
                                <option value="<?php echo $defaultArea->areaid; ?>"><?php echo $defaultArea->area_name; ?></option>
                                <?php foreach($area as $ar){?>
                                <option value="<?php echo $ar->areaid; ?>"><?php echo $ar->area_name; ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3">Pickup Time<span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-group">

                                <input class="form-control datepicker" name="pickupDate" id="" style="width:110px;" value="<?php echo $cdate;?>" type="text" required="">

                                <select class="form-control " name="pickupTime" style="width:110px;margin-left:5px;" required="">
                                    <!----><option value="<?php echo $ctime;?>"><?php echo $ctime;?></option>
                                    <!----><option value="07:00 AM">07:00 AM</option>
                                    <option value="07:30 AM">07:30 AM</option><option value="07:45 AM">07:45 AM</option><option value="08:00 AM">08:00 AM</option><option value="08:30 AM">08:30 AM</option><option value="08:45 AM">08:45 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="09:45 AM">09:45 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="10:45 AM">10:45 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="11:45 AM">11:45 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="12:45 PM">12:45 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="01:45 PM">01:45 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="02:45 PM">02:45 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="03:45 PM">03:45 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="04:45 PM">04:45 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="05:45 PM">05:45 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="06:45 PM">06:45 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option><option value="07:45 PM">07:45 PM</option><option value="08:00 PM">08:00 PM</option><option value="08:30 PM">08:30 PM</option><option value="08:45 PM">08:45 PM</option><option value="09:00 PM">09:00 PM</option><option value="09:30 PM">09:30 PM</option><option value="09:45 PM">09:45 PM</option><option value="10:00 PM">10:00 PM</option><option value="10:30 PM">10:30 PM</option><option value="10:45 PM">10:45 PM</option><option value="11:00 PM">11:00 PM</option><option value="11:30 PM">11:30 PM</option><option value="11:45 PM">11:45 PM</option>
                                </select>

                            </div>
                        </div>
                    </div>	

                    <hr>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Customer Name<span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <input class="form-control" formcontrolname="customername" id="customername" name="customername" placeholder="" type="text">
                            <!---->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Phone<span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input class="form-control" formcontrolname="customermobile" id="customermobile" name="customermobile" placeholder="Must be 11 digits only" type="text" required="">
                            </div>
                            <!---->
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label class="control-label col-sm-3">Alt Phone</label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input class="form-control" formcontrolname="customermobilealt" id="customermobilealt" name="customermobilealt" placeholder="Must be 11 digits only" type="text" >
                            </div>
                            <!---->
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3">Address<span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">	
                            <textarea class="form-control" formcontrolname="customeraddress" id="customeraddress" name="customeraddress" placeholder="House Number & Road Name"style="height:80px;"></textarea>
                            <!---->
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3">COURIER LIST<span class="text-danger">*</span></label>
                        <div class="col-xs-8">			
                            <select class="form-control" id="couriorlistR" name="deliveryareaid" required="">
                                <!----><option value="">Select any</option>
                                <?php foreach ($area as $row) { ?>
                                    <option value="<?php echo $row->areaid; ?>"><?php echo $row->area_name; ?></option>
<?php } ?>
                                <!--<option value="17">Adabor</option><option value="68">Agargaon</option><option value="58">Ahmed bag</option><option value="113">Airport</option><option value="19">Azimpur</option><option value="14">Badda</option><option value="12">Badda - Middle Badda</option><option value="13">Badda - Uttar Badda</option><option value="88">Banani</option><option value="61">Banasree</option><option value="21">Bangsal</option><option value="4">Baridhara</option><option value="56">Bashabo</option><option value="65">Bosila</option><option value="106">BUET</option><option value="22">Cantonment</option><option value="23">Chowk bazar</option><option value="69">Darussalam</option><option value="24">Demra</option><option value="110">Dhaka Medical</option><option value="107">Dhaka University</option><option value="7">Dhanmondi</option><option value="16">Dhanmondi - Shankar</option><option value="111">Dokkhin Khan</option><option value="102">Elephant road</option><option value="40">Farmgate</option><option value="63">Gabtoli</option><option value="25">Gandaria</option><option value="57">Goran</option><option value="1">Gulshan-1</option><option value="87">Gulshan-2</option><option value="86">Hatirjheel</option><option value="26">Hazaribagh</option><option value="105">Jatrabari</option><option value="112">Jurain</option><option value="27">Kadamtali</option><option value="28">Kafrul</option><option value="29">kalabagan</option><option value="62">Kallyanpur</option><option value="30">kamrangirchar</option><option value="31">Khilgaon</option><option value="32">Khilkhet</option><option value="33">Kotwali</option><option value="71">Kuril</option><option value="34">Lalbagh</option><option value="64">Lalmatia</option><option value="53">Magh Bazar</option><option value="55">Malibagh</option><option value="89">Mirpur-1</option><option value="5">Mirpur-10</option><option value="93">Mirpur-11</option><option value="91">Mirpur-12</option><option value="92">Mirpur-14</option><option value="90">Mirpur-2</option><option value="95">Mohakhali</option><option value="2">Mohakhali-DOHS</option><option value="6">Mohammadpur</option><option value="70">Monipur-Mirpur</option><option value="36">Motijheel</option><option value="54">Mouchak</option><option value="94">Naya Paltan</option><option value="35">New Market</option><option value="85">Nikunja</option><option value="37">Pallabi</option><option value="39">Panthapath</option><option value="109">Puran Dhaka</option><option value="38">Purana Paltan</option><option value="41">Ramna</option><option value="59">Rampura</option><option value="67">Rayer Bazar</option><option value="108">Razarbagh</option><option value="42">Sabujbagh</option><option value="114">Savar Bus Stand</option><option value="51">Segunbagicha</option><option value="43">Shahbag</option><option value="52">Shantinagar</option><option value="44">Sher-E-Bangla Nagor</option><option value="66">Shukrabad</option><option value="60">Shyamoli</option><option value="45">Shyampur</option><option value="46">Sutrapur</option><option value="48">Tejgaon</option><option value="47">Tejgaon Industrial Area</option><option value="49">Uttar Khan</option><option value="15">Uttara</option><option value="9">Uttara - Sector-1</option><option value="104">Uttara - Sector-10</option><option value="10">Uttara - Sector-2</option><option value="11">Uttara - Sector-3</option><option value="50">Vatara</option><option value="18">Wari</option><option value="116">Whole Nation SA Paribahan</option><option value="115">Whole Nation SundarBan Courier</option><option value="101">Zigatala</option>-->
                            </select>			
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-3">Delivery Time<span class="text-danger">*</span></label>
                        <div class="col-md-8 col-sm-9">
                            <div class="input-group">

                                <input class="form-control datepicker" name="deliveryDate" id="" style="width:110px;" value="<?php echo $cdate;?>" type="text">
                                <select class="form-control " name="deliveryTime" style="width:110px;margin-left:5px;">
                                    <option value="<?php echo $ctime;?>"><?php echo $ctime;?></option>
                                    <!----><option value="07:00 AM">07:00 AM</option>
                                    <option value="07:30 AM">07:30 AM</option><option value="07:45 AM">07:45 AM</option><option value="08:00 AM">08:00 AM</option><option value="08:30 AM">08:30 AM</option><option value="08:45 AM">08:45 AM</option><option value="09:00 AM">09:00 AM</option><option value="09:30 AM">09:30 AM</option><option value="09:45 AM">09:45 AM</option><option value="10:00 AM">10:00 AM</option><option value="10:30 AM">10:30 AM</option><option value="10:45 AM">10:45 AM</option><option value="11:00 AM">11:00 AM</option><option value="11:30 AM">11:30 AM</option><option value="11:45 AM">11:45 AM</option><option value="12:00 PM">12:00 PM</option><option value="12:30 PM">12:30 PM</option><option value="12:45 PM">12:45 PM</option><option value="01:00 PM">01:00 PM</option><option value="01:30 PM">01:30 PM</option><option value="01:45 PM">01:45 PM</option><option value="02:00 PM">02:00 PM</option><option value="02:30 PM">02:30 PM</option><option value="02:45 PM">02:45 PM</option><option value="03:00 PM">03:00 PM</option><option value="03:30 PM">03:30 PM</option><option value="03:45 PM">03:45 PM</option><option value="04:00 PM">04:00 PM</option><option value="04:30 PM">04:30 PM</option><option value="04:45 PM">04:45 PM</option><option value="05:00 PM">05:00 PM</option><option value="05:30 PM">05:30 PM</option><option value="05:45 PM">05:45 PM</option><option value="06:00 PM">06:00 PM</option><option value="06:30 PM">06:30 PM</option><option value="06:45 PM">06:45 PM</option><option value="07:00 PM">07:00 PM</option><option value="07:30 PM">07:30 PM</option><option value="07:45 PM">07:45 PM</option><option value="08:00 PM">08:00 PM</option><option value="08:30 PM">08:30 PM</option><option value="08:45 PM">08:45 PM</option><option value="09:00 PM">09:00 PM</option><option value="09:30 PM">09:30 PM</option><option value="09:45 PM">09:45 PM</option><option value="10:00 PM">10:00 PM</option><option value="10:30 PM">10:30 PM</option><option value="10:45 PM">10:45 PM</option><option value="11:00 PM">11:00 PM</option><option value="11:30 PM">11:30 PM</option><option value="11:45 PM">11:45 PM</option>
                                </select>

                            </div>
                        </div>
                    </div>
                       
                       <div class="form-group distric1" >
                           
                           <label class="control-label col-sm-3">Select District<span class="text-danger">*</span></label> 
                           <div class="col-md-8 col-sm-9">
                           <select class="form-control ng-untouched ng-pristine ng-valid" name="district" id="district">
                    		  <option value="">Select City</option>
                    		  <option value="Dhaka">Dhaka</option>
                    		  <option value="Chittagong">Chittagong</option>
                    		  <option value="Comilla">Comilla</option>
                    		  <option value="Noakhali">Noakhali</option>
                    		  <option value="Feni">Feni</option>
                    		  <option value="Lakhshmipur">Lakhshmipur</option>
                    		  <option value="Brahmanbaria">Brahmanbaria</option>
                    		  <option value="Chandpur">Chandpur</option>
                    		  <option value="Rajshahi">Rajshahi</option>
                    		  <option value="Bogra">Bogra</option>
                    		  <option value="Rangpur">Rangpur</option>
                    		  <option value="Nilphamari">Nilphamari</option>
                    		  <option value="Khulna">Khulna</option>
                    		  <option value="Jessore">Jessore</option>
                    		  <option value="Kushtia">Kushtia</option>
                    		  <option value="Satkhira">Satkhira</option>
                    		  <option value="Sylhet">Sylhet</option>
                    		  <option value="Moulvibazar">Moulvibazar</option>
                    		  <option value="Habiganj">Habiganj</option>
                    		  <option value="Barisal">Barisal</option>
                    		  <option value="Mymensingh">Mymensingh</option>
                    		  <option value="Narayanganj">Narayanganj</option>
                    		  <option value="Kishoreganj">Kishoreganj</option>
                    		  <option value="Tangail">Tangail</option>
                    		  <option value="Gazipur">Gazipur</option>
                    		  <option value="Cox Bazar">Cox's bazar</option>
                    		  <option value="Sherpur">Sherpur</option>
                    		  <option value="Narsingdi">Narsingdi</option>
                    		  <option value="Chuadanga">Chuadanga</option>
                    		  <option value="Sunamganj">Sunamganj</option>
                    		  <option value="Madaripur">Madaripur</option>
                    		  <option value="Lalmonirhat">Lalmonirhat</option>
                    		  <option value="Panchagarh">Panchagarh</option>
                    		  <option value="Munshiganj">Munshiganj</option>
                    		  <option value="Khagrachhari">Khagrachhari</option>
                    		  <option value="Faridpur">Faridpur</option>
                    		  <option value="Magura">Magura</option>
                    		  <option value="Patuakhali">Patuakhali</option>
                    		  <option value="Barguna">Barguna</option>
                    		  <option value="Jamalpur">Jamalpur</option>
                    		  <option value="Bhola">Bhola</option>
                    		  <option value="Shariatpur">Shariatpur</option>
                    		  <option value="Pirojpur">Pirojpur</option>
                    		  <option value="Bagerhat">Bagerhat</option>
                    		  <option value="Manikganj">Manikganj</option>
                    		  <option value="Naraiil">Naraiil</option>
                    		  <option value="Dinajpur">Dinajpur</option>
                    		  <option value="Gaibandha">Gaibandha</option>
                    		  <option value="Gopalganj">Gopalganj</option>
                    		  <option value="Jaypurhat">Jaypurhat</option>
                    		  <option value="Rangamati">Rangamati</option>
                    		  <option value="Kurigram">Kurigram</option>
                    		  <option value="Lakshmipur">Lakshmipur</option>
                    		  <option value="Meherpur">Meherpur</option>
                    		  <option value="Naogaon">Naogaon</option>
                    		  <option value="Netrokona">Netrokona</option>
                    		  <option value="Pabna">Pabna</option>
                    		  <option value="Sirajganj">Sirajganj</option>
                    		  <option value="Chapainawabganj">Chapainawabganj</option>
                    		  <option value="Thakurgaon">Thakurgaon</option>
                    		  <option value="Rajbari">Rajbari</option>
                    		  <option value="Jhenaidah">Jhenaidah</option>
                    		  <option value="Chittagong City">Chittagong City</option>
                    		  <option value="Jhalokati">Jhalokati</option>
                    		  <option value="Bandarban">Bandarban</option>
                    		  <option value="Takurgaon">Takurgaon</option>
                    		  <option value="Natore">Natore</option>
                    		  <option value="Joypurhat">Joypurhat</option>
                    		  <option value="Narail">Narail</option>
                    		  <option value="Jashore">Jashore</option>
                        </select>
                        </div>
                       </div>
                       
                       
                     <div class="Forecourior"> 
                        <div class="form-group">
                           
                           <label class="control-label col-sm-3">Select Area</label> 
                           <div class="col-md-8 col-sm-9">
                                <select class="form-control ng-untouched ng-pristine ng-valid" name="area" id="area"></select>
                            </div>
                         </div>
                         <div class="form-group">
                           
                           <label class="control-label col-sm-3">Thana</label> 
                           <div class="col-md-8 col-sm-9">
                           <select class="form-control ng-untouched ng-pristine ng-valid" name="thana" id="thana"></select>
                            </div>
                         </div>
                         
                         <div class="form-group">
                           
                           <label class="control-label col-sm-3">Postcode </label> 
                           <div class="col-md-8 col-sm-9">
                               <select class="form-control ng-untouched ng-pristine ng-valid" name="postcode" id="postcode"></select>
                           
                            </div>
                         </div>
                         <div class="form-group">
                           
                           <label class="control-label col-sm-3">Package Code </label> 
                           <div class="col-md-8 col-sm-9">
                               <select class="form-control ng-untouched ng-pristine ng-valid" name="packagecode" id="packagecode">
                                    
                            		  <option value="#2506">Inside Dhaka 45tk</option>
                            		  <option value="#2535">Outside Dhaka 90tk</option>
                            		  <option value="#5221">Subarea Outside Dhaka 80tk</option>
                            		</select>
                            </div>
                         </div>
                        
                    </div>   
                    
                    
                    
                    
                     <div class="ForRedx hidden">
                        <div class="form-group">
                           
                           <label class="control-label col-sm-3">Select Area</label> 
                           <div class="col-md-8 col-sm-9">
                                <select class="form-control ng-untouched ng-pristine ng-valid" name="redex_area" id="redex_area"></select>
                            </div>
                         </div>
                        
                          <input type="hidden" name="area_name_redx1" id="area_name_redx" value="">
                         <div class="form-group">
                           
                           <label class="control-label col-sm-3">Postcode </label> 
                           <div class="col-md-8 col-sm-9">
                               <select class="form-control ng-untouched ng-pristine ng-valid" name="redex_postcode" id="redex_postcode"></select>
                           
                            </div>
                         </div>
                         <div class="form-group">
                           
                           <label class="control-label col-sm-3">Package Code </label> 
                           <div class="col-md-8 col-sm-9">
                               <select class="form-control ng-untouched ng-pristine ng-valid" name="redex_postcode" id="redex_packagecode">
                                    
                            		  <option value="#2506">Inside Dhaka 45tk</option>
                            		  <option value="#2535">Outside Dhaka 90tk</option>
                            		  <option value="#5221">Subarea Outside Dhaka 80tk</option>
                            		</select>
                            </div>
                         </div>
                    </div>   
                       
                    
                    <div class="ForPathao hidden">
                        <div class="form-group">
                           
                           <label class="control-label col-sm-3">Select City/District<span class="text-danger">*</span></label> 
                           <div class="col-md-8 col-sm-9">
                                <select class="form-control ng-untouched ng-pristine ng-valid" name="pathao_city1" id="pathao_city">
                                    <option value="32">Select One</option>
                                    <option value="32">B. Baria</option>
                                    <option value="52">Bagerhat</option>
                                    <option value="62">Bandarban</option>
                                    <option value="34">Barguna</option>
                                    <option value="17">Barisal</option>
                                    <option value="53">Bhola</option>
                                    <option value="9">Bogra</option>
                                    <option value="8">Chandpur</option>
                                    <option value="15">Chapainawabganj</option>
                                    <option value="2">Chittagong</option>
                                    <option value="61">Chuadanga</option>
                                    <option value="11">Cox's Bazar</option>
                                    <option value="5">Cumilla</option>
                                    <option value="1">Dhaka</option>
                                    <option value="35">Dinajpur</option>
                                    <option value="18">Faridpur</option>
                                    <option value="6">Feni</option>
                                    <option value="38">Gaibandha</option>
                                    <option value="22">Gazipur</option>
                                    <option value="56">Gopalgonj</option>
                                    <option value="30">Habiganj</option>
                                    <option value="41">Jamalpur</option>
                                    <option value="19">Jashore</option>
                                    <option value="27">Jhalokathi</option>
                                    <option value="49">Jhenidah</option>
                                    <option value="48">Joypurhat</option>
                                    <option value="63">Khagrachari</option>
                                    <option value="20">Khulna</option>
                                    <option value="42">Kishoreganj</option>
                                    <option value="55">Kurigram</option>
                                    <option value="28">Kushtia</option>
                                    <option value="40">Lakshmipur</option>
                                    <option value="57">Lalmonirhat</option>
                                    <option value="43">Madaripur</option>
                                    <option value="60">Magura</option>
                                    <option value="16">Manikganj</option>
                                    <option value="50">Meherpur</option>
                                    <option value="12">Moulvibazar</option>
                                    <option value="23">Munsiganj</option>
                                    <option value="26">Mymensingh</option>
                                    <option value="46">Naogaon</option>
                                    <option value="54">Narail</option>
                                    <option value="21">Narayanganj</option>
                                    <option value="47">Narshingdi</option>
                                    <option value="14">Natore</option>
                                    <option value="44">Netrakona</option>
                                    <option value="39">Nilphamari</option>
                                    <option value="7">Noakhali</option>
                                    <option value="24">Pabna</option>
                                    <option value="37">Panchagarh</option>
                                    <option value="29">Patuakhali</option>
                                    <option value="31">Pirojpur</option>
                                    <option value="58">Rajbari</option>
                                    <option value="4">Rajshahi</option>
                                    <option value="59">Rangamati</option>
                                    <option value="25">Rangpur</option>
                                    <option value="51">Satkhira</option>
                                    <option value="64">Shariatpur</option>
                                    <option value="33">Sherpur</option>
                                    <option value="10">Sirajganj</option>
                                    <option value="45">Sunamganj</option>
                                    <option value="3">Sylhet</option>
                                    <option value="13">Tangail</option>
                                    <option value="36">Thakurgaon</option>
                                </select>

                            </div>
                         </div>
                        
                          <!--input type="hidden" name="area_name_redx" id="area_name_redx" value=""-->
                         <div class="form-group">
                           
                           <label class="control-label col-sm-3">Zone<span class="text-danger">*</span> </label> 
                           <div class="col-md-8 col-sm-9">
                               <select class="form-control ng-untouched ng-pristine ng-valid" name="pathao_zone1" id="pathao_zone"></select>
                           
                            </div>
                         </div>
                         
                    </div>  
                    <div id="loader"></div>
                        

                    <hr>


                    <div class="form-group">
                        <label class="control-label col-sm-3">Reference Invoice</label>
                        <div class="col-md-8 col-sm-9">
                            <input class="form-control " formcontrolname="referenceinvoice" id="referenceinvoice" name="referenceinvoice" placeholder="" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Package Description</label>
                        <div class="col-md-8 col-sm-9">
                            <textarea class="form-control " formcontrolname="packagedescription" id="packagedescription" name="packagedescription"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">Note To Delivery Man</label>
                        <div class="col-md-8 col-sm-9">
                            <textarea class="form-control " formcontrolname="deliverynote" id="deliverynote" name="deliverynote"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3"></label>
                        <div class="col-md-8 col-sm-9">
                            <button class="btn btn-warning" type="submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                        </div>
                    </div>



                </div>
            </div>




            <div class="card" style="max-width:700px;margin:50px auto;">
                <div class="header" style="text-align:center">
                    <h4 class="title"><span>Order Items</span> </h4>
                </div>
                <div class="content">

                    <table class="table table-bordered" id="invoiceitems"> 
                        <thead> 
                            <tr> 
                                <th>#</th> 
                                <th>Item Name</th> 
                                 <th>Item Code</th>
                                <th>Quantity</th> 
                                <th>Unit Price</th> 
                                <th>Total</th>
                                <th><button class="btn btn-xs btn-primary" id="buttonadd" type="button">Add Item</button></th>
                            </tr> 
                        </thead> 
                        <tbody> 
                            <tr> 
                                <td>1</td>
                                <td>
                                    <input class="form-control text-center item_code"   name="item['. 1 .'][itemname]" style="width:180px;" value="" type="text" placeholder="Item Name">
                                </td>
                                <td><input class="form-control text-center item_code"   name="item['. 1 .'][item_code]" style="width:90px;" value="0" type="text" placeholder="Item Code"></td>
                                <td><input class="form-control text-center quantity"  maxlength="3" name="item['. 1 .'][quantity]" style="width:80px;" value="0" type="text"></td>
                                <td><input class="form-control text-center price" name="item['. 1 .'][price]" style="width:80px;" value="0" type="text"></td>
                                <!--<td><input class="form-control text-centere subtotal" disabled="disabled" id="" name="total[]" style="width:80px;" value="" type="text"></td>-->
                                <td><label class="subtotal" style="font-weight: bold"></label></td>
                                <td style="width:15%">
                                    <!--<input type="button" class="btn btn-xs btn-danger deleteitem"  value="Delete"/>-->
                                </td>
                            </tr>
                            <tr> 
                                <td>2</td>
                                <td><textarea class="form-control"  name="itemname_delivery" ngdefaultcontrol="" style="width:180px;">Delivery Charge</textarea></td>
                                <td></td>
                                <td><input class="form-control text-center quantity" id="item_b1" maxlength="3" name="quantity_delivery"  style="width:80px;" value="0" type="text"></td>
                                <td><input class="form-control text-center price" id="item_b2" name="unitprice_delivery"  style="width:80px;" value="0" type="text"></td>
                                <!--<td><input class="form-control text-center subtotal" disabled="disabled" id="" name="total_delivery" style="width:80px;" value="" type="text"></td>-->
                                <td><label class="subtotal" style="font-weight: bold"></label></td>
                                <td>
                                    <!--                                                                <button class="btn btn-xs btn-danger" type="button">
                                                                                                        Delete
                                                                                                    </button>-->
                                </td>
                            </tr> 
                        </tbody> 
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td>
                                    <label class="grandtotal" style="font-weight: bold"></label>                                        
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>


        </form>




</div>

</div>

</div></div>

<?php
if (isset($footer)) {
    echo $footer;
}?>