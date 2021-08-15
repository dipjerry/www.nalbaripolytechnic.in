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
          Add Allumuni
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn-arcd btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="allum_p">
          Pending Allumuni
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <div class="table-responsive ">
          <table class="table text-center sl-table" id="main" border="0" cellspacing="0">
            <tr>
              <td id="table-data-p">
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn-arcd btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne" id="allum_r">
          view Allumuni
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        <form id="addForm">
          <div class="form-group row">
            <label for="Batch" class="col-form-label col-sm-1 col-4">Batch:</label>
            <select name="Batch" class="form-control form-control-sm col-sm-2 col-8" id="Batch">
              <option value="0" selected disabled>Select Batch</option>
              <option value="2020">2020</option>
              <option value="2019">2019</option>
              <option value="2018">2018</option>
              <option value="2017">2017</option>
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
              <td id="table-data-r">
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
    function loadTableP() {
      $.ajax({
        url: "phpFunctions/allum_function.php",
        type: "POST",
        data: {
          method: 'load_p',
        },
        success: function(data) {
          $("#table-data-p").html(data);
        }
      });
    }
    // $("#allum_p").on("click", function(e) {
    loadTableP(); // Load Table Records on Page Load
    // });
    function loadTableR() {
      $.ajax({
        url: "phpFunctions/allum_function.php",
        type: "POST",
        data: {
          method: 'load_r',
        },
        success: function(data) {
          $("#table-data-r").html(data);
        }
      });
    }
    // $("#allum_r").on("click", function(e) {
    loadTableR(); // Load Table Records on Page Load
    // });
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
        url: "phpFunctions/allum_function.php",
        data: {
          method: 'live_search',
          search: search_term
        },
        success: function(data) {
          $("#table-data-r").html(data);
        }
      });
    });
    // select batch
    $("#Batch").on("change", function() {
      var filter_term = $("#Batch").val();

      $.ajax({
        url: "phpFunctions/allum_function.php",
        type: "POST",
        data: {
          method: 'batch',
          batch: filter_term
        },
        success: function(data) {
          $("#table-data-r").html(data);
        }
      });
    });
    //Show Modal Box

    // Delete
    $(document).on("click", ".reject-btn", function() {
      if (confirm("Do you really want to delete this record ?")) {
        var tId = $(this).data("eid");
        var element = this;
        $.ajax({
          url: "phpFunctions/allum_function.php",
          type: "POST",
          data: {
            method: 'remove',
            id: tId,
          },
          success: function(data) {
            if (data == 1) {
              $(element).closest("tr").fadeOut();
              loadTableR();
              loadTableP();
              $("#error-alert").show();
              $("#error-message").html("Record removed.").show();
              // $("#success-message").slideUp();
            } else if (data == 0) {
              $("#modal").hide();
              // loadTable();
              $("#error-message").html("Can't remove Record.").slideDown();
              $("#error-message").slideUp();
            }
          }
        });
      }
    });

    // accept
    $(document).on("click", ".approve-btn", function() {
      if (confirm("Do you really want to accept this person ?")) {
        var tId = $(this).data("eid");
        var element = this;
        $.ajax({
          url: "phpFunctions/allum_function.php",
          type: "POST",
          data: {
            method: 'accept',
            id: tId,
          },
          success: function(data) {
            if (data == 1) {
              $(element).closest("tr").fadeOut();
              loadTableR();
              loadTableP();
              $("#success-alert").show();
              $("#success-message").html("accepted.").show();
              // $("#success-message").slideUp();
            } else if (data == 0) {
              $("#modal").hide();
              // loadTable();
              $("#error-message").html("error accepting.").slideDown();
              $("#success-message").slideUp();
            }
          }
        });
      }
    });
  });


  $('#success').on("click", function() {
    $("#success-alert").hide();

  });
  $('#error').on("click", function() {
    // alert("hide");
    $("#error-alert").hide();

  });
</script>