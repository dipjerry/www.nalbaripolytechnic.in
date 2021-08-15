<?php
// echo ("DB_HOST");
// echo (realpath(__DIR__ . "/vendor/autoload.php"));
require("vendor/envParser.php");
// echo ($_ENV["DB_HOST"]);
// echo ("car");    
?>
<div class="table-responsive ">
    <table class="table text-center sl-table" id="main" border="0" cellspacing="0">
        <tr>
            <td id="table-form">
                <form id="addForm">
                    <div class="form-group row">

                        <label for="Batch" class="col-form-label col-sm-1">Batch:</label>
                        <select name="Batch" class="form-control col-sm-2" id="Batch">
                            <option value="0" selected disabled>Select Batch</option>
                            <option value="2019">2019</option>
                            <option value="2018">2018</option>
                            <option value="2017">2017</option>
                        </select>

                        <label for="Branch" class="col-form-label col-sm-1"> Branch:</label>
                        <select name="Branch" class="form-control col-sm-2" id="Branch">
                            <option value="0" selected disabled>Select Branch</option>
                            <option value="CSE">CSE</option>
                            <option value="EEE">EEE</option>
                            <option value="PT">PT</option>
                        </select>


                        <div class="input-group col-md-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Search</div>
                            </div>
                            <input class="form-control " type="search" id="search" autocomplete="off">
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        <tr class="text-center">
            <td class="text-center" id="table-data">
            </td>
        </tr>
    </table>
</div>

<div id="error-message"></div>
<div id="success-message"></div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Load Table Records
        function loadTable() {
            $.ajax({
                url: "./class/t_functions.php",
                type: "POST",
                data: {
                    method: 'load',
                },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        }
        loadTable(); // Load Table Records on Page Load
        // Live Search
        $("#search").on("keyup", function() {

            var search_term = $(this).val();

            $.ajax({
                type: "POST",
                url: "./class/t_functions.php",
                data: {
                    method: 'live_search',
                    search: search_term
                },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        });
        // select batch
        $("#Batch").on("change", function() {
            var filter_term = $(this).val();

            $.ajax({
                url: "./class/t_functions.php",
                type: "POST",
                data: {
                    method: 'batch',
                    batch: filter_term
                },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        });
        $("#Branch").on("change", function() {
            var filter_term = $(this).val();
            var batch_term = $("#Batch").val();

            $.ajax({

                url: "./class/t_functions.php",
                type: "POST",
                data: {
                    method: 'filter',
                    filter: filter_term,
                    batch: batch_term
                },
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        });
    });
</script>