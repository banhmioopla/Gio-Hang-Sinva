<script type="text/javascript">
  $(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'none';

    var t = $('.datatable').DataTable({
        "dom" : "<'row'<'col-md-12 col-12'ftr>>" +
                "<'row mb-2'<'col-4'><'col-4'B>>" +
            "<'row'<'col-5'l><'col-md-2'><'col-5'p>>",
        buttons: [
            {
                extend: 'excel',
                text: 'Exce',
                title: 'DS Phòng <?= date('d-m-Y') ?>' 
            },
            {
                extend: 'copy',
                text: 'copy'
            }
        ],
        "info": false,
        "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
        "pageLength": 5,
        "oLanguage": {
            "sLengthMenu": "Xổ _MENU_ phòng",
            "oPaginate": {
                "sNext": ">>", 
                "sPrevious": "<<"
            }
        }
    });

    $('.room-new').on('click',function(){
        var btn_id = $(this).attr('id');
        var apm_id = btn_id.split('-')[2];
        console.log('Current new room >> apm_id.id :: '+ apm_id);
        var t = $('#room-table-'+ apm_id).DataTable();
        
        var room_new_id;
        $.ajax({
            method: 'POST',
            url: '<?= base_url() ?>Room/Add',
            data: {apm_id:apm_id},
            success: function(res){
                res = JSON.parse(res);
                console.log('new id is :: ' + res.room_new_id);
                
                var btn_view = '<div class="room-delete text-center"><button id="room-delete-' + res.room_new_id + '" class=" btn-sm btn btn-danger"><i class="mdi mdi-delete-circle"></i></button><div id="confirm-room-delete-' + res.room_new_id + '"></div></div>';
                var new_row = `
                    <tr id="room-${res.room_new_id}">
                        <td id="maphong-${res.room_new_id}" contenteditable="true"></td>
                        <td id="id_type-${res.room_new_id}" contenteditable="true">
                            
                        </td>
                        <td id="price-${res.room_new_id}" contenteditable="true" class="font-weight-bold">
                            
                        </td>
                        <td id="square-${res.room_new_id}" contenteditable="true">
                            
                        </td>
                        <td id="id_status-${res.room_new_id}" class="room-status font-weight-bold text-info">
                            
                        </td>
                        <td id="saptrong-${res.room_new_id}" contenteditable="true">
                            
                        </td>
                        <td>
                         ${btn_view}
                        </td>
                    </tr>` ; 
                t.row.add( $(new_row)[0]).draw(false);
            }
        });
    });

});
</script>
