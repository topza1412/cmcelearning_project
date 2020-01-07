<div class="modal fade" id="payment_credit_card" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Credit Card</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="confirm_order_credit" name="confirm_order_credit" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="payment_transfer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Transfer to payment</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="confirm_order_transfer" name="confirm_order_transfer" method="post">
          <input type="hidden" name="user_id" value="{{session('session_id')}}">
          <input type="hidden" name="cart_data" value="{{Cart::getContent()}}">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date of payment:</label>
            <input name="payment_date" type="date" class="form-control" value="{{date('Y-m-d')}}" required>
          </div>
         <div class="form-group">
            <label for="recipient-name" class="col-form-label">Time of payment:</label>
            <input name="payment_time" type="time" class="form-control" value="{{date('H:i:s')}}" required>
          </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Amount:</label>
            <input name="price" id="price" type="text" class="form-control" readonly>
          </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Bank transfer:</label>
            <select name="bank_transfer" class="form-control" required>
            <option value="">Select</option>
            <option value="กสิกร (xxx-xxxx-xxx)">กสิกร (xxx-xxxx-xxx)</option>
            </select>
          </div>
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Transfer Slip:</label>
            <input type="file" name="slip_file" class="form-control" required>
            <small class="text-danger">Only file (jpg,jpeg,png) max size 1 mb.</small>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Confirm</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg" id="show_lesson_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title text-primary" id="exampleModalLabel"><b><span id="lesson_name"></span></span></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
        <span id="lesson_vdo_url"></span>
        </div>
        <div class="col-lg-12">
        <hr>
        <span id="lesson_content"></span>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
//confirm order transfer
$('#confirm_order_transfer').on('submit', function(e){
e.preventDefault(); 

var formData = new FormData($(this)[0]);

var url_api = "{{url('api/checkout/transfer')}}";

var url_after = "{{url('myorder')}}";

$.ajax({
type : 'post',
url : url_api,
data : formData,
dataType: "json",
async: false,
cache: false,
contentType: false,
processData: false,
success:function(data){

if(data.result==true){

      Swal.fire({
      title: data.message,
      type: 'success',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'OK',
    }).then((result) => {
      if (result.value) {
        window.location=url_after;
      }
    })

     }

     else {

        swal.fire({
          type: 'error',
          title: 'Error',
          text: data.message,
          showConfirmButton: false,
          timer: 3500
            })

          }

}

});
});
</script>

