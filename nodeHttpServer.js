// -----------------------------------------------------------------------------
console.log("+++ Start: nodeHttpServer.js");

var makeRequest = require('request');

// -----------------------------------------------------------------------------
// Webserver
// -----------------------------------------------------------------------------

var http = require("http");
var url = require("url");
var path = require("path");
var port = process.argv[2] || 8000;
var fs = require("fs");

http.createServer(function (request, response) {

    var uri = url.parse(request.url).pathname;
    var filename = path.join(process.cwd(), uri);
    fs.exists(filename, function (exists) {
        console.log("+ request.url: " + request.url + ", URI: " + uri);


        // ---------------------------------------------------------------------
        if (uri === "/generateToken.php") {
            console.log("++ Get Client token.");
            var query = require('url').parse(request.url, true).query;
            console.log("+ generateToken, clientid=" + query.clientid + " " + query.tokenpassword);
            const exec = require('child_process').exec;
            const theProgramName = uri;
            const theProgram = 'php ' + path.join(process.cwd(), theProgramName) + " " + query.clientid + " " + query.tokenpassword;
            exec(theProgram, (error, stdout, stderr) => {
                theResponse = `${stdout}`;
                console.log('+ theResponse: ' + theResponse);
                // console.log(`${stderr}`);
                if (error !== null) {
                    console.log(`exec error: ${error}`);
                }
                response.writeHead(200);
                response.write(theResponse, "binary");
                response.end();
            });
            return;
        }
        // ---------------------------------------------------------------------
        if (uri === "/accountPhoneNumbers.php"
                || uri === "/accountNumberList.php"
                ) {
            var query = require('url').parse(request.url, true).query;
            console.log("+ Run: " + uri + " " + query.tokenpassword);
            const exec = require('child_process').exec;
            const theProgramName = uri;
            const theProgram = 'php ' + path.join(process.cwd(), theProgramName) + " " + query.tokenpassword;
            exec(theProgram, (error, stdout, stderr) => {
                theResponse = `${stdout}`;
                console.log('+ theResponse: ' + theResponse);
                // console.log(`${stderr}`);
                if (error !== null) {
                    console.log(`exec error: ${error}`);
                }
                response.writeHead(200);
                response.write(theResponse, "binary");
                response.end();
                console.log('+ Sent response.');
            });
            return;
        }
        // ---------------------------------------------------------------------
        // Handle static files
        if (!exists) {
            response.writeHead(404, {"Content-Type": "text/plain"});
            response.write("404 Not Found\n");
            response.end();
            return;
        }
        if (fs.statSync(filename).isDirectory()) {
            filename += '/index.html';
        }
        fs.readFile(filename, "binary", function (err, file) {
            if (err) {
                response.writeHead(500, {"Content-Type": "text/plain"});
                response.write(err + "\n");
                response.end();
                return;
            }
            response.writeHead(200);
            response.write(file, "binary");
            response.end();
        });

// -----------------------------------------------------------------------------
    });
}).listen(parseInt(port, 10));
console.log("Static file server running at\n  => http://localhost:" + port + "/\nCTRL + C to shutdown");
