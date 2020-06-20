

<script type="text/javascript">
	$(document).ready(function() {
		$('.apm-delete button').click(function() {
			var button_delete_id = $(this).attr('id');
			console.log(">> button delete apm.id is ::: " + button_delete_id);

			$('#'+button_delete_id).addClass('d-none');
			$('#'+button_delete_id).next().addClass('d-none');
			var apm_id = button_delete_id.split('-')[2];

			$('#confirm-' + button_delete_id).append('<?= set_btn_delete_confirm() ?>');
			$('#'+button_delete_id).next().removeClass('d-none');
			$('.confirm-delete').click(function() {
				var table_id = $('#'+button_delete_id).closest('.datatable').attr('id');
				$('#'+table_id).DataTable().row($(this).closest('tr')).remove().draw();
				$.ajax({
						type:'post',
						url: '<?= base_url() ?>Apartment/Delete',
						data: {apm_id: apm_id},
						success: function(){
							console.log(">> deleted apm.id ::: " + apm_id);
						}
				});
				$(this).closest('.address-item-block').fadeOut(1000,function(){
			            $(this).closest('.address-item-block').remove();
			            console.log("remove this apm ! yeah ");
			    });
			});
			$('.confirm-delete').fadeOut(2000, function(){
				$('#'+button_delete_id).removeClass('d-none');
				$('#'+button_delete_id).next().removeClass('d-none');
				$(this).remove();
			});
		});

		$("body").delegate('.room-delete button', "click", function() {
			var button_delete_id = $(this).attr('id');
			console.log(">> button delete room.id is ::: " + button_delete_id);

			$('#'+button_delete_id).addClass('d-none');
			$('#'+button_delete_id).next().addClass('d-none');
			var room_id = button_delete_id.split('-')[2];

			$('#confirm-' + button_delete_id).append('<?= set_btn_delete_confirm() ?>');
			$('#'+button_delete_id).next().removeClass('d-none');
			$('.confirm-delete').click(function() {
				var table_id = $('#'+button_delete_id).closest('.datatable').attr('id');
				$('#'+table_id).DataTable().row($(this).closest('tr')).remove().draw();
				$.ajax({
						type:'post',
						url: '<?= base_url() ?>Room/Delete',
						data: {room_id: room_id},
						success: function(){
							console.log(">> deleted room.id ::: " + room_id);
						}
				});
			});
			$('.confirm-delete').fadeOut(3000, function(){
				$('#'+button_delete_id).removeClass('d-none');
				$('#'+button_delete_id).next().removeClass('d-none');
				$(this).remove();
			});
		});



	})
</script>