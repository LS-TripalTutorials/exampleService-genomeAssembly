$(document).ready(function() {
    $(document).on('keypress', '.td-search-input', function(e) {
       if (e.keyCode !== 13) {
         return
     }
     var query = $(this).val();
     var searchPage = "http://0.0.0.0:4000/lstrptut_s4rnhy/search/?q=" + query;
     document.location = searchPage;
     return false;
   });
});

