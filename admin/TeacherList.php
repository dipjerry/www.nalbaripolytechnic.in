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
          Upload Teacher list
        </button>
      </h5>
    </div>
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <form id="addForm">
          <div class="form-group row" id="Alumuni_membership">
            <label class="col-form-label col-sm-1 col-4">Name :</label>
            <input type="text" class="form-control form-control-sm col-sm-4 col-8" id="tName" name="tName" placeholder="Teacher Name">
            <label class="col-form-label col-4 col-sm-2">Designation :</label>
            <input type="text" class="form-control form-control-sm col-8 col-sm-4" id="tDesig" name="tDesig" placeholder="Teacher Designation">
          </div>
          <div class="form-group row">
            <label class="col-form-label col-4 col-sm-1">Mobile :</label>
            <input type="text" class="form-control form-control-sm col-8 col-sm-4" id="tMob" name="tMob" placeholder="Teacher Mobile No" maxlength="10">
            <label class="col-form-label col-4 col-sm-2">Email id :</label>
            <input type="text" class="form-control form-control-sm col-8 col-sm-4" id="tEmail" name="tEmail" placeholder="Teacher Email id">
          </div>
          <div class="form-group row">
            <label class="col-form-label col-4 col-sm-2">Qualification :</label>
            <input type="text" class="form-control form-control-sm col-8 col-sm-4" id="tQualif" name="tQualif" placeholder="Teacher Qualification">
            <label class="col-form-label col-4 col-sm-2">Department :</label>
            <!-- <input type="text" class="form-control form-control-sm col-8 col-sm-4" id="tDept" name="tDept" placeholder="Teacher Qualification"> -->
            <select class="form-control form-control-sm col-8 col-sm-2" id="tDept" name="tDept">
              <option value="" selected disabled>Choose</option>
              <option value="1">Computer Engineering</option>
              <option value="2">Electrical Engineering</option>
              <option value="3">Printing Technology</option>
              <option value="4">Science</option>
              <option value="6">Hummanities</option>
              <option value="7">Workshop</option>
            </select>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-4 col-sm-2">Date of Joining :</label>
            <input type="date" class="form-control form-control-sm col-8 col-sm-2" id="tDOJ" name="tDOJ">
            <div class="form-check col-9 col-sm-3">
              <div class="form-group">
                <label class="form-check-label"> Left Work? </label>
                <input class="form-check-input col-8 col-sm-4" id="tSw" type="checkbox" value="" id="defaultCheck1">
              </div>
            </div>
            <label class="col-form-label col-4 col-sm-2">Date of leaving :</label>
            <input type="date" class="form-control form-control-sm col-8 col-sm-2" id="tDOL" name="tDOL" placeholder="Teacher Qualification" disabled>
          </div>
          <div class="form-group row">
            <label class="col-form-label col-4 col-sm-1">Photo :</label>
            <input type="file" class="form-control form-control-sm col-8 col-sm-4" id="tPho" name="tPho">
            <div class="preview_tPhoto col-6 col-sm-2 d-flex justify-content-center" id="preview_tPhoto">
              <img src="" id="profileDisplay" style="width: 100%;">
            </div>
          </div>
          <div class="form-group row justify-content-center">
            <input type="submit" name="submit" class="btn btn-primary btn-sm" id="save-button" value="Save">
          </div>
      </div>
      </form>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn-arcd btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Edit Teacher
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <form id="addForm">
          <div class="form-group row">
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
                // contents are displayed here
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
<script type="text/javascript">
  $(document).ready(function() {
    // Load Table Records
    function loadTable() {
      $.ajax({
        url: "phpFunctions/teachers_Function.php",
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
    // insert a new teacher Records 
    $("#save-button").on("click", function(e) {
      e.preventDefault();
      var form_data = new FormData();
      if (tName == "" || tDesig == "" || tDOJ == "" || tPho == "" || tQualif == "") {
        $("#error-message").html("All fields are required.").slideDown();
        $("#success-message").slideUp();
      } else {
        // var form_data = new FormData();
        form_data.append("file", $('input[name=tPho]')[0].files[0]);
        form_data.append("name", $('input[name=tName]').val());
        form_data.append("Desig", $('input[name=tDesig]').val());
        form_data.append("Qualif", $('input[name=tQualif]').val());
        form_data.append("Mobile", $('input[name=tMob]').val());
        form_data.append("Email", $('input[name=tEmail]').val());
        form_data.append("DOJ", $('input[name=tDOJ]').val());
        form_data.append("DOL", $('input[name=tDOL]').val());
        form_data.append("method", "add");
        // form_data.append("tPho", $('input[name=tPho]').val());
        form_data.append("tEmail", $('input[name=tEmail]').val());
        $.ajax({
          url: "phpFunctions/teachers_Function.php",
          type: "POST",
          data: form_data,
          processData: false,
          contentType: false,
          success: function(data) {
            if (data == 1) {
              loadTable();
              $("#addForm").trigger("reset");
              $("#success-message").html("Data Inserted Successfully.").slideDown();
              $("#error-message").slideUp();
            } else if (data == 0) {
              $("#error-message").html("Can't Save Record.").slideDown();
              $("#success-message").slideUp();
            } else {
              $("#success-message").html(data);
            }
          }
        });
      }
    });
    // Validate Uploaded Pphotos size and extension
    $("#tPho").change(function() {
      readURL(this);
    });

    function readURL(input) {
      var a = (input.files[0].size);
      var name = input.files[0].name;
      var ext = name.split('.').pop().toLowerCase();
      if ($.inArray(ext, ['jpg', 'jpeg']) == -1) {
        alert('invalid extension!');
        input.value = "";
      } else {
        if (a > 2000000) {
          alert("large");
          input.value = "";
        } else {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              // alert(e.target.result);
              $('#profileDisplay').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
          }
        }
      }
    }
    // };
    // Search Teacher Record
    $("#search").on("keyup", function() {
      var search_term = $(this).val();
      $.ajax({
        type: "POST",
        url: "phpFunctions/teachers_Function.php",
        data: {
          method: 'live_search',
          search: search_term
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
      $.ajax({
        url: "phpFunctions/teachers_Function.php",
        type: "POST",
        data: {
          method: 'update',
          id: studentId,
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
      var teachId = $("#edit_id").val();
      var edit_name = $("#edit_name").val();
      var edit_desig = $("#edit_desig").val();
      var edit_qualif = $("#edit_qualif").val();
      var edit_email = $("#edit_email").val();
      var edit_mobile = $("#edit_mobile").val();
      var edit_DOL = $("#edit_DOL").val();
      $.ajax({
        url: "phpFunctions/teachers_Function.php",
        type: "POST",
        data: {
          method: 'uEdit',
          id: teachId,
          name: edit_name,
          desig: edit_desig,
          qualif: edit_qualif,
          email: edit_email,
          mobile: edit_mobile,
          DOL: edit_DOL,
        },
        success: function(data) {
          $("#modal").hide();
          // $("#error-message").html(data)
          // alert("gu kha");
          // alert(data);

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
    // Delete teacher record
    $(document).on("click", ".delete-btn", function() {
      if (confirm("Do you really want to delete this record ?")) {
        var Id = $(this).data("eid");
        var element = this;
        $.ajax({
          url: "phpFunctions/teachers_Function.php",
          type: "POST",
          data: {
            method: 'remove',
            id: Id,
          },
          success: function(data) {
            if (data == 1) {
              $(element).closest("tr").fadeOut();
              loadTable();
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
    // validation 
    // Check if checked  
    $("#tSw").on("change", function() {
      document.getElementById('tDOL').disabled = !this.checked;
    });
    // Mobile no validation
    $("#tMob").on("blur", function() {
      var mobNum = $(this).val();
      var filter = /^\d{10}$/;
      if (mobNum != "") {
        if (!mobNum.match(filter)) {
          setTimeout(function() {
            $("#tMob").focus();
          }, 0);
          alert("must required 10 digit ");
        }
      }
    });
    // Email Validation
    $("#tEmail").on("blur", function() {
      var emailId = $(this).val();
      var filter = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+(?:\.[a-zA-Z0-9-]+)*$/;
      if (emailId != "") {
        if (!emailId.match(filter)) {
          setTimeout(function() {
            $("#tEmail").focus();
          }, 0);
          alert("Does not match email format");
        }
      }
    });
    $("#if_left").on("change", function() {
      document.getElementById('edit_mobile').disabled = !this.checked;
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