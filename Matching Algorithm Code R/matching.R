matching <- function(sData, oData)
{
##Check each constraint for a match 
cData <- data.frame("Major" = sData$Major == oData$Required_Major)
cData$Location <- sData$Location == oData$Location
cData$GPA <- sData$GPA >= oData$Min_GPA
cData$Year <- sData$Year >= oData$Min_Year
cData$Opportunity_Type <- sData$Opportunity_Type == oData$Opportunity_Type
cData$Work_Sponsorship <- sData$Work_Sponsorship == oData$Work_Sponsorship
#Create a new column which returns the percent of requirements met
cData$Match_Score <- apply(cData, 1, function(x)round((sum(x)/length(cData[1,]))*100))

##Functions to parse and assign skills to course and experience data
course_skills <- function(course_text){
  course_text <- gsub(",", "", course_text)
  course_text <- gsub("\\.", "", course_text)
  text_list <- unlist(strsplit(toupper(course_text)," "))
  text_list <- sapply(text_list, function(x)paste("\\b", x,"\\b", sep = ""))
  
  stat_keyword <- c("IE230", "IE330", "IE336")
  prog_keyword <- c("IE332", "IE335", "CS159","ENGR132")
  tech_keyword <- c("IE343", "IE370", "IE383", "IE386", "IE431", "IE470", "IE474", "IE484", "ME270","NUCL273")
  
  skills <- c(0,0,0)
  skills[1] <- sum(sapply(text_list, function(x)sum(grepl(x,stat_keyword))))
  skills[2] <- sum(sapply(text_list, function(x)sum(grepl(x,prog_keyword))))
  skills[3] <- sum(sapply(text_list, function(x)sum(grepl(x,tech_keyword))))
  skills
}

experience_skills <- function(experience_text){
  experience_text <- gsub(",", "", experience_text)
  experience_text <- gsub("\\.", "", experience_text)
  text_list <- unlist(strsplit(tolower(experience_text)," "))
  text_list <- sapply(text_list, function(x)paste("\\b", x,"\\b", sep = ""))
  
  stat_keyword <- c("statistics", "modeling", "analysis", "probability","minitab","regression","queues","experiment")
  prog_keyword <- c("python", "matlab", "c", "java", "html", "r","c++")
  tech_keyword <- c("cad", "production", "design", "cam", "supply chain","excel","manufacturing")
  
  skills <- c(0,0,0)
  skills[1] <- sum(sapply(text_list, function(x)sum(grepl(x,stat_keyword,ignore.case = TRUE,fixed = TRUE))))
  skills[2] <- sum(sapply(text_list, function(x)sum(grepl(x,prog_keyword,ignore.case = TRUE,fixed = TRUE))))
  skills[3] <- sum(sapply(text_list, function(x)sum(grepl(x,tech_keyword,ignore.case = TRUE,fixed = TRUE))))
  skills
}

##Set the skill data into a dataframe in preperation for weight score
cSkill <- course_skills(sData$Courses)
eSkill <- experience_skills(sData$Experience)
skillTotal <- cSkill + eSkill
skillData <- data.frame(Statistics = skillTotal[1], Programming = skillTotal[2], Technical_Design = skillTotal[3])

i<-1
oSkill <- oData$Skill
cData$Weight_Score <- NA
while(i <= length(cData$Match_Score))
{
  if(oSkill[i] == "Statistics")
  {
    cData$Weight_Score[i] <- cData$Match_Score[i] + skillData$Statistics
  }
  else if(oSkill[i] == "Programming")
  {
    cData$Weight_Score[i] <- cData$Match_Score[i] + skillData$Programming
  }
  else if(oSkill[i] == "Technical Design")
  {
    cData$Weight_Score[i] <- cData$Match_Score[i] + skillData$Technical_Design
  }
  else
  {
    cData$Weight_Score = cData$Match_Score
  }
  i=i+1
}

matchResults <- data.frame("Email"=sData$Email, "Opportunity_ID" = oData$Opportunity_ID, "Match_Score" = cData$Match_Score,"Weight_Score" = cData$Weight_Score)

return(matchResults)

}


