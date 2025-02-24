<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management</title>
    <?php include '../html/Sidebar.php'?>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- jQuery & Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom CSS -->
    <style>
        .form-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 15px;
            color: #6c757d;
        }
        .form-group {
            position: relative;
        }
        .form-control {
            padding-left: 40px;
        }
        .select2-container--default .select2-selection--multiple {
            padding-left: 40px;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            border-radius: 10px 10px 0 0;
        }
        .modal-footer {
            border-top: 1px solid #dee2e6;
            border-radius: 0 0 10px 10px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">Vehicle Management</h2>
    
    <!-- Add Vehicle Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#vehicleModal" onclick="resetForm()">
        <i class="fas fa-plus"></i> Add Vehicle
    </button>
    
    <!-- Bootstrap Modal -->
    <div class="modal fade" id="vehicleModal" tabindex="-1" aria-labelledby="vehicleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="vehicleModalLabel">Add Vehicle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="vehicleForm" enctype="multipart/form-data">
                        <input type="hidden" id="vehicle_id" name="vehicle_id">
                        <div class="form-group mb-3">
                            <label class="form-label">Vehicle Name:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-car"></i></span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter vehicle name" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Number Plate:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-tag"></i></span>
                                <input type="text" class="form-control" id="number_plate" name="number_plate" placeholder="Enter number plate" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">RC Book No:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                                <input type="text" class="form-control" id="rc_book_no" name="rc_book_no" placeholder="Enter RC book number" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">RC Book File:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-file-upload"></i></span>
                                <input type="file" class="form-control" name="rc_book_filepath" id="rc_book_filepath">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Vehicle Type:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-truck-pickup"></i></span>
                                <select class="form-select" id="type_id" name="type_id" required>
                                    <option value="4">Car</option>
                                    <option value="5">Truck</option>
                                    <option value="6">Bike</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Vehicle Colors:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-palette"></i></span>
                                <select class="form-select" id="color_id" name="color_id[]" multiple required>
                                    <option value="1">Red</option>
                                    <option value="2">Blue</option>
                                    <option value="3">Green</option>
                                    <option value="4">Yellow</option>
                                    <option value="5">Black</option>
                                    <option value="6">White</option>
                                    <option value="7">Silver</option>
                                    <option value="8">Orange</option>
                                    <option value="9">Gray</option>
                                    <option value="10">Pink</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Vehicle List Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Number Plate</th>
                <th>RC Book No</th>
                <th>RC Book File</th>
                <th>Type</th>
                <th>Colors</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="vehicleTable"></tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        // Initialize Select2
        $("#color_id").select2({
            width: "100%",
            placeholder: "Select Colors",
            allowClear: true
        });

        loadData();

        // Handle form submission
        $("#vehicleForm").submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            var action = $("#vehicle_id").val() ? "update" : "add";
            formData.append("action", action);

            $.ajax({
                url: "../php/VehicleCrud.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    response = JSON.parse(response);
                    if (response.status === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        });
                        $("#vehicleModal").modal("hide");
                        loadData();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message
                        });
                    }
                }
            });
        });
    });

    function loadData() {
        $.ajax({
            url: "../php/VehicleCrud.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                let tableRows = "";

                data.vehicles.forEach(vehicle => {
                    tableRows += `
                        <tr>
                            <td>${vehicle.id}</td>
                            <td>${vehicle.name}</td>
                            <td>${vehicle.number_plate}</td>
                            <td>${vehicle.rc_book_no}</td>
                            <td><a href="${vehicle.rc_book_file}" target="_blank">View File</a></td>
                            <td>${vehicle.type_name}</td>
                            <td>${vehicle.colors}</td>
                            <td>
                                <button class="btn btn-warning btn-sm" onclick="editVehicle(${vehicle.id})"><i class="fas fa-edit"></i> Edit</button>
                                <button class="btn btn-danger btn-sm" onclick="deleteVehicle(${vehicle.id})"><i class="fas fa-trash"></i> Delete</button>
                            </td>
                        </tr>
                    `;
                });

                $("#vehicleTable").html(tableRows);
            }
        });
    }

    function editVehicle(id) {
        $.ajax({
            url: "../php/VehicleCrud.php",
            type: "GET",
            data: { id: id, action: "fetch" },
            dataType: "json",
            success: function(data) {
                $("#vehicle_id").val(data.id);
                $("#name").val(data.name);
                $("#number_plate").val(data.number_plate);
                $("#rc_book_no").val(data.rc_book_no);
                $("#type_id").val(data.type_id);
                $("#color_id").val(data.color_ids).trigger('change');
                $("#vehicleModalLabel").text("Edit Vehicle");
                $("#vehicleModal").modal("show");
            }
        });
    }

    function deleteVehicle(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post("../php/VehicleCrud.php", { id: id, action: "delete" }, function(response) {
                    response = JSON.parse(response);
                    if (response.status === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        });
                        loadData();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message
                        });
                    }
                });
            }
        });
    }

    function resetForm() {
        $("#vehicleForm")[0].reset();
        $("#vehicle_id").val("");
        $("#color_id").val(null).trigger('change');
        $("#vehicleModalLabel").text("Add Vehicle");
    }
</script>

</body>
</html>