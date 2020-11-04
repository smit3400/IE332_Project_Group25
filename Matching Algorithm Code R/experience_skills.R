experience_skills <- function(experience_text){
  experience_text <- gsub(",", "", experience_text)
  experience_text <- gsub("\\.", "", experience_text)
  text_list <- unlist(strsplit(tolower(experience_text)," "))
  text_list <- sapply(text_list, function(x)paste("\\b", x,"\\b", sep = ""))
  
  stat_keyword <- c("statistic", "average", "deviation", "probability")
  prog_keyword <- c("python", "matlab", "c++", "java", "html", "r")
  tech_keyword <- c("cad", "production", "design", "analysis", "supply chain")
  
  skills <- c(0,0,0)
  skills[1] <- sum(sapply(text_list, function(x)sum(grepl(x,stat_keyword))))
  skills[2] <- sum(sapply(text_list, function(x)sum(grepl(x,prog_keyword))))
  skills[3] <- sum(sapply(text_list, function(x)sum(grepl(x,tech_keyword))))
  skills
}