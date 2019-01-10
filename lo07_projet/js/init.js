
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery
  
  $(document).ready(function () {
    $('.datepicker').datepicker();
});

$(document).ready(function () {
    $('select').formSelect();
});

$(document).ready(function(){
    $('.timepicker').timepicker();
  });