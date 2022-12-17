"use strict"

//importacions i creació de constants per a la seva utiliutzació
const express = require('express')
const bodyParser = require('body-parser')
const mysql = require('mysql');
const app = express();
const path = require('path');
const { connect } = require('http2');

// Port config
const port = process.env.PORT || 3000

// configuració del bodyParser perquè admeti entrades json
app.use(bodyParser.urlencoded({ extended: true }))
app.use(bodyParser.json())

// Use '../frontend' for the main folder
app.use(express.static(path.join(__dirname, './public')));

//Create mysql connection
let connection = mysql.createConnection({
  host: "127.0.0.1",
  database: "examenuf2",
  user: "root",
  password: "",
  multipleStatements: true,
});

//*Get all the data from DataBase
app.get("/api/project", (req, res) => {
  connection.connect(function (err) {
    if (err) {
      console.log("Error connectiong " + err.stack);
      return;
    }
    console.log("Connected as id: " + connection.threadId);
  });

  connection.query("SELECT * FROM project", (error, results, field) => {
    if (error) {
      res.status(400).send({ response: null });
    } else {
      //Connection OK
      res.status(200).send({ response: results });
    }
  });
});



app.listen(port, () => {
	console.log(`Aquesta és la nostra API-REST que corre en http://localhost:${port}`)
})
