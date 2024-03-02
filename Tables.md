Tables:

1. Users
    - UserID (Primary Key)
    - Username
    - Password (Encrypted)
    - Email
    - RegistrationDate
    - LastLoginDate

2. Quizzes
    - QuizID (Primary Key)
    - Title
    - Description
    - NumberOfQuestions
    - TimeLimit
    - DifficultyLevel
    - CreatedBy (Foreign Key referencing UserID in Users table)
    - CreatedDate
    - ModifiedDate

3. Questions
    - QuestionID (Primary Key)
    - QuizID (Foreign Key referencing QuizID in Quizzes table)
    - QuestionText
    - CorrectAnswer
    
4. Options
    - OptionID (Primary Key)
    - QuestionID (Foreign Key referencing QuestionID in Questions table)
    - OptionText

5. UserQuizzes
    - UserQuizID (Primary Key)
    - UserID (Foreign Key referencing UserID in Users table)
    - QuizID (Foreign Key referencing QuizID in Quizzes table)
    - Score
    - DateTaken

Relationships:
- Each user can have multiple quizzes they created, so there's a one-to-many relationship between Users and Quizzes (CreatedBy field).
- Each quiz can have multiple questions, so there's a one-to-many relationship between Quizzes and Questions (QuizID field).
- Each question can have multiple options, so there's a one-to-many relationship between Questions and Options (QuestionID field).
- Each user can take multiple quizzes, so there's a many-to-many relationship between Users and Quizzes through the UserQuizzes table.