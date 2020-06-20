<script type="text/javascript">
	$(document).ready(function() {
/*
==============================
    Apatment, services EDITABLE SECTION 
==============================
*/
    	//modify buttons style
        $.fn.editableform.buttons =
            '<button type="submit" class="btn btn-success editable-submit btn-sm waves-effect waves-light"><i class="mdi mdi-check"></i></button>' +
            '<button type="button" class="btn btn-light editable-cancel btn-sm waves-effect"><i class="mdi mdi-close"></i></button>';
            
    	$('.address-editable').editable({
            type: 'text',
            mode: 'inline',
            inputclass: 'form-control-sm',
            rows: 2,
            emptytext: "chưa có dữ liệu",
            url: "<?= base_url() ?>Apartment/Update"
            
        });

        $('.service-info-editable div').editable({
            type: 'text',
            mode: 'inline',
            inputclass: 'form-control-sm',
            emptytext: "chưa có dữ liệu",
            url: "<?= base_url() ?>Apartment/Update"
        });
        $('.note-editable div').editable({
            type: 'wysihtml5',
            mode: 'inline',
            inputclass: 'form-control-sm',
            emptytext: "chưa có dữ liệu",
            url: "<?= base_url() ?>Apartment/Update"
        });

/*
==============================
    EDITABLE ROOM SECTION 
==============================
*/
        $("body").delegate('.apm-room td','focusout',function(){
            var id = $(this).attr('id');
            if(typeof id === 'undefined')
            {
                console.log(">>> confliting event forcusout with editable");
                return;
            }
            var splited_id = id.split('-');
            var content = $(this).text().trim();
            var apm_id = $(this).closest('.apm-room.datatable').attr('id').split('-')[2];
            console.log('apm id: ' + apm_id);
            field_name = splited_id[0];
            room_id = splited_id[1];
            console.log(
                "room id: " + room_id 
                + " & field: " + field_name 
                + " & content: " + content);
            $.ajax({
                url: '<?= base_url() ?>Room/Update',
                type:'post',
                data: {id: room_id, fieldName: field_name, content: content, apm_id: apm_id },
                success:function(){
                    console.log(">> Room.id: "+ room_id 
                                +" - content Updated: " 
                                + field_name + " => "+ content);
                }
            });
        });

        $("body").delegate('.room-status', 'click', function(){
            var content = $(this).text().trim();
            console.log(">> room.status current is: " + content);
            var apm_id = $(this).closest('.apm-room.datatable').attr('id').split('-')[2];
            var room_id = $(this).attr('id').split('-')[1];
            if (content === "") {
                content = "trống";
                $(this).text('trống');
            } else {
                content ="";
                $(this).text('');
            }

            $.ajax({
                method: 'post',
                url: "<?= base_url() ?>Room/Update",
                data: {fieldName: 'id_status',content: content, apm_id: apm_id, id: room_id },
                success: function(){
                    console.log('>> apartment.id : '+ apm_id);
                    console.log('>> room.status to: '+ content);
                }
            })
        });

    });
</script>