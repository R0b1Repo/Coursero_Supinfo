# Life cycle of Coursero

## 1. User set his name, language, file... into the form <TODO>
### Website UI
- Intro
    - Rules
    - Exercices description
- Form to submit answer
    - Form to enter fields
    - Submit button
- Form to get grade
    - Form to enter field
    - Submit button
### Website access with DNS <TODO>
- Enter dns name
- Enter into Coursero website
<br>


## 2. User click on 'submit' <TODO>
### &emsp; File is stored in nfs server into specific folder <TODO>
- Give unused name to file
> filename = userID_Language_ExerciseNumber.ext <br>
> filepath = /tmp/filename
- Save file on nfs with this name
### &emsp; Infos are stored into db <TODO>
- SQL request to store infos in db
<br>


## 3. User click on 'get results' <TODO>
### &emsp; SQL request to get infos for given name <TODO>
- If return something -> continue
- Else
    - Display 'invalid user' (TODO)
### &emsp; Display necessary infos in website <TODO>
    grade=null -> not yet corrected
    grade=-1 -> error
    grade=[0-100] -> final grade
<br>

## Cron task <TODO>
### &emsp; Get infos path where grade is null <TODO>
- SQL Request to find file path, language, exercise number
### &emsp; Execute correction script <TODO>
- Get good php correction script
- Get good language correction script
- Execute correction script
- Get final grade
- Delete file from nfs after correction
### &emsp; Update db with final grade <TODO>
- SQL : update with new grade
- SQL : get last result in this ex and language
    - If null :
        - SQL : update the grade
- Compare old and new results
- If new > old :
    - SQL : delete row with old result


## Final files <TODO>
### Website
- index.php
- exercices.php <OK>
- style.css
### Correction
- correct_java.php
- correction_java_1.java <OK>
- correction_java_2.java <OK>
- correct_python.php
- correction_python_1.py <OK>
- correction_python_2.py <OK>
### DB
- *create_db.php ?*
- db_cmd.php
### Cron task
- cron_sql.php
