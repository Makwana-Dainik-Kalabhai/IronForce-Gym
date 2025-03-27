<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <?php include("C:/xampp/htdocs/php/IronForce-Gym/admin_panel/links.php"); ?>

    <style>
        /* Admin Panel Styles */
        :root {
            --primary: #8B0000;
            --secondary: #2C3E50;
            --light: #ECF0F1;
            --dark: #1A252F;
            --accent: #3498DB;
            --success: #27AE60;
            --warning: #F39C12;
            --danger: #E74C3C;
        }

        /* Main Content */
        .admin-main {
            flex: 1;
            padding: 20px;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #ddd;
        }

        .admin-header h1 {
            font-size: 1.8rem;
            color: var(--secondary);
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        /* Form Styles */
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }

        .card-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .card-header h2 {
            font-size: 1.5rem;
            color: var(--secondary);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--secondary);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
            outline: none;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }

        .form-col {
            flex: 1;
            padding: 0 15px;
            min-width: 250px;
        }

        /* Image Upload */
        .image-upload {
            border: 2px dashed #ddd;
            border-radius: 4px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .image-upload:hover {
            border-color: var(--primary);
        }

        .image-upload i {
            font-size: 2rem;
            color: #aaa;
            margin-bottom: 10px;
        }

        .image-upload p {
            color: #777;
            margin-bottom: 5px;
        }

        .image-upload small {
            color: #aaa;
        }

        .image-preview {
            margin-top: 15px;
            display: none;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 4px;
        }

        /* Select Styles */
        .select-wrapper {
            position: relative;
        }

        .select-wrapper:after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            pointer-events: none;
            color: #777;
        }

        select.form-control {
            appearance: none;
            padding-right: 40px;
        }

        /* Checkbox Toggle */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.toggle-slider {
            background-color: var(--success);
        }

        input:checked+.toggle-slider:before {
            transform: translateX(26px);
        }

        .toggle-label {
            margin-left: 10px;
            vertical-align: middle;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #6d0000;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background: var(--light);
            color: var(--secondary);
            border: 1px solid #ddd;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        /* Availability Table */
        .availability-table {
            width: 100%;
            border-collapse: collapse;
        }

        .availability-table th,
        .availability-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .availability-table th {
            background: #f8f9fa;
            font-weight: 600;
        }

        .availability-table tr:hover {
            background: #f8f9fa;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .form-col {
                flex: 0 0 100%;
                margin-bottom: 15px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper ">
        <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

            <div class="content">

                <div class="card">
                    <div class="card-header">
                        <h2>Service Information</h2>
                    </div>

                    <form id="serviceForm">
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="serviceName">Service Name *</label>
                                    <input type="text" id="serviceName" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="serviceCategory">Category *</label>
                                    <input type="text" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label for="servicePrice">Price *</label>
                                    <div class="input-group">
                                        <span class="input-group-text">&#8377;</span>
                                        <input type="number" id="servicePrice" class="form-control" min="0" step="0.01" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="serviceDuration">Duration (minutes) *</label>
                                    <input type="number" id="serviceDuration" class="form-control" min="5" required>
                                </div>
                            </div>

                            <div class="form-col">
                                <div class="form-group">
                                    <label for="serviceImage">Service Image *</label>
                                    <input type="file" id="serviceImage" class="form-control" accept="image/*" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="serviceDescription">Description *</label>
                            <textarea id="serviceDescription" class="form-control" required></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Toggle switch functionality
            $('#serviceStatus').change(function() {
                if ($(this).is(':checked')) {
                    $('#statusLabel').text('Active');
                } else {
                    $('#statusLabel').text('Inactive');
                }
            });
            $('#serviceImage').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#previewImage').attr('src', e.target.result);
                        $('#imagePreview').show();
                        $('#imageUpload').hide();
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });

            $('#removeImage').click(function() {
                $('#serviceImage').val('');
                $('#previewImage').attr('src', '#');
                $('#imagePreview').hide();
                $('#imageUpload').show();
            });

            // Input validation
            $('.form-control[required]').on('input', function() {
                if ($(this).val() === '') {
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>