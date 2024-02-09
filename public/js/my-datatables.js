// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#categoryTable').DataTable({
    info: false,
    ordering: false,
    paging: false,
    searching: false,
    responsive: true,
  });
  
});

$(document).ready(function() {
  $('#ListTable').DataTable({
    responsive: true,
  });
  
});