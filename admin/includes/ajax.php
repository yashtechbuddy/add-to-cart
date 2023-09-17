<script type="text/javascript">
    // $(document).ready(function() {
    //     $('#department').submit(function(e) {

    //         var formData = {
    //             name: $("#name").val(),
    //         };

    //         console.log(dptId);
    //         $.ajax({
    //             url:d 'data.php',
    //             type: 'POST',
    //             data: formData,

    //         }).done(function(response) {
    //             // Handle the response from the PHP script
    //             $('#role').append(response);
    //         })
    //     });
    //     fa - eye - slash
    //     $('#status').click(function() {

    //     })

    // })

    //status employee
    function toggleStatus(tbl, field, id) {
        var id = id;
        var tbl = tbl;
        var field = field;
        console.log(tbl, id);
        $.ajax({
            url: 'data.php',
            method: "post",
            data: {
                id: id,
                tbl: tbl,
                field: field
            },
            success: function(result) {
                // if (result == '1') {
                //     console.log('active');
                // } else {
                //     console.log('inactive');
                // }
                console.log(result);
            }
        })
    }


    function toggleVisbility(id) {
        var id = id;
        $.ajax({
            url: 'data.php',
            method: "post",
            data: {
                product_idV: id
            },
            success: function(result) {
                if (result == '1') {
                    console.log('active');
                } else {
                    console.log('inactive');
                }
            }
        })
    }
</script>


<!-- ajax -->
<script type="text/javascript">
    $(document).ready(function() {
        //dept and role ajax  
        $('#dept').change(function() {

            var dptId = $('#dept').val();
            $('#role').empty();
            console.log(dptId);
            $.ajax({
                url: 'data.php',
                type: 'POST',
                data: 'dId=' + dptId,

            }).done(function(response) {
                // Handle the response from the PHP script
                $('#role').append(response);
            })
        })

        $('#product_name').change(function() {

            var pid = $('#product_name').val();
            $('#volume').empty();
            console.log(pid);
            $.ajax({
                url: 'data.php',
                type: 'POST',
                data: 'pid=' + pid

            }).done(function(response) {
                // Handle the response from the PHP script
                $('#volume').append(response)
                console.log(response)
            })
        })

        //handle the model data duplication
        // $('#addept').on('click', function() {

        //     alert(deptName);
        //     var deptName = $('#deptName').val();
        //     var erroDept = $('#erro-dept').val() = '';


        //     $.ajax({
        //         url: 'data.php',
        //         method: 'POST',
        //         data: {
        //             deptName: deptName
        //         },
        //         success: function(result) {
        //             alert(result);
        //         }
        //     })
        // })
    })
    // $(document).ready(function() {
    //     $('#example').DataTable();
    // });


    $(document).ready(function() {
        // Trigger the search function whenever the search input changes
        $(".search-table-data").on("keyup", function() {
            var data = $(this).val().toLowerCase();

            $("tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(data) > -1)
            });
        });
    });

    function searchTable() {
        // Get the search input value and convert it to lowercase
        var searchText = $('#searchInput').val().toLowerCase();

        // Iterate over each table row
        $('#dataTable tbody tr').each(function() {
            var rowData = $(this).text().toLowerCase();

            // Show/hide the row based on whether the search input matches the row data
            if (rowData.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
</script>