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
cData$Weight_Score<- apply(cData, 1, function(x)(sum(x)/length(cData[1,]))*100)

matchResults <- data.frame("Email"=sData$Email, "Opportunity_ID" = oData$Opportunity_ID, "Match_Score" = cData$Match_Score,"Weight_Score" = cData$Weight_Score)

dbWriteTable(mydb, "Match_Score", matchResults, overwrite = TRUE, row.names = FALSE)
