require("plotrix")
library(plotrix)

matchPlotStudents <- function(Student = NULL, mydb)
{

advisorQ <-sprintf("SELECT Email
FROM Purdue_IE
LIMIT 0 , 30")
advisors <- dbGetQuery(mydb, advisorQ)
Statement <- any(advisors==Student)
if(Statement)
{
  Student = "M.Email"
}else
{
  Student <- sprintf("'%s'",Student)
}
  
query <- sprintf("SELECT *
 FROM `Match_Score`
 WHERE `Email` = %s
 LIMIT 0 , 10",Student)
    query <- str_replace_all(str_replace_all(query,"\n",""),"\\s+"," ")
    print(query)
    studentInfo <- dbGetQuery(mydb, query)
    
    
    #avg weighted score for job postings of each skill
progQ<-sprintf("SELECT AVG( Weight_Score )
    FROM Match_Score M, Opportunities O
    WHERE M.Opportunity_ID = O.Opportunity_ID
    AND Skill = 'Programming'
    AND M.Email = %s",Student)
progQ <- str_replace_all(str_replace_all(progQ,"\n",""),"\\s+"," ")
progScore <- dbGetQuery(mydb,progQ)

StatQ<-sprintf("SELECT AVG( Weight_Score )
    FROM Match_Score M, Opportunities O
    WHERE M.Opportunity_ID = O.Opportunity_ID
    AND Skill = 'Statistics'
    AND M.Email = %s",Student)
StatQ <- str_replace_all(str_replace_all(StatQ,"\n",""),"\\s+"," ")
StatScore <- dbGetQuery(mydb,StatQ)

techQ<-sprintf("SELECT AVG( Weight_Score )
    FROM Match_Score M, Opportunities O
    WHERE M.Opportunity_ID = O.Opportunity_ID
    AND Skill = 'Technical Design'
    AND M.Email = %s",Student)
techQ <- str_replace_all(str_replace_all(techQ,"\n",""),"\\s+"," ")
techScore <- dbGetQuery(mydb,techQ)
    
    skillScores <- data.frame(Programming = progScore[1,], Statistics = StatScore[1,], Technical_Design =techScore[1,])


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
        text(plt, par("usr")[3], labels = labels_vec, srt = rot_angle, adj = c(1.1,1.1), xpd = TRUE, cex=0.55) 
    }
   
    
    if(Statement)
    {
      layout(matrix(c(1,1,2,3), 2, 2, byrow = TRUE))
      
      rotate_x(reviews,'AVG_Score', labels_vec = reviews$Employer_Email, rot_angle = 65)
      box()
      barplot(height = as.numeric(skillScores[1,]), col='steelblue',names.arg = c("Programming","Statistics","Design"), ylim=c(0,100),ylab = "Average Weighted Score", xlab = "Skill", main = "Average Score for each skill \nacross all postings")
      box()
    }  else {
    layout(matrix(c(1,1,2,3), 2, 2, byrow = TRUE))
    
    rotate_x(reviews,'AVG_Score', labels_vec = reviews$Employer_Email, rot_angle = 65)
    box()
    barplot(height = as.numeric(skillScores[1,]), col='steelblue',names.arg = c("Programming","Statistics","Design"), ylim=c(0,100),ylab = "Average Weighted Score", xlab = "Skill", main = "Average Score for each skill \nacross all postings")
    box()
    barplot(height = studentInfo$Weight_Score, col='steelblue',names = studentInfo$Opportunity_ID,ylim=c(0,120),ylab = "Weighted Score", xlab = "Job Posting", main = paste("Weighted Scores Across Top 10 jobs \nfor",Student))
    box()
    }
  
    ##Obtained from https://www.codeproject.com/Articles/1119237/Pass-Arguments-and-Execute-R-script-from-PHP-Forms
    png(filename="C:/Users/justi/OneDrive/Documents/R/student_graphs.png", width=500, height=500)
    dev.off()
    sink('analysis-output.txt', append=FALSE, type = c("output", "message"))
    
    }
