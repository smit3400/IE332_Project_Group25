require("RMySQL")
require("data.table")
require("stringr")

##Connect to the database
mydb <- dbConnect(MySQL(), user = "g1116905", password = "iegroup25", dbname = "g1116905", host = "mydb.itap.purdue.edu")
on.exit(dbDisconnect(mydb))

args <- commandArgs(TRUE)

filename <- args[1]
filename <- paste(filename,"png",sep=".")

  
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
  
  png(filename=paste0("/home/campus/g1116905/www/main/Project_R/plots/",filename), width=500, height=500)

  par(mfrow=c(2,1))
  barplot(height = rankID$AVG_Score, names.arg = rankID$Opportunity_ID, ylim = c(0,100) ,ylab = "Average Score", xlab = "Job Posting #", main = "Average Score Across Top 10 Postings for All Companies")
  box()
  pie(as.numeric(df[1,]), names(sCounts),main = "Student's Highest Ranking Skills")
  
  dev.off()
  sink('analysis-output.txt', append=FALSE, type = c("output", "message"))
