//Lets require/import the HTTP module
var http = require("http"),
    url = require("url"),
    qs = require("querystring");

//Create a server
var server = http.createServer(function (req, res) {
    var body = "";

    req.on("data", function (data) {
        body += data;
    });

    req.on("end", function () {
        var request = qs.parse(body),
            query = url.parse(req.url, true),

            data = {
                url: query.pathname,
                query: query.query,
                request: request
            };

        switch (query.pathname) {
            case "/500":
                res.writeHead(500, { "Content-Type": "text/plain" });
                res.end("500 Internal Server Error");
                break;
            case "/404":
                res.writeHead(404, { "Content-Type": "text/plain" });
                res.end("404 Not Found");
                break;
            case "/301":
                res.writeHead(301, { "Location": "/" })
                res.end("301 Moved Permanently");
                break;
            default:
                res.writeHead(200, { "Content-Type": "application/json" });
                res.end(JSON.stringify(data));
        }
    });
});

//Lets start our server
server.listen(80, function(){
    console.log("Server listening on: http://localhost:80");
});
