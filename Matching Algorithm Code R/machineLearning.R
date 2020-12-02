require("RMySQL")
require("stringr")
require("rpart")
require("rjson")

##Connect to the database
mydb <- dbConnect(MySQL(), user = "g1116905", password = "iegroup25", dbname = "g1116905", host = "mydb.itap.purdue.edu")
on.exit(dbDisconnect(mydb))

Q1<-sprintf("SELECT O.* , AVG( Weight_Score )
 FROM Match_Score M, Opportunities O
 WHERE M.Opportunity_ID = O.Opportunity_ID
 GROUP BY Opportunity_ID")
Q1 <- str_replace_all(str_replace_all(Q1,"\n",""),"\\s+"," ")
OScores <- dbGetQuery(mydb,Q1)

OScores <- OScores[,-7]
OScores <- OScores[,-7]
OScores <- OScores[,-1]
OScores <- OScores[,-1]
OScores$Opportunity_Type <- as.factor(OScores$Opportunity_Type)
OScores$Required_Major <- as.factor(OScores$Required_Major)
OScores$Location <- as.factor(OScores$Location)
OScores$Work_Sponsorship <- as.factor(OScores$Work_Sponsorship)
OScores$Skill<- as.factor(OScores$Skill)
names(OScores)[names(OScores) == "AVG( Weight_Score )"] <- "AVG_Score"
#ML Algorithm - NB to predict average matchscore based off of job information
indexTrain <- sample(1:nrow(OScores), 0.5 * nrow(OScores))

training <- OScores[indexTrain,]
testing <- OScores[-indexTrain,]
target_cat <- OScores[indexTrain,8]
test_cat <- OScores[-indexTrain,8]


model <-rpart(AVG_Score~Opportunity_Type+Min_GPA+Min_Year+Required_Major+Location+Work_Sponsorship+Skill, data = training,method = "anova",control =rpart.control(minsplit =1,minbucket=1, cp=0))
predicted_Weighted_Score <- predict(model, newdata = testing)
predictions <- cbind(testing,predicted_Weighted_Score)
predictions<- predictions[,-8]

cat(toJSON(predictions))
