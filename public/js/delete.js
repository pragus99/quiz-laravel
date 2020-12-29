function deleteConfirmation(id) {

  swal.fire({
    title: "Are you sure?",
    text: "You want delete this quiz?",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: true
  }).then(function (e) {
    if (e.value === true) {
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
        type: 'POST',
        url:"{{ route('quiz.destroy',"+id+") }}",
        data: { _token: CSRF_TOKEN },
        dataType: 'JSON',
        success: function (results) {
          if (results.success === true) {
            swal("Done!", results.message, "success");
          } else {
            swal("Error!", results.message, "error");
          }
        }
      })
    } else {
      e.dismiss;
    };
  }, function (dismiss) {
    return false;
  })
};
