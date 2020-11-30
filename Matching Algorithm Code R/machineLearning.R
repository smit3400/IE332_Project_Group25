require("RMySQL")
require("stringr")
require("caret")

##Connect to the database
mydb <- dbConnect(MySQL(), user = "g1116905", password = "iegroup25", dbname = "g1116905", host = "mydb.itap.purdue.edu")
on.exit(dbDisconnect(mydb))

Q1<-sprintf("SELECT O.* , AVG( Weight_Score )
 FROM Match_Score M, Opportunities O
 WHERE M.Opportunity_ID = O.Opportunity_ID
 GROUP BY Opportunity_ID")
Q1 <- str_replace_all(str_replace_all(Q1,"\n",""),"\\s+"," ")
print(Q1)
OScores <- dbGetQuery(mydb,Q1)

OScores <- OScores[,-7]
OScores <- OScores[,-7]
OScores <- OScores[,-1]
OScores <- OScores[,-1]


names(OScores)[names(OScores) == "AVG( Weight_Score )"] <- "AVG_Score"
#ML Algorithm - NB to predict average matchscore based off of job information
indexTrain <- createDataPartition(y = OScores$AVG_Score,p = 0.5,list = FALSE)
training <- OScores[indexTrain,]
testing <- OScores[-indexTrain,]

model<-train(AVG_Score~., data = training,  method = "knn",
             preProcess = c('scale', 'center'),
             na.action = na.omit)
predicted_Weighted_Score <- predict(model, newdata = testing)
predictions <- cbind(testing,predicted_Weighted_Score)
predictions<- predictions[,-8]

predictions