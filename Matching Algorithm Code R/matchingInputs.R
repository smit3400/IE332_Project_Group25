require("RMySQL")
library(RMySQL)
install.packages("data.table")
library(data.table)
args <- commandArgs(TRUE)

##Connect to the database
mydb <- dbConnect(MySQL(), user = "g1116905", password = "iegroup25", dbname = "g1116905", host = "mydb.itap.purdue.edu")
on.exit(dbDisconnect(mydb))


##Initialize student data and all opportunities data into dataframes
sData <- dbReadTable(mydb, "Student")
oData<- dbReadTable(mydb, "Opportunities")

i<-1
matchTable <- data.frame("Email" = character(), "Opportunity_ID"  = integer(), "Match_Score" = integer(),"Weight_Score" = integer())
while(i<=length(sData$Email))
{
  temp <- matching(sData = sData[i,], oData = oData)
  matchTable <- rbind(matchTable,temp)
  i<-i+1
}

dbWriteTable(mydb, "Match_Score", matchTable, overwrite = TRUE, row.names = FALSE)

