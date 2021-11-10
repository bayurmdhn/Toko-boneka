<div class="container">
	<div class="card mb-4">
		<div class="card-header">
			<h4>Pembayaran Pesanan : BA00<?php echo $pembelian['id_pembelian'] ?></h4>
		</div>
		<div class="card-body text-center">

      <p>Mohon segera lakukan pembayaran sebelum batas waktu: </p>
			<h4 class="text-center"> Batas Pembayaran : </h4>
      <h5><?php echo date("d F Y", strtotime($pembelian['batas_pembayaran'])) . ", pukul " . date("H:i:s", strtotime($pembelian['batas_pembayaran'])) . " WIB" ?></h5>
      <h2><p id="demo"></p></h2>
		</div>
		<div class="card-footer text-center d-flex justify-content-center">
      <?php if ($status_checkout=='belum menyelesaikan pembayaran'): ?>
        <a href="<?php echo $pembelian['instruksi_pembayaran'] ?>" target="_blank" class="btn btn-success mr-2">Lihat Instruksi Pembayaran</a>
      <?php endif ?>
			<form id="payment-form" method="post" action="<?=site_url()?>checkout/finish/<?php echo $pembelian['id_pembelian'] ?>">
				<input type="hidden" name="result_type" id="result-type" value="">
				<input type="hidden" name="result_data" id="result-data" value="">
				<input type="hidden" name="id_pembelian" value="<?php echo $pembelian['id_pembelian'] ?>">
				<button id="pay-button" class="btn btn-primary">
          <?php if ($status_checkout=='belum menyelesaikan pembayaran'): ?>
                Ganti Metode Pembayaran
          <?php else: ?>
              Lakukan Pembayaran
          <?php endif ?>    
        </button>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">

	$('#pay-button').click(function (event) {
		event.preventDefault();
		$(this).attr("disabled", "disabled");
		var id_pembelian = $("input[name=id_pembelian]").val();
		$.ajax({
			url: '<?php echo base_url("checkout/token") ?>',
			data:"id_pembelian="+id_pembelian,
			cache: false,

			success: function(data) {
        //location = data;

        console.log('token='+data);

        // console.log(data);

        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
        	$("#result-type").val(type);
        	$("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
      }

      snap.pay(data, {

      	onSuccess: function(result){
      		changeResult('success', result);
      		console.log(result.status_message);
      		console.log(result);
      		$("#payment-form").submit();
      	},
      	onPending: function(result){
      		changeResult('pending', result);
      		console.log(result.status_message);
      		$("#payment-form").submit();
      	},
      	onError: function(result){
      		changeResult('error', result);
      		console.log(result.status_message);
      		$("#payment-form").submit();
      	}
      });
  }
});
	});

</script>
<script>
// Set the date we're counting down to
var countDownDate = new Date(<?php echo date(strtotime($pembelian['batas_pembayaran']) * 1000) ?>).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>