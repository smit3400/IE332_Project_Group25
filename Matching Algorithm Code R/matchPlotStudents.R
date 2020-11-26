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
    
      ##AVG Student ratings by company
    review_Q<-sprintf("SELECT R.Employer_Email, AVG( R.Overall_Rating ) , E.Industry
    FROM Company_Rating R, Employer E
    GROUP BY R.Employer_Email")
    review_Q <-str_replace_all(str_replace_all(review_Q,"\n",""),"\\s+"," ")
    reviews <- dbGetQuery(mydb, review_Q)
    names(reviews)[names(reviews) == "AVG( R.Overall_Rating )"] <- "AVG_Score"

    ##OBTAINED FROM: https://stackoverflow.com/questions/10286473/rotating-x-axis-labels-in-r-for-barplot/21978596
    rotate_x <- function(data, column_to_plot, labels_vec, rot_angle) {
        plt <- barplot(data[[column_to_plot]], col='steelblue', xaxt="n",ylim = c(0,10),ylab = "Average Review Score", main = "Employer Review Scores")
        text(plt, par("usr")[3], labels = labels_vec, srt = rot_angle, adj = c(1.1,1.1), xpd = TRUE, cex=0.6) 
    }
    rotate_x(reviews,'AVG_Score', labels_vec = reviews$Employer_Email, rot_angle = 65)

}
