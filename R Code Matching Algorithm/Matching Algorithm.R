sData <- data.frame("Major" = "IE", 
                    "Location" = "West", 
                    "GPA" = 2.5, 
                    "Experience" = "Sample Text", 
                    "Courses" = "Sample Course", 
                    "Year" = 2, 
                    "Opportunity_Type" = "Internship", 
                    "Relocation" = "Yes", 
                    "Work_Sponsorship" = "Yes")
oData <- data.frame("Opportunity_Type" = c("Internship", "Full Time"),
                    "Min_GPA" = c(3.5, 2),
                    "Min_Year" = c(3,1),
                    "Required_Major" = c("IE","IE"),
                    "Location" = c("Midwest","West"),
                    "Work_Sponsorship" = c("No","Yes"),
                    "Skill" = c("Statistics","Programming"))
cData <- data.frame("Major" = sData$Major == oData$Required_Major)
cData$Location <- sData$Location == oData$Location
cData$GPA <- sData$GPA >= oData$Min_GPA
cData$Year <- sData$Year >= oData$Min_Year
cData$Opportunity_Type <- sData$Opportunity_Type == oData$Opportunity_Type
cData$Work_Sponsorship <- sData$Work_Sponsorship == oData$Work_Sponsorship
cData$Match_Score <- apply(cData, 1, function(x)sum(x)/length(cData[1,]))