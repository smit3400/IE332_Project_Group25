require("caret")
library(caret)
library(e1071)
library(ROCR)
matchPlotsEmployers <- function(mydb)
{

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
  

  
  Q2<-sprintf("SELECT `Opportunity_ID` , AVG( `Weight_Score` )
  FROM `Match_Score`
  GROUP BY `Opportunity_ID` ORDER BY AVG( `Weight_Score` ) DESC
  LIMIT 0 , 10")
  Q2 <- str_replace_all(str_replace_all(Q2,"\n",""),"\\s+"," ")
  rankID <- dbGetQuery(mydb,Q2)
  names(rankID)[names(rankID) == "AVG( `Weight_Score` )"] <- "AVG_Score"
  
  
  Q3 <- sprintf("SELECT `Statistics_Skill` , `Programming_Skill` , `Technical_Design_Skill`
 FROM `Student")
  sCounts<- dbGetQuery(mydb, Q3)
  skills <- colnames(sCounts)[apply(sCounts,1,which.max)]
  df <- data.frame(Statistics = sum(skills == "Statistics_Skill"), Programming = sum(skills == "Programming_Skill"), Design = sum(skills == "Technical_Design_Skill") )
  
  png(filename="C:/Users/justi/OneDrive/Documents/R/employer_graphs.png", width=500, height=500)
  par(mfrow=c(2,1))
  barplot(height = rankID$AVG_Score, names.arg = rankID$Opportunity_ID, ylim = c(0,100) ,ylab = "Average Score", xlab = "Job Posting #", main = "Average Score Across Top 10 Postings for All Companies")
  box()
  pie(as.numeric(df[1,]), names(sCounts),main = "Student's Highest Ranking Skills")
  
  dev.off()
  sink('analysis-output.txt', append=FALSE, type = c("output", "message"))
  
  return(predictions)  
}
