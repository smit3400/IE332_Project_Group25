matchPlots <- function(Student = NULL, scores = data.frame(), mydb)
{
    studentInfo <- subset.data.frame(scores, Email == Student)
    # query <- paste("SELECT * FROM Match_Score WHERE Email =","'",Student,"'")
    # print(query)
    # studentInfo <- dbGetQuery(mydb, query)
    print(studentInfo)
    barplot(height = studentInfo$Weight_Score, names = studentInfo$Opportunity_ID,ylim=c(0,120),ylab = "Weighted Score", xlab = "Job Posting", main = paste("Weighted Scores Across All jobs for",Student))
    box()
    
}