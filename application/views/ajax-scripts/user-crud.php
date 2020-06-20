<script type="text/javascript">
  $(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'none';
    $('.datatable').DataTable({
        "info": false,
        "lengthMenu": [ 10, 25, 50, 75, 100 ],
        "pageLength": 5,
        "language": {
            "paginate": {
              "next" : " >>",
              "previous": "<< "
            },
            "search":""
        },
        "oLanguage": {
            "sLengthMenu": "Xổ _MENU_ Members"
        },
        "order": [[ 2, "desc" ]]
    });


});
</script>