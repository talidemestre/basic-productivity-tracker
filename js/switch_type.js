function switchToRetrieve() {

  $("#form-title").html("Login: ");
  $("#form-type").attr("action", "php/retrieve_page.php");
  $("#switch-link").attr("onclick", "switchToCreate()");
  $("#switch-link").html("Click here to register.");
  $("#gcaptcha").hide();
  $("#gcaptcha-alt").show();
  $("#submit-button").html("Login")

}
function switchToCreate() {

  $("#form-title").html("Register: ");
  $("#form-type").attr("action", "php/create_page.php");
  $("#switch-link").attr("onclick", "switchToRetrieve()");
  $("#switch-link").html("Already have an account?");
  $("#gcaptcha").show();
  $("#gcaptcha-alt").hide();
  $("#submit-button").html("Create")


}
