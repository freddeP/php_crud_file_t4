<?php
include "header.php";
include "user_form.php";
?>

<div id = "updateFormDiv">
    <h2>Update Form</h2> <span id = "closeUpdateFormDiv">&times;</span>
    <form action="../controllers/user.php" method="post">
        <input type="email" id = "email" name="email" placeholder="email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="hidden" name="update" value = "true">
        <input type="hidden" id = "updateId" name="id" value = "">
        <input type="submit" value="Update User">
    </form>
</div>


<div id = "userInfo">


</div>



<script>

$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
    alert("An error occurred: " + thrownError);
});

    $(document).ready(initUsers);


    function initUsers(){
        $.get("../controllers/user.php", printData );

        $("#closeUpdateFormDiv").click(function(){
            $("#updateFormDiv").slideUp(400);
        })
    }

    function printData(data)
    {
       let container = $("#userInfo");

       // Testa att skriva ut baklänges vid tillfälle. 
     
       data.forEach(function(user){
           container.append("<div><h4>"+user.id+"</h4>"+
           "<p>"+user.email+"</p>"+
            "<button class = 'delete' id = '"+user.id+"' >"+
            "delete user</button>"+
            "<button class = 'update' title = '"+user.email+"'  id = 'u"+user.id+"'>update user</button>"+
            "</div>"
           );
       });  // end forEach

        $(".delete").click(deleteUser);
        $(".update").click(updateUser);
    }

    function updateUser()
    {
        $("#updateFormDiv").slideDown(400);

        var key = this.id.substring(1); 
        var email = this.title;
        $("#updateId").val(key);
        $("#email").val(email);

    }

    function deleteUser()
    {
        //console.log(this.id);

        $.post("../controllers/user.php",
        {delId : this.id}, (result, err)=>{
          
           $("#"+this.id).parent().remove();
            console.log(result);
        });
    }

</script>
<?php
include "footer.php";
?>