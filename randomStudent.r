randomStudent <- function(n=1) {
  for (i in 1:n) {
  # MySQL connection
  require("RMySQL")
  library(RMySQL)
  mydb <- dbConnect(MySQL(), user = "g1116905", password = "iegroup25", dbname = "g1116905", host = "mydb.itap.purdue.edu")
  on.exit(dbDisconnect(mydb))
  
  
  # Generating random names
  require("generator")
  library(generator)
  name <- r_full_names(1)
  name <- strsplit(name, " ")[[1]]
  student <- cbind(Fname = name[1], Lname = name[2])
  
  # Generating email
  email <- paste0(strsplit(tolower(name[1]),"")[[1]][1], tolower(name[2]),"@purdue.edu")
  
  # Check if email already exists
  sql <- paste0("SELECT Email FROM Student WHERE Email='", email, "'")
  check <- dbGetQuery(mydb,sql)
  i <- 1
  while (dim(check)[1] != 0) {
    email <- paste0(strsplit(tolower(name[1]),"")[[1]][1], tolower(name[2]),i,"@purdue.edu")
    sql <- paste0("SELECT Email FROM Student WHERE Email='", email, "'")
    check <- dbGetQuery(mydb,sql)
    i <- i + 1
  }
  student <- cbind(student, Email=email)
  
  # Generate password
  password <- paste0(strsplit(tolower(name[1]),"")[[1]][1], tolower(name[2]),"pass")
  student <- cbind(student, Password=password)
  
  # Generate number
  number <- r_phone_numbers(1)
  student <- cbind(student, Phone_Number=number)
  
  # Generate major
  majorData <- c("FYE", "IE")
  major <- sample(majorData,1)
  student <- cbind(student, Major=major)
  
  # Generate location
  locationData <- c("South", "Northeast", "Midwest", "West")
  location <- sample(locationData,1)
  student <- cbind(student, Location=location)
  
  # Generate GPA
  GPAVal <- seq(2.50,4.00,0.10)
  GPA <- sample(GPAVal, 1)
  student <- cbind(student, GPA=GPA)
  
  # Generate experience
  skills <- read.csv("skills.csv")
  skills <- unlist(sapply(skills, function(x) strsplit(tolower(x), ", ")))
  skills <- paste(sample(skills,sample(c(1:4),1),replace=FALSE),collapse=" ")
  student <- cbind(student, Experience=skills)
  
  # Generate courses
  courses <- read.csv("courses.csv")
  courses <- paste(sample(t(courses),sample(1:8,1),replace=TRUE),collapse=" ")
  student <- cbind(student, Courses=courses)
  
  # Generate remaining columns
  # Year
  year <- sample(1:4,1)
  if (major == "FYE") {
    year = 1
  }
  # Opportunity
  opporData <- c('Internship', 'Co-op', 'Full Time')
  opportunity <- sample(opporData,1)
  # Relocation and work authorization
  decision <- c("Yes", "No")
  relocation <- sample(decision,1)
  workAuth <- sample(decision,1)
  
  student <- cbind(student, Year=year, Opportunity_Type=opportunity, Relocation=relocation, Work_Sponsorship=workAuth)
  
  # Sending query
  sql <- paste0("INSERT INTO Student (Email, Password, Fname, Lname, Phone_Number, Major, Location, GPA, Experience, Courses, Year, Opportunity_Type, Relocation, Work_Sponsorship) VALUES ('",student[3],"', '",student[4],"', '",student[1],"', '",student[2],"', '",student[5],"', '",student[6],"', '",student[7],"', '",student[8],"', '",student[9],"', '",student[10],"', '",student[11],"', '",student[12],"', '",student[13],"', '",student[14],"')")
  dbSendQuery(mydb, sql)
  }
}