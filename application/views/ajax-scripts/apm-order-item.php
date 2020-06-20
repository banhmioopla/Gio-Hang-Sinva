<script type="text/javascript">
$(document).ready(function(){
	
	if($( window ).width() > 768){
		$( ".apm-order" ).sortable({
		    placeholder : "ui-state-highlight",
		    cancel: '.address-detail,[contenteditable]',
		    update  : function(event, ui){
			    var item_id_array = new Array();
			    var district = $('.apm-order.active.show').attr('id').split('_')[1];
			    $('.address-item-block').each(function(){
			    	item_id_array.push($(this).attr("id").split('-')[1]);
			    });
			    $.ajax({
			    	url:"<?= base_url() ?>Apartment/OrderItem",
			    	method:"POST",
			    	data:{page_id_array:item_id_array, district: district},
			    	success:function(data){
			        	console.log("ORDER SUCCESS ... "+data);
			    	}
		   		});
		  	}
	 	});
	}
    
});


</script>