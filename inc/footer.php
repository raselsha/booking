	<div class="row">
		<div class="col-12">
			<footer>
				<small>Copyright &copy; 2019 All rights reserved.</small>
			</footer>
		</div>
	</div>
	</main>
		<script type="text/javascript">
			$(document).ready(function(){
				$("select[name='book_seats']").change(function(){
					var seats=$(this).val();
					var amount = 100*seats;
				  $(".amount").text(amount);
				  $("input[name='amount']").val(amount);
				});
			});
		</script>
		<script type="text/javascript">
			function printDiv() 
			{

			  var divToPrint=document.getElementById('DivIdToPrint');

			  var newWin=window.open('','Print-Window');

			  newWin.document.open();

			  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

			  newWin.document.close();

			  setTimeout(function(){newWin.close();},10);

			}
		</script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
		$( function() {
		  $( "#datepicker" ).datepicker();
		} );
	</script>
	
</body>
</html>