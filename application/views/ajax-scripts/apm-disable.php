<script type="text/javascript">
$(document).ready(function(){
	console.log("============================");
	console.log("====     apm-enable.php ====");
	console.log("============================");

	Array.prototype.slice.call($('.apm-disable')).forEach(function(sw){
	  var switchery = new Switchery(sw, {
	  	 size:"small",
         color: '#ff5d48'
	  });
	});
	
	$('.apm-disable').change(function() {
		console.log('>> disable apartment :: clicked');
		console.log('>> checked ? :: '+$(this).is(':checked'));
		var apm_id = $(this).attr('id').split('-')[2];
		var checked = $(this).is(':checked').toString() == 'true' ? 'false':'true';
		$.ajax({
		  	url: '<?= base_url() ?>Apartment/Update',
		  	data: {pk: apm_id, name: 'active', value: checked },
		  	method: 'post',
		  	success: function(){
		  		console.log("apartment.id change to :: "+ apm_id);
		  		console.log("update active this apartment to :: "+checked);
		  	}
		  });
		if(checked == 'false')
		{
			$(this).closest(".address-item-block").fadeOut(2000, function() {
			        $(this).closest(".address-item-block").remove();
			});
		}
	});
    
});


</script>