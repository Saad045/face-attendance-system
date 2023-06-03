import mysql.connector
dbconn = mysql.connector.connect(
    host="localhost",
    port=3306,
    user="root",
    password="",
    database="attendance_system"

)

mycursor = dbconn.cursor()
if (dbconn):
    print("DB successfull")
else:
    print("DB not successfull")
# SELECT asheet.id, student.name, student.roll_no, course.course_name, teacher.teacher_name, asheet.date, asheet.lec_num, asheet.attendance_status FROM attendance_sheet asheet
# INNER JOIN student ON asheet.student_id = student.id
# INNER JOIN course ON asheet.course_id = course.id
# INNER JOIN teacher ON asheet.teacher_id = teacher.id
import datetime
now = datetime.datetime.now()

# cur_date = now.strftime('%Y-%m-%d')
# print(type(cur_date))
# print(cur_date)
cur_date='2023-06-03'
mycursor.execute('''SELECT DISTINCT date FROM attendance_sheet;''')
data = mycursor.fetchall()

print(str(data[0][0]))