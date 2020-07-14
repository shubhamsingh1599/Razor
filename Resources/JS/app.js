/* eslint-disable */ 
var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost:27017/mydb";

MongoClient.connect(url, function(err, db) {
    if (err) throw err;
    
    var dbo = db.db("mydb");
    dbo.createCollection("customers", function(err, res) {
        if (err) throw err;
        
        console.log("Collection created!");
        
        db.close();
    });
    
    var myobj = { name: "Test User", username: "test", email: "shubham.singh54@nmims.edu.in", password: "Pass@123" };
    dbo.collection("customers").insertOne(myobj, function(err, res) {
        if (err) throw err;
        
        console.log("1 document inserted");
        
        db.close();
    });
    

});