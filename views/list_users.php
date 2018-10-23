<?php
include "header.php";
?>


<div id = "userInfo">


</div>



<script>

$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
    alert("An error occurred: " + thrownError);
});

    $(document).ready(initUsers);


    function initUsers(){
        $.get("../controllers/user.php", printData );
    }

    function printData(data)
    {
       let container = $("#userInfo");

     
       data.forEach(function(user){
           container.append("<h4>"+user.id+"</h4>"+
           "<p>"+user.email+"</p>"+
            "<button class = 'delete' id = '"+user.id+"' >"+
            "delete user</button>"
           )
       });  // end forEach

       $(".delete").click(deleteUser);
    }

    function deleteUser()
    {
        //console.log(this.id);

        $.post("../controllers/user.php",
        {delId : this.id},
        function(result, err){
            alert(err);
            console.log(result);
        });
    }

</script>
<?php
include "footer.php";
?>