<div class='footer'>Aran Reports By norgematos.net</div>
</body>
<script>
$(document).ready(function(){
	$.get('setPunch.php',function(answer){
		$('#container').html(answer);
	});
});

$('.punch').on('click',function(){
	$.post('setPunch.php',{
		reportpunch:$(this).val(),
		reportplace: $('#reportplace').val()
	},function(answer){
		$('#container').html(answer);
	});
});

$('.menu span').on('click',function(){
	$.get($(this).attr('id')+'.php',function(answer){
		$('#container').html(answer);
	});
});
</script>
</html>