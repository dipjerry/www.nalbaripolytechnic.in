<div class="alert alert-warning alert-dismissible fade show" id="error-alert" style="display: none;">
  <strong>Warning!</strong>
  <span id="error-message"></span>
  <button type="button" class="close" id="error">
    &times;
  </button>
</div>
<div class="alert alert-success alert-dismissible fade show" id="success-alert" style="display: none;">
  <strong>Success!</strong>
  <span id="success-message"></span>
  <button type="button" class="close" id="success">
    &times;
  </button>
</div>
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn-arcd btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Upload student list
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <form method="post" action="class/file-upload.php" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-2 col-4">Batch year</label>
            <div class="col-sm-3 col-8">
              <input type="number" name="BatchYear" class="form-control form-control-sm" value="<?php echo date("Y") ?>" />
            </div>

            <label class="col-sm-2 col-3">Select File</label>
            <div class="col-sm-5 col-9">
              <input type="file" name="uploadfile" class="form-control-file form-control-sm" />
            </div>
          </div>
          <?php date("y") ?>
          <div class="form-group row">
            <label class="col-3"></label>
            <div class="col-8">
              <input value="save" type="submit" name="submit" class="btn btn-primary btn-sm save-btn">
              <input type="reset" name="submit" value="reset" class="btn btn-danger btn-sm" onclick="window.location.href='delete.php';">
            </div>
          </div>
        </form>
        <Center>
          <h4>or</h4>
        </Center>

        <form>
          <div class="form-group row">
            <label class="col-form-label col-sm-1 col-4">Name :</label>
            <input type="text" class="form-control form-control-sm col-sm-4 col-8" id="sName" placeholder="Student Name">

            <label class="col-form-label col-4 col-sm-1">Roll No:</label>
            <input type="text" class="form-control form-control-sm col-8 col-sm-4" id="sRoll" placeholder="Student Roll No">
          </div>
          <div class="form-group row">
            <label class="col-form-label col-sm-1 col-4">Branch:</label>
            <select name="Branch" class="form-control form-control-sm col-sm-4 col-3" id="sBranch">
              <option value="0" selected disabled>Select Branch</option>
              <option value="CSE">CSE</option>
              <option value="EEE">EEE</option>
              <option value="PT">PT</option>
            </select>

            <label class="col-form-label col-sm-1 col-3">Batch:</label>
            <select name="Branch" class="form-control form-control-sm col-sm-4 col-3" id="sBatch">
              <option value="0" selected disabled>Select Batch</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
            </select>

            <!-- <input type="email" class="form-control form-control-sm col-sm-4 col-2"> -->
          </div>
          <input value="save" type="submit" name="submit" class="btn btn-primary btn-sm" id="save-button">
        </form>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn-arcd btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Edit Student
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <form id="addForm">
          <div class="form-group row">

            <label for="Batch" class="col-form-label col-sm-1 col-4">Batch:</label>
            <select name="Batch" class="form-control form-control-sm col-sm-2 col-8" id="Batch">
              <option value="0" selected disabled>Select Batch</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
            </select>

            <label for="Branch" class="col-form-label col-sm-1 col-4"> Branch:</label>
            <select name="Branch" class="form-control form-control-sm col-sm-2 col-8" id="Branch">
              <option value="0" selected disabled>Select Branch</option>
              <option value="CSE">CSE</option>
              <option value="EEE">EEE</option>
              <option value="PT">PT</option>
            </select>


            <div class="input-group input-group-sm col-md-6">
              <div class="input-group-prepend">
                <div class="input-group-text" id="inputGroup-sizing-sm">Search</div>
              </div>
              <input class="form-control " type="search" id="search" autocomplete="off">
            </div>
          </div>

        </form>
        <div class="table-responsive ">
          <table class="table text-center sl-table" id="main" border="0" cellspacing="0">


            <tr>
              <td id="table-data">
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('btn-arcd').click(function() {
      //store the id of the collapsible element
      localStorage.setItem('collapseItem', $(this).attr('href'));
    });

    var collapseItem = localStorage.getItem('collapseItem');
    if (collapseItem) {
      $(collapseItem).collapse('show')
    }
  })
</script>
</div>

<div id="modal">
  <div id="modal-form">
    <h2>Edit Form</h2>
    <table cellpadding="10px" width="100%">
    </table>
    <div id="close-btn">X</div>
  </div>
</div>


<!-- <script type="text/javascript" src="js/jquery.js"></script> -->
<script type="text/javascript">
  $(document).ready(function() {
    // Load Table Records
    function loadTable() {
      $.ajax({
        url: "phpFunctions/t_functions.php",
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

    // insert Records 

    $("#save-button").on("click", function(e) {
      e.preventDefault();
      var sName = $("#sName").val();
      var sBranch = $("#sBranch").val();
      var sBatch = $("#sBatch").val();
      var sRoll = $("#sRoll").val();
      if (sName == "" || sRoll == "") {
        $("#error-message").html("All fields are required.").slideDown();
        $("#success-message").slideUp();
      } else {
        $.ajax({
          url: "phpFunctions/t_functions.php",
          type: "POST",
          data: {
            method: 'add',
            name: sName,
            branch: sBranch,
            batch: sBatch,
            roll: sRoll
          },
          success: function(data) {
            if (data == 1) {
              loadTable();
              $("#addForm").trigger("reset");
              $("#success-message").html("Data Inserted Successfully.").slideDown();
              $("#error-message").slideUp();
            } else {
              $("#error-message").html("Can't Save Record.").slideDown();
              $("#success-message").slideUp();
            }

          }
        });
      }

    });

    // Live Search
    $("#search").on("keyup", function() {

      var search_term = $(this).val();

      $.ajax({
        type: "POST",
        url: "phpFunctions/t_functions.php",
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
      var filter_term = $("#Batch").val();

      $.ajax({
        url: "phpFunctions/t_functions.php",
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
    //filter branch

    $("#Branch").on("change", function() {
      var filter_term = $(this).val();
      var batch_term = $("#Batch").val();

      $.ajax({

        url: "phpFunctions/t_functions.php",
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
    //Show Modal Box
    $(document).on("click", ".edit-btn", function() {
      $("#modal").show();
      var studentId = $(this).data("eid");
      var batch_term = $(this).data("batch");
      $.ajax({
        url: "phpFunctions/t_functions.php",
        type: "POST",
        data: {
          method: 'update',
          id: studentId,
          batch: batch_term
        },
        success: function(data) {
          $("#modal-form table").html(data);
        }
      })
    });
    //Hide Modal Box
    $("#close-btn").on("click", function() {
      $("#modal").hide();
    });

    //Save Update Form
    $(document).on("click", "#edit_submit", function() {
      var stuId = $("#edit_id").val();
      var edit_name = $("#edit_name").val();
      var edit_branch = $("#edit_branch").val();
      var batch_term = $("#edit_batch").val();
      var edit_roll = $("#edit_roll").val();


      $.ajax({
        url: "phpFunctions/t_functions.php",
        type: "POST",
        data: {
          method: 'uEdit',
          id: stuId,
          name: edit_name,
          branch: edit_branch,
          batch: batch_term,
          roll: edit_roll
        },
        success: function(data) {
          $("#modal").hide();
          // $("#error-message").html(data)
          if (data == 1) {
            $("#modal").hide();
            // alert("success");
            loadTable();
            $("#success-alert").show();
            $("#success-message").html("Record updated.").show();
            // $("#success-message").slideUp();

          } else if (data == 0) {
            $("#modal").hide();
            // loadTable();
            $("#error-message").html("Can't update Record.").slideDown();
            $("#success-message").slideUp();
          }
        }
      })
    });

    // Delete
    $(document).on("click", ".delete-btn", function() {
      if (confirm("Do you really want to delete this record ?")) {
        var studentId = $(this).data("eid");
        var batch_term = $(this).data("batch");
        var element = this;
        $.ajax({
          url: "phpFunctions/t_functions.php",
          type: "POST",
          data: {
            method: 'remove',
            id: studentId,
            batch: batch_term
          },
          success: function(data) {
            if (data == 1) {
              $(element).closest("tr").fadeOut();
              // loadTable();
              alert("ok");

            } else {
              loadTable();
              $("#error-message").html("Can't Delete Record.").slideDown();
              $("#success-message").slideUp();
            }

          }
        });
      }
    });

  });

  //
  $('#success').on("click", function() {
    $("#success-alert").hide();

  });
  $('#error').on("click", function() {
    // alert("hide");
    $("#error-alert").hide();

  });
</script>