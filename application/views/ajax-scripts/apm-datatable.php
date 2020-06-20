<script type="text/javascript">
  $(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'none';
    $('.datatable').DataTable({
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
                text: 'copy',
                copySuccess: 
                {
                    1: "Copied one row to clipboardd",
                    _: "Copied %d rows to clipboardd"
                }
            },
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

});


</script>