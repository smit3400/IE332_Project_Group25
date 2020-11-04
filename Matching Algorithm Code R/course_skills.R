course_skills <- function(course_text){
  course_text <- gsub(",", "", course_text)
  course_text <- gsub("\\.", "", course_text)
  text_list <- unlist(strsplit(toupper(course_text)," "))
  text_list <- sapply(text_list, function(x)paste("\\b", x,"\\b", sep = ""))
  
  stat_keyword <- c("IE230", "IE330", "IE336")
  prog_keyword <- c("IE332", "IE335", "CS159")
  tech_keyword <- c("IE343", "IE370", "IE383", "IE386", "IE431", "IE470", "IE 474", "IE 484")
  
  skills <- c(0,0,0)
  skills[1] <- sum(sapply(text_list, function(x)sum(grepl(x,stat_keyword))))
  skills[2] <- sum(sapply(text_list, function(x)sum(grepl(x,prog_keyword))))
  skills[3] <- sum(sapply(text_list, function(x)sum(grepl(x,tech_keyword))))
  skills
}