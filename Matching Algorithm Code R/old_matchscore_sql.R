require("RMySQL")
library(RMySQL)
args <- commandArgs(TRUE)

mydb <- dbConnect(MySQL(), user = "g1116905", password = "iegroup25", dbname = "g1116905", host = "mydb.itap.purdue.edu")
on.exit(dbDisconnect(mydb))

sData <- dbReadTable(mydb, "Student")
oData<- dbReadTable(mydb, "Opportunities")


cData <- data.frame("Major" = sData$Major == oData$Required_Major)
cData$Location <- sData$Location == oData$Location
cData$GPA <- sData$GPA >= oData$Min_GPA
cData$Year <- sData$Year >= oData$Min_Year
cData$Opportunity_Type <- sData$Opportunity_Type == oData$Opportunity_Type
cData$Work_Sponsorship <- sData$Work_Sponsorship == oData$Work_Sponsorship
#Create a new column which returns the percent of requirements met
cData$Match_Score <- apply(cData, 1, function(x)(sum(x)/length(cData[1,]))*100)

skills <- oData$Skill

i<-1
weightSums <- c(1:length(skills))*0
while(i < length(skills))
{
  if(skills[i] == "Technical Design")
  {
    weightSums[i] <- 5 * (sData$Technical_Design_Skill)
  }
  else if(skills[i] == "Statistics")
  {
    weightSums[i] <- 5 * (sData$Statistics_Skill)
  }
  else if(skills[i] == "Programming")
  {
    weightSums[i] <- 5 * (sData$Programming_Skill)
  }
  i <- i+1
}

cData$Weight_Score<-(cData$Match_Score +  weightSums)

matchResults <- data.frame("Email"=sData$Email, "Opportunity_ID" = oData$Opportunity_ID, "Match_Score" = cData$Match_Score,"Weight_Score" = cData$Weight_Score)

dbWriteTable(mydb, "Match_Score", matchResults, overwrite = TRUE, row.names = FALSE)