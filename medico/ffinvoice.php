<?php include("header.php");?>

<!-- make dynamic input field -->
<script
  src="https://code.jquery.com/jquery-3.6.4.slim.js"
  integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4="
  crossorigin="anonymous"></script>
<div class="col-md-12" style="margin-left:17%;">  
        <table class="table table-responsive">
        <thead>
            <tr>
              <th>customer name</th>
              <th>Address</th>
              <th>Contact</th>
              
            
            </tr>
          </thead> 
          <tbody class="row_container">
            
            <tr id="div_{{$row_num}}">
              
              <td>
                <input type="text" name="medicine_name" class="form-control" placeholder="customer name">
              </td>         
              <td>
                <input type="text" name="add" class="form-control" placeholder="Address" id="quantity">
              </td>         
              <td>
                <input type="text" name="con" class="form-control" placeholder="Contact" id="unitprice">
              </td>
        
</tbody>
        
<script>
  function addrow(){
   var v = $("#trow").clone().appendTo("#tbody");
   $(v).find("input").val("");
   $(v).removeclass("d-none")
  }
  function removerow(v){

    $(v).parent().parent().remove();


  }

  function cacl(v){
    var index =$(v).parent().parent().index();
    

    var qty = document.getElementsByName("quantity")[index].value;
    var rate = document.getElementsByName("rate")[index].value;

    var total= qty * rate;
    document.getElementsByName("total")[index].value = total;

    gettotal();
  }

  function gettotal(){
    var sum = 0;
    var amts = document.getElementsByName("total") ;

    for(let index=0; index < amts.length; index++){
      var total = amts[index].value;
      sum = +(sum) + +(total);

      document.getElementById("grandtotal").value = sum;

    }
  }
</script>        
        
        
            
        
        
        
        
        <thead>
            <tr>
            
              <th>Medicine Name</th>
              <th>Quantity</th>
              <th>Unit/Price</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tbody">
            
              <tr id="trow" >
              <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px; border-top: 3px solid  #02b6ff;">
         
                <td>
                  <input type="text" name="medicine_name" id="medicine_name" class="form-control" placeholder="Medicine Name">
                </td>         
                <td>
                  <input type="number" name="quantity"  onchange="cacl(this);" class="form-control" placeholder="Quantity" id="quantity">
                </td>         
                <td>
                  <input type="number" name="rate"  onchange="cacl(this);" class="form-control" placeholder="rate" id="unitprice">
                </td>
                <td>
                  <input type="number" name="total"  class="form-control" placeholder="Total" >
                </td>
                <td>
                  <a  class="btn btn-success" onclick="addrow();"><i class="fa fa-plus"></i></a>
                  <a  class="btn btn-danger" onclick="removerow(this);"><i class="fa fa-trash-o"></i></a>
                </td>
              </tr>
          </tbody>
          <tbody>
              <tr>
                <td colspan="3"></td>
                <td></td>
                <td></td>
                
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>
                  <strong>GST:</strong>
                </td>
                <td>
                  <input type="text" name="subtotal" class="form-control" id="subtotal" value="0.00" >
                </td>
                <td></td>
              </tr>
              <tr>
                
               
                <td></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>
                  <strong>Paid:</strong>
                </td>
                <td>
                  <input type="text" name="" class="form-control" id="paid">
                </td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>
                  <strong>Due:</strong>
                </td>
                <td>
                  <input type="text" name="" class="form-control" id="due" value="0.00" readonly>
                </td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>
                  <strong>Grand Total:</strong>
                </td>
                <td>
                  <input type="text" name="grand total" class="form-control" id="grandtotal" value="0.00" readonly>
                </td>
                <td></td>
              </tr>
          </tbody>
        </table>
        <button type="button" class="btn btn-success">Save</button>
    </div>
	


<?php include("footer.php");?>
