matchPlotStudents <- function(Student = NULL, scores = data.frame(), mydb)
{


Student <- "email@student.com"
    
query <- sprintf("SELECT *
FROM `Match_Score`
WHERE `Email` = '%s'
LIMIT 0 , 10",Student)
    query <- str_replace_all(str_replace_all(query,"\n",""),"\\s+"," ")
    print(query)
    studentInfo <- dbGetQuery(mydb, query)
    barplot(height = studentInfo$Weight_Score, names = studentInfo$Opportunity_ID,ylim=c(0,120),ylab = "Weighted Score", xlab = "Job Posting", main = paste("Weighted Scores Across 10 jobs for",Student))
    box()
    }
