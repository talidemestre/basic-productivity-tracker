var Express = require("express");
var BodyParser = require("body-parser");
var Request = require("request");

var app = Express();

app.use(BodyParser.json());
app.use(BodyParser.urlencoded({ extended: true }));

const RECAPTCHA_SECRET = "6LfQws8UAAAAAGJ3xlhBZ_q-usUZZ26pTuMGuCHc";

app.post("/email", function(request, response) {
  var recaptcha_url = "https://www.google.com/recaptcha/api/siteverify?";
  recaptcha_url += "secret=" + RECAPTCHA_SECRET + "&";
  recaptcha_url += "response=" + request.body["g-recaptcha-response"] + "&";
  recaptcha_url += "remoteip=" + request.connection.remoteAddress;
  Request(recaptcha_url, function(error, resp, body) {
    body = JSON.parse(body);
    if(body.success !== undefined && !body.success) {
      return response.send({ "message": "Captcha validation failed" });
    }
    response.header("Content-Type", "application/json").send(body);
  });
});

var server = app.listen(3000, function() {
  console.log("Listening on port " + server.address().port + "...");
});
