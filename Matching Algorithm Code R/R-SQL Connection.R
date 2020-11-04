require("RMySQL")
library(RMySQL)
args <- commandArgs(TRUE)

mydb <- dbConnect(MySQL(), user = "g1116905", password = "iegroup25", dbname = "g1116905", host = "mydb.itap.purdue.edu")
on.exit(dbDisconnect(mydb))