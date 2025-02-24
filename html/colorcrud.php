<html lang="en">
    <head>
        <title>jQuery Select2 Multi-select Example</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    </head>
    <body>
        <div class="row mt-5">
            <div class="col-md-6 offset-3 mt-5">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5>PHP Select2 Multi-Select Colors Example</h5>
                    </div>
                    <div class="card-body" style="height: 300px;">
                        <div class="row mb-2">
                            <div class="data-response col-md-12" style="display: none;">
                                <div class="alert alert-success"></div>
                            </div>
                        </div>
                        <form method="POST">
                            <div class="form-group">
                                <label>Color Selection :</label>
                                <select class="colors form-control" name="colors[]" multiple>
                                    <option value="Red,#FF0000">Red</option>
                                    <option value="Blue,#0000FF">Blue</option>
                                    <option value="Green,#008000">Green</option>
                                    <option value="Yellow,#FFFF00">Yellow</option>
                                    <option value="Black,#000000">Black</option>
                                    <option value="White,#FFFFFF">White</option>
                                    <option value="Purple,#800080">Purple</option>
                                    <option value="Orange,#FFA500">Orange</option>
                                    <option value="Pink,#FFC0CB">Pink</option>
                                    <option value="Brown,#A52A2A">Brown</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success store-data btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.colors').select2();
            });

            $('body').on('click', '.store-data', function (e) {
                e.preventDefault();
                var colors = $('.colors').val();
                
                $.ajax({
                    method: 'POST',
                    url: '../php/storeColor.php',
                    data: { colors: colors },
                    success: function (data) {
                        $('.data-response').css('display', 'block');
                        $('.alert-success').text(data).show();
                        $(".colors").val('').trigger('change');
                    }
                });
            });
        </script>
    </body>
</html>