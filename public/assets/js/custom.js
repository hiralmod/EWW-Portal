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

            Swal.fire("Status changed!", "status has been changed.", "success");

            $.ajax({
                url: "/admin/change_status",
                method: "POST",
                data: {
                    id: id,
                    table: table,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                dataType: "json",
                success: function (response) {
                    if (response == 1) {
                        document.getElementById("status_" + id).innerHTML ='1';
                    } else if (response == 0) {
                        document.getElementById("status_" + id).innerHTML ='0';
                    }
                },
            });
        }
    });
}


function delete_record(e) {
    var id = $(e).data("id");
    var table = $(e).data("table");

    Swal.fire({
        title: "Are you sure that you want to delete of this record?",
        text: "",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28D094",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
    }).then((result) => {
        if (result.value) {
            Swal.fire("Recorde Delete!", "record has been deleted", "success");
            $.ajax({
                url:  "/admin/delete_record",
                method: "POST",
                data: {
                    id: id,
                    table: table,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                dataType: "json",
                success: function (response) {
                    if (response == 1) {
                        location.reload();
                    }
                },
            });
        }
    });
}