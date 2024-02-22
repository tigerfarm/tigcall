// -----------------------------------------------------------------------------
// TaskRouter web server
// 
// Easy to use.
// Install modules.
//  $ npm install --save express
//  $ npm install --save twilio
//  
// Run the web server. Default port is hardcoded to 8000.
//  $ node websever.js
// 
// -----------------------------------------------------------------------------
console.log("+++ TaskRouter application web server is starting up, version 4.0.");
// -----------------------------------------------------------------------------
// 
var makeRequest = require('request');
// 
// -----------------------------------------------------------------------------
// $ npm install express --save
const express = require('express');
const path = require('path');
const url = require("url");
// When deploying to Heroku, must use the keyword, "PORT".
// This allows Heroku to override the value and use port 80. And when running locally can use other ports.
const PORT = process.env.PORT || 8000;
var app = express();
//
// -----------------------------------------------------------------------------
// -----------------------------------------------------------------------------
// tigcall

function runPhpProgram(theProgramName, theParameters, response) {
    // const theProgram = '/app/.heroku/php/bin/php ' + path.join(process.cwd(), theProgramName) + " " + theParameters;
    const theProgram = 'php ' + path.join(process.cwd(), theProgramName) + " " + theParameters;
    console.log("+ Run: " + theProgram);
    const exec = require('child_process').exec;
    exec(theProgram, (error, stdout, stderr) => {
        theResponse = `${stdout}`;
        console.log('+ theResponse: ' + theResponse);
        if (error !== null) {
            console.log(`exec error: ${error}`);
        }
        response.send(theResponse);
    });
}


// ------------------------------------------------------------
// -----------------------------------------------------------------------------
var returnMessage = '';
function sayMessage(message) {
    returnMessage = returnMessage + message + "<br>";
    console.log(message);
}

// -----------------------------------------------------------------------------
// tigcall: Twilio Voice Call functions
// -----------------------------------------------------------------------------
// 
// -----------------------------------------------------------------------------
// Generate a voice token

function generateToken(theIdentity, tokenPassword) {
    if (theIdentity === "") {
        console.log("- Required: user identity for creating a token.");
        return "";
    }
    if (tokenPassword === "") {
        console.log("- Required: tokenPassword");
        return "";
    }
    sayMessage("+ Generate token, ID: " + theIdentity);

    const theToken = "abc";
    console.log("+ theToken: " + theToken);
    return(theToken);
}

// -----------------------------------------------------------------------------

app.get('/tigcall/generateToken.php', function (request, response) {
    runPhpProgram(
            '/docroot/tigcall/generateToken.php',
            " " + request.query.clientid + " " + request.query.tokenpassword,
            response);
    return;
});
app.get('/tigcall/accountNumberList.php', function (request, response) {
    runPhpProgram('/docroot/tigcall/accountNumberList.php', request.query.tokenpassword, response);
    return;
});
app.get('/tigcall/accountPhoneNumbers.php', function (request, response) {
    runPhpProgram('/docroot/tigcall/accountPhoneNumbers.php', request.query.tokenpassword, response);
    return;
});

// -----------------------------------------------------------------------------
var arrayActivities = [];
var theFriendlyName = "";
var theList = "";
app.get('/tfptaskrouter/getTrActivites', function (req, res) {
    sayMessage("+ getTrActivites for WORKSPACE_SID: ");
});


// -----------------------------------------------------------------------------
// Web server basics
// -----------------------------------------------------------------------------

app.get('/hello', function (req, res) {
    res.send('+ hello there.');
});
// -----------------------------------------------------------------------------
app.use(express.static('docroot'));
app.use(function (err, req, res, next) {
    console.error(err.stack);
    res.status(500).send('HTTP Error 500.');
});
app.listen(PORT, function () {
    console.log('+ Listening on port: ' + PORT);
});
