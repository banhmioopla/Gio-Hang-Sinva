<script type="text/javascript">
	$(document).ready(function() {
		$(".apartment-tag").select2({
			tags: false,
			customClass: "Myselectbox"
		});

		$('.apartment-tag').on('select2:select', function (e) {
			console.log('>> selected - apm_id :: ' + $(this).attr('id'));
			console.log('>> option selected :: '+ e.params.data.id + ' - '+ e.params.data.text);
			var apm_id = $(this).attr('id').split('-')[2];
			$.ajax({
				url: '<?= base_url() ?>/Apartment/AddTag',
				method: 'post',
				data: {tag_slug: e.params.data.id, apm_id: apm_id},
				success: function(response){
					console.log('>> Added tag slug to apartment DONE ');
				}
			});
		});

		$('.apartment-tag').on('select2:unselecting', function (e) {
			console.log('>> unselected - apm_id :: ' + $(this).attr('id'));
			console.log('>> option selected :: '+ e.params.args.data.id + ' - '+ e.params.args.data.text);
			var apm_id = $(this).attr('id').split('-')[2];
			$.ajax({
				url: '<?= base_url() ?>/Apartment/DeleteTag',
				method: 'post',
				data: {tag_slug: e.params.args.data.id, apm_id: apm_id},
				success: function(response){
					console.log('>> Deleted tag slug to apartment DONE ');
				}
			});
		});

		$(".select2 input").addClass('form-control form-control-sm');
	})
	
</script>