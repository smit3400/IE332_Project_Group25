require("plotrix")
library(plotrix)

##Students = The desired student's email, scores = MatchScores Table, mydb = mydb
matchPlotStudents <- function(Student = NULL, mydb)
{
    
query <- sprintf("SELECT *
FROM `Match_Score`
WHERE `Email` = '%s'
LIMIT 0 , 10",Student)
    query <- str_replace_all(str_replace_all(query,"\n",""),"\\s+"," ")
    print(query)
    studentInfo <- dbGetQuery(mydb, query)
    barplot(height = studentInfo$Weight_Score, names = studentInfo$Opportunity_ID,ylim=c(0,120),ylab = "Weighted Score", xlab = "Job Posting", main = paste("Weighted Scores Across 10 jobs for",Student))
    box()
    
    #avg weighted score for job postings of each skill
progQ<-sprintf("SELECT AVG( Weight_Score )
    FROM Match_Score M, Opportunities O
    WHERE M.Opportunity_ID = O.Opportunity_ID
    AND Skill = 'Programming'
    AND M.Email = '%s'",Student)
progQ <- str_replace_all(str_replace_all(progQ,"\n",""),"\\s+"," ")
progScore <- dbGetQuery(mydb,progQ)

StatQ<-sprintf("SELECT AVG( Weight_Score )
    FROM Match_Score M, Opportunities O
    WHERE M.Opportunity_ID = O.Opportunity_ID
    AND Skill = 'Statistics'
    AND M.Email = '%s'",Student)
StatQ <- str_replace_all(str_replace_all(StatQ,"\n",""),"\\s+"," ")
StatScore <- dbGetQuery(mydb,StatQ)

techQ<-sprintf("SELECT AVG( Weight_Score )
    FROM Match_Score M, Opportunities O
    WHERE M.Opportunity_ID = O.Opportunity_ID
    AND Skill = 'Technical Design'
    AND M.Email = '%s'",Student)
techQ <- str_replace_all(str_replace_all(techQ,"\n",""),"\\s+"," ")
techScore <- dbGetQuery(mydb,techQ)
    
    skillScores <- data.frame(Programming = progScore[1,], Statistics = StatScore[1,], Technical_Design =techScore[1,])
    barplot(height = as.numeric(skillScores[1,]), names.arg = names(skillScores), ylim=c(0,100),ylab = "Average Weighted Score", xlab = "Skill", main = "Average Score for each skill across all postings")
    box()
}
