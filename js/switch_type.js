function switchToRetrieve() {

  $("#form-title").html("Retrieve Page: ");
  $("#form-type").attr("action", "php/retrieve_page.php");
  $("#switch-link").attr("onclick", "switchToLogin()");


}
function switchToLogin() {

  $("#form-title").html("Create Page: ");
  $("#form-type").attr("action", "php/create_page.php");
  $("#switch-link").attr("onclick", "switchToRetrieve()");


}
