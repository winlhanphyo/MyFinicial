$(document).ready(function () {
  // $("#mymodal").modal("show");
  // getaccountlist();
  $('#accountform').submit(function (e) {
    e.preventDefault();
    var id = $('#id').val();
    var bank = $('#bank').val();
    var date = $('#date').val();
    var amount = $('#amount').val();
    var accountdate = $('#accountdate').val();
    var totalinterest = $('#totalinterest').val();
    var type = $('#type').val();
    var fixedmonth = $('#fixedmonth').val();
    var formdata = new FormData();
    formdata.append('id', id);
    formdata.append('bank', bank);
    formdata.append('date', date);
    formdata.append('amount', amount);
    formdata.append('accountdate', accountdate);
    formdata.append('totalinterest', totalinterest);
    formdata.append('type', type);
    formdata.append('fixedmonth', fixedmonth);

    $.ajax({
      url: 'accounttask.php',
      type: 'POST',
      data: formdata,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function (data) {
        alert(data.message);
        getaccountlist();
      }
    })
  })
})

function getaccountlist() {
  $("#accountlist").html('');
  $.ajax({
    url: "accounttask.php",
    type: "post",
    data: { "getdata": "all" },
    dataType: "json",
    success: function (data) {
      i = 0;
      $.each(data, function (key, value) {
        var row = $('<tr>');
        i++;
        row.append($('<td>').text(i));
        row.append($('<td>').text(value.bank));
        row.append($('<td>').text(value.date));
        row.append($('<td>').text(value.amount));
        row.append($('<td>').text(value.accountdate));
        row.append($('<td>').text(value.totalinterest));
        row.append($('<td>').text(value.type));
        row.append($('<td>').text(value.fixedmonth));
        row.append($('<td>').html("<button class='btn btn-info' onclick='editstudent(" + value.id + ")'>Update</button>"));
        row.append($('<td>').html("<button class='btn btn-danger' onclick='togglestudent(\"delete\"," + value.id + ")'>Delete</button>"));
        $('#accountlist').append(row);
      })
      // end loop
    }
    // end success
  })
  location.reload();
}

function changestudent(status, id) {
  if (status == 'add') {
    $('.modal-title').text("Add account");
    $('#accountform button').text("Add");
    $('#id').val(id);
    $('#mymodal').modal('show');
    // alert("Add");
  }
  else if (status == 'delete') {
    $.ajax({
      url: 'accounttask.php',
      type: 'post',
      data: { 'deleteid': id },
      dataType: 'json',
      success: function (data) {
        alert(data.message);
        getaccountlist();
      }
    })
  }

  else if (status == 'update') {
    $('.modal-title').text("Update account");
    $('#accountform button').text("Update");
    $.ajax({
      url: 'accounttask.php',
      type: 'post',
      data: { 'getedit': id },
      dataType: 'json',
      success: function (data) {
        $('#id').val(data.id);
        $('#bank').val(data.bank);
        $('#date').val(data.date);
        $('#amount').val(data.amount);
        $('#accountdate').val(data.accountdate);
        $('#totalinterest').val(data.totalinterest);
        $('#type').val(data.type);
        $('#fixedmonth').val(data.fixedmonth);
        $("#mymodal").modal("show");
      }
    })
  }
}