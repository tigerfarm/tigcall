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

tokenHost = process.env.TOKEN_HOST;
console.log("+ tokenHost :" + tokenHost + ":");

http.createServer(function (request, response) {

    var uri = url.parse(request.url).pathname;
    var filename = path.join(process.cwd(), uri);
    fs.exists(filename, function (exists) {
        console.log("+ request.url: " + request.url + ", URI: " + uri);

        // ---------------------------------------------------------------------
        if (uri === "/generateTrToken.php") {
            // "generateTrToken.php?tokenPassword=" + tokenPassword + "&=clientid" + clientId
            // /generateTrToken?clientid=me&tokenPassword=yes
            var query = require('url').parse(request.url, true).query;
            console.log("+ generateTrToken, tokenPassword=" + query.tokenPassword + ' clientid=' + query.clientid);
            const exec = require('child_process').exec;
            const theProgramName = uri;
            const theProgram = 'php ' + path.join(process.cwd(), theProgramName) + " " + query.tokenPassword + " " + query.clientid;
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
        if (uri === "/conferenceEndFn.php") {
            // /conferenceEnd?conferenceName=support
            var query = require('url').parse(request.url, true).query;
            console.log("+ conferenceEndFn, conferenceName=" + query.conferenceName);
            const exec = require('child_process').exec;
            const theProgramName = uri;
            const theProgram = 'php ' + path.join(process.cwd(), theProgramName) + " " + query.conferenceName;
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
        if (uri === "/participantsHoldOn.php"
                || uri === "/participantsHoldOff.php"
                || uri === "/participantRemove.php") {
            var query = require('url').parse(request.url, true).query;
            console.log("+ " + uri + ", conferenceId=" + query.conferenceId + " callSid=" + query.callSid);
            const exec = require('child_process').exec;
            const theProgramName = uri;
            const theProgram = 'php ' + path.join(process.cwd(), theProgramName) + " " + query.conferenceId + " " + query.callSid;
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
        if (uri === "/conferenceJoin.php"
                || uri === "/conferenceJoinRm.php") {
            var query = require('url').parse(request.url, true).query;
            console.log("+ " + uri + ", callFrom=" + query.callFrom + " callTo=" + query.callTo + " conferenceName=" + query.conferenceName);
            const exec = require('child_process').exec;
            const theProgramName = uri;
            const theProgram = 'php ' + path.join(process.cwd(), theProgramName) + " " + query.callFrom + " " + query.callTo + " " + query.conferenceName;
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
        if (uri === "/taskReservationTaskFix.php") {
            // /taskReservationTaskFix?taskSid=WTxxxxxx
            var query = require('url').parse(request.url, true).query;
            console.log("+ taskReservationTaskFix, taskSid=" + query.taskSid);
            const exec = require('child_process').exec;
            const theProgramName = uri;
            const theProgram = 'php ' + path.join(process.cwd(), theProgramName) + " " + query.taskSid;
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
            console.log("+ Run: " + uri);
            const exec = require('child_process').exec;
            const theProgramName = uri;
            const theProgram = 'php ' + path.join(process.cwd(), theProgramName);
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
