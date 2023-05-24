function change_status(e) {
    var id = $(e).data("id");
    var table = $(e).data("table");
    Swal.fire({
        title: "Are you sure that you want to change status of this record?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28D094",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {

            Swal.fire("Status changed!", "Status has been changed.", "success");

            $.ajax({
                url: "/admin/change_status",
                method: "GET",
                data: {
                    id: id,
                    table: table,
                },
                dataType: "json",
                success: function (response) {
                    if (response == 1) {
                        document.getElementById("status_" + id).innerHTML ='1';
                    } else if (response == 0) {
                        document.getElementById("status_" + id).innerHTML ='0';
                    }
                    $('.datatable').DataTable().ajax.reload();
                },
            });
        }
    });
}

function delete_record(e) {
    var id = $(e).data("id");
    var table = $(e).data("table");

    Swal.fire({
        title: "Are you sure that you want to delete this record?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28D094",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            Swal.fire("Record Deleted!", "Record has been deleted", "success");
            $.ajax({
                url:  "/admin/delete_record",
                method: "GET",
                data: {
                    id: id,
                    table: table,
                },
                dataType: "json",
                success: function (response) {
                    if (response == 1) {
                        location.reload();
                    }
                    $('.datatable').DataTable().ajax.reload();
                },
            });
        }
    });
}

$(document).ready(function () {
  
    $('#country').on('change', function () {
        var idCountry = this.value;
        $("#state").html('');
        $.ajax({
            url: "/admin/fetchStates",
            type: "GET",
            data: { country_id: idCountry },
            dataType: 'json',
            success: function (result) {
                $('#state').html('<option value="" selected disabled>Select State</option>');
                $.each(result.state, function (key, value) {
                    $("#state").append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            }
        });
    });

});