<script type="text/javascript">
	$(document).ready(function() {
    	//modify buttons style
        $.fn.editableform.buttons =
            '<button type="submit" class="btn btn-success editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button>' +
            '<button type="button" class="btn btn-light editable-cancel btn-sm waves-effect"><i class="mdi mdi-close"></i></button>';
            
    	$('.fullname-editable').editable({
            type: 'textarea',
            mode: 'inline',
            inputclass: 'form-control-sm',
            rows: 2,
            emptytext: "chưa có dữ liệu",
            url: "<?= base_url() ?>User/update"
            
        });

       

    });
</script>