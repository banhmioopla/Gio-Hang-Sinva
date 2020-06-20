<script type="text/javascript">
	$('.confirm-change-pw').click(function() {
		var new_pass = $('#change-password').val();
		var user_id = $('.user_id').attr('id');
		$.ajax({
			url: '<?= base_url() ?>User/changePass',
			data: {user_id: user_id, new_pass: new_pass },
			type: 'post'

		}).done(function(data) {
		    $('.confirm-change-pw').replaceWith('<div class=" text-center text-success">Đổi mật khẩu thành công</div>');
		})
	});
</script>