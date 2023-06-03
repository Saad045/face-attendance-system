# from db import rollNumGet
import db
from mySQL import *
# rollno='0'
# cur_time='18:40'
# db.rollNumGet(rollno,cur_time)
import datetime

# now = datetime.datetime.now()

# cur_time = now.strftime("%H:%M")
while True:
    now = datetime.datetime.now()

    cur_time = now.strftime("%H:%M")
    print(cur_time)
# sql="SELECT id FROM student"
# mycursor.execute(sql)
# student_all_ids=mycursor.fetchall()
# print("student_all_ids",student_all_ids)


# rec_list=[]
# path='DummyAttendance/slot_'+str(1)+'.csv'

# with open(path,"r+",newline="\n") as f:
#         AttenList=f.readlines()
#         # rec_list=[]
#         for line in AttenList:
#             entry=line.split(",")
#             rec_list.append(entry[0])
# print(rec_list)
# not_marked=[]
# for s_id in student_all_ids:
#     # print(s_id[0])
#     if str(s_id[0]) not in rec_list:
#         not_marked.append(str(s_id[0]))
#         print("not marked")
#     else:
#         print("marked")
# print('not_marked ',not_marked)
# print(entry[0])PRINT()
# import datetime
# now = datetime.datetime.now()
# # cur_time = now.strftime("%H:%M")

# d="Monday"
# print(d.lower())

# mycursor.execute("SELECT roll_no FROM student WHERE id="+str(18))
# r_no = mycursor.fetchone()
# r_no = "+".join(r_no)
# print(r_no)
# ---------------------------------------------------
# mycursor.execute("SELECT id FROM student")
# id_list = mycursor.fetchall()
# qrcode_list=[]
# for i in id_list:
#     print(i[0])
#     qrcode_list.append(i[0])
# print(qrcode_list[0])

# if '5' in qrcode_list:
#     print("yes")
# ---------------------------------------------------

# s=1
# def slotPath(slot_no):
#     s=slot_no
#     path='DummyAttendance/slot_'+str(slot_no)+'.csv'
#     return path
# slot_path=slotPath()
# print(slot_path)


# marked_sheet=[]
# path='DummyAttendance/slot_'+str(1)+'.csv'

# with open(path,"r+",newline="\n") as f:
#     AttenList=f.readlines()
#     # rec_list=[]
#     for line in AttenList:
#         entry=line.split(",")
#         marked_sheet.append(entry[0])

# print(marked_sheet)
# if rollno in marked_sheet:
#     print("marked")
# else:
#     print("Attendance marking...")
#     rollNumGet(rollno,cur_time) 
# import datetime
# import time
# for i in range(100):
#     print(i)
#     time.sleep(2)
# mycursor.execute("SELECT roll_no FROM student WHERE id="+str(30))
# r_no = mycursor.fetchone()
# # r_no = "+".join(r_no)
# if r_no :
#     print("Ok")
# else:
#     print("Not Ok")
# # print(r_no[0])
# for i in range(1,7):
#     print(i)