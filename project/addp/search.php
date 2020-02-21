   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<input type="text" id="search" placeholder="Search"/>

<div id="display"></div>

<script type="text/javascript">
$(document).ready(function() {
   $("#search").keyup(function() {
       var name = $('#search').val();
       //Validating, if "name" is empty.
       if (name == "") {
           $("#display").html("");
       }
       else {
           $.ajax({
               type: "POST",
               url: "result.php",
               data: {
                   search: name
               },
               success: function(html) {
                   $("#display").html(html).show();
               }
           });
       }
   });

});
</script>