

 <?php include '../php/VehicleCrud.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management</title>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        ///////////////////////////////////////OPEN FORM FUNCTION ADD AND EDIT FORM///////////////////
        $(document).ready(function () {
            function openForm(id, name, type, owner, number) {
                $("#form1").show();
                $("#id").val(id || "");
                $("#name").val(name || "");
                $("#v_type").val(type || "");
                $("#owner").val(owner || "");
                $("#v_Number").val(number || "");
            }

            // Submit form via AJAX
            $("#form1").submit(function (event) {
                event.preventDefault(); // Prevent page reload

                const formData = new FormData(this);
                /////////////////////////////////////////////ADD AJAX API ////////////////////
                $.ajax({
                    url: '../php/VehicleCrud.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Vehicle saved successfully.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            $("#form1").hide();
                            loadVehicles(); // Reload vehicle list
                        });
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'There was an error while saving vehicle data.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });

/////////////////////////////////////DELETE VECHAIE AJAX API///////////////////////////////
         
            function confirmDelete(id) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "This action cannot be undone!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../php/VehicleCrud.php',
                            type: 'GET',
                            data: { delete: id },
                            success: function(response) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Vehicle has been deleted.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    loadVehicles(); // Reload vehicle list
                                });
                            },
                            error: function() {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'There was an error while deleting the vehicle.',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                        });
                    }
                });
            }

//////////////////////////////////////FETCH VECHILE USING AJAX API////////////////////

            function loadVehicles() {
                $.ajax({
                    url: '../php/VehicleCrud.php',
                    type: 'GET',
                    data: { fetch: true },
                    success: function(response) {
                        $("tbody").html(response);
                    },
                    error: function() {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to load vehicles.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }

            // Load vehicle list on page load
            loadVehicles();

            // Expose functions to global scope
            window.openForm = openForm;
            window.confirmDelete = confirmDelete;
        });
    </script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <button class="btn btn-primary mb-3" onclick="openForm()"><i class="fa fa-plus"></i> Add New Vehicle</button>

        <form id="form1" method="POST" enctype="multipart/form-data" class="card p-4" style="display: none;">
            <h2 class="mb-3 text-center"><i class="fa fa-car"></i> Vehicle Form</h2>
            <input type="hidden" id="id" name="id">

            <div class="mb-2">
                <label><i class="fa fa-car"></i> Vehicle Name</label>
                <input class="form-control" id="name" name="name">
            </div>
            <div class="mb-2">
                <label for="cars"><i class="fa fa-truck"></i> Vehicle Type</label>
                <select id="v_type" name="v_type" class="form-control">
                    <option value="Car">Car</option>
                    <option value="Bike">Bike</option>
                </select>
            </div>
            <div class="mb-2">
                <label><i class="fa fa-user"></i> Owner Name</label>
                <input class="form-control" id="owner" name="owner">
            </div>
            <div class="mb-2">
                <label><i class="fa fa-hashtag"></i> Vehicle Number</label>
                <input class="form-control" id="v_Number" name="v_Number">
            </div>
            <div class="mb-2">
                <label><i class="fa fa-file"></i> RC Book</label>
                <input class="form-control" type="file" name="rc_book">
            </div>
            <div class="mb-2">
                <label><i class="fa fa-image"></i> Vehicle Picture</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                <button type="button" class="btn btn-danger" onclick="$('#form1').hide()"><i class="fa fa-times"></i> Cancel</button>
            </div>
        </form>

        <h2 class="text-center mt-4"><i class="fa fa-list"></i> Vehicle List</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>SrNo</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Owner</th>
                    <th>Number</th>
                    <th>RC Book</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Vehicle list will be dynamically inserted here -->
            </tbody>
        </table>
    </div>
</body>
</html>
