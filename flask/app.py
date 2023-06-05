from flask import Flask,render_template,Response,url_for,redirect,request,session,g

from mySQL import *
import cv2 as cv

import pickle
import face_recognition
import numpy as np
import cvzone 
import db
import datetime

import time
from pyzbar.pyzbar import decode

app=Flask(__name__)
app.secret_key='#bilal'
camera=cv.VideoCapture(0)

# cur_time = now.strftime("%H:%M")
# cur_time="10:00"

# print("Encoded File Loading...")
# file=open("EncodeFile.p","rb")
# model=pickle.load(file)
# file.close()
# print("Encoded File Loaded")
# knownEncodeList,studentIDs = model

mycursor.execute("SELECT id FROM student")
id_list = mycursor.fetchall()
qrcode_list=[]
for i in id_list:
    print(i[0])
    qrcode_list.append(str(i[0]))



sql="SELECT * FROM slot"
path_slotNum=1
mycursor.execute(sql)
mySlot_time = mycursor.fetchall()
lec_start_time=[]
lec_off_time=[]
for slot_time in mySlot_time:
    lec_start_time.append(slot_time[2].split('-')[0])  
    lec_off_time.append(slot_time[2].split('-')[1])


def generate_frames():
    
    print("----------- Loading... -----------")
    print("Encoded File Loading...")
    file=open("EncodeFile.p","rb")
    model=pickle.load(file)
    file.close()
    print("-----------Encoded File Loaded-----------")
    knownEncodeList,studentIDs = model
    camera=cv.VideoCapture(0)

    while True:
        now = datetime.datetime.now()

        # cur_time = now.strftime("%H:%M")
        # print(cur_time)
        cur_time='08:35'
        # print(cur_time)

        path_slotNum=1
        
            # ----------------- Check for already Attendance marked --------------
        if cur_time >=lec_start_time[0] and cur_time <lec_off_time[0] :
            path_slotNum=1
        elif cur_time >=lec_start_time[1] and cur_time <lec_off_time[1]:
            path_slotNum=2
        elif cur_time >=lec_start_time[2] and cur_time <lec_off_time[2]:
            path_slotNum=3
        elif cur_time >=lec_start_time[3] and cur_time <lec_off_time[3]:
            path_slotNum=4
        elif cur_time >=lec_start_time[4] and cur_time <lec_off_time[4]:
            path_slotNum=5
        elif cur_time >=lec_start_time[5] and cur_time <lec_off_time[5]:
            path_slotNum=6
        elif cur_time >=lec_start_time[7] and cur_time <lec_off_time[7]:
            
            db.rollNumGet("0",cur_time)
            break
            
            
        marked_sheet=[]
        path='DummyAttendance/slot_'+str(path_slotNum)+'.csv'
        with open(path,"r+",newline="\n") as f:
            AttenList=f.readlines()
            # rec_list=[]
            for line in AttenList:
                entry=line.split(",")
                marked_sheet.append(entry[0])
            # ----------------- END  check for A marked --------------                
            
        ## read the camera frame
        success,frame=camera.read()
        if not success:
            break
        else:
           
            frame = cv.flip(frame, 1)
            #face recognition----
            imgS=cv.resize(frame,(0,0),None,0.25,0.25)
            imgS=cv.cvtColor(imgS,cv.COLOR_BGR2RGB)
            # -----------------QR CODE--------------

            for qrcode in decode(frame):
                qrcode.data
                myData=qrcode.data.decode('utf-8')
                # print(myData)
                # myData= myData.split('+')
                # print(myData[1])
                qrTxt=""
                a_marked_qr=""
                qr_markedColor=(0,255,0)
                if myData in qrcode_list:
                    # qrTxt='Registerd'
                    qrColor=(0,255,0)
                    
                    mycursor.execute("SELECT roll_no FROM student WHERE id="+myData)
                    r_no = mycursor.fetchone()
                    
                    
                    # if ture then check it in Sheet (available then Show marked otherwise Mark Attendance)
                    if r_no:
                        qrTxt=r_no[0]
                        
                        if myData in marked_sheet:
                            a_marked_qr ="Attendance Marked"
                            qr_markedColor=(70,57,230)

                        else:
                            a_marked_qr ="Marking..."
                            db.rollNumGet(myData,cur_time)
                            pass

                    else:
                        a_marked_qr="No id found"


                else:
                    qrTxt='*Not Found'
                    qrColor=(0,0,255)
                pts=np.array([qrcode.polygon],np.int32)
                pts=pts.reshape((-1,1,2))
                cv.polylines(frame,[pts],True,qrColor,5)

                pts2 =qrcode.rect
                cv.putText(frame,f"{myData} {qrTxt}",(pts2[0],pts2[1]-10),cv.FONT_HERSHEY_SIMPLEX,color=qrColor,fontScale=1,thickness=2)
                cv.putText(frame,a_marked_qr,(pts2[0],pts2[1]-50),cv.FONT_HERSHEY_SIMPLEX,color=qr_markedColor,fontScale=1,thickness=2)

            # ---------End--------QR CODE--------------

            faceCurLoc=face_recognition.face_locations(imgS)
            encodeCurFrame=face_recognition.face_encodings(imgS,faceCurLoc)

            for encodeFace, faceLoc in zip(encodeCurFrame,faceCurLoc):
                matches=face_recognition.compare_faces(knownEncodeList,encodeFace)
                faceDis=face_recognition.face_distance(knownEncodeList,encodeFace)
                # print("matches",matches)
                # print("faceDis",faceDis)

                
                matchIndex=np.argmin(faceDis)
                print("FacDisList",faceDis)
                print("FacDis index ",faceDis[matchIndex])
                print("matchIndex",matchIndex)
                
                y1,x2,y2,x1=faceLoc
                y1,x2,y2,x1=y1*4,x2*4,y2*4,x1*4
                bbox= x1,y1,x2-x1,y2-y1
                
                
                # if matches[matchIndex] and faceDis[matchIndex] < 0.40:
                if matches[matchIndex] and faceDis[matchIndex] < 0.45:
                    # print(type(studentIDs[matchIndex]))
                    
                    boxColor=(0,255,0)
                    infoColor=(255, 164, 87)
                    markedColor=(0,255,0)
                    
                    mycursor.execute("SELECT roll_no FROM student WHERE id="+str(studentIDs[matchIndex]))
                    r_no = mycursor.fetchone()
                    r_txt=""
                    a_marked=""
                    # if ture then check it in Sheet (available then Show marked otherwise Mark Attendance)
                    if r_no:
                        r_txt= r_no[0] #BCS19-028
                        if str(studentIDs[matchIndex]) in marked_sheet:
                            a_marked ="Attendance Marked"
                            markedColor=(70,57,230)

                        else:
                            a_marked ="..."
                            db.rollNumGet(studentIDs[matchIndex],cur_time)
                            pass
                    else:
                        r_txt="No id found"

                    faceTxt=f"{r_txt}"
                    infoTxt=f"id: {str(studentIDs[matchIndex])}, dis: {str(round(faceDis[matchIndex],2))}"
                

                    
                    print("knownFace dis: ", faceDis[matchIndex])
                    cvzone.cornerRect(frame,bbox,rt=1,t=5,colorR=(220,218,168),colorC=boxColor)
                    cv.putText(frame,f'{infoTxt}',(x1,y1-10),cv.FONT_HERSHEY_SIMPLEX,color=infoColor,fontScale=0.9,thickness=2)
                    cv.putText(frame,f'{faceTxt}',(x1,y1+100),cv.FONT_HERSHEY_SIMPLEX,color=boxColor,fontScale=1,thickness=2)
                    cv.putText(frame,f'{a_marked}',(x1,y2+30),cv.FONT_HERSHEY_SIMPLEX,color=markedColor,fontScale=1,thickness=2)

                else:
                # print("UnKnownFace")
                    cvzone.cornerRect(frame,bbox,rt=1,t=5,colorR=(70,57,230),colorC=(0,255,0))

                    cv.putText(frame,'unKnown',(50+x1,140+y1-10),cv.FONT_HERSHEY_SIMPLEX,color=(70,57,230),fontScale=1,thickness=2)
            
            #end of face rec....
            ret,buffer=cv.imencode('.jpg',frame)
            frame=buffer.tobytes()
            
        yield(b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n')


@app.route('/')
def index():
    camera.release()
    now = datetime.datetime.now()

    cur_date = now.strftime('%Y-%m-%d')
    print("----------Home--------")
    try:
        mycursor.execute('''SELECT asheet.id, student.name, student.roll_no, course.name, teacher.name, asheet.date, asheet.lec_num, asheet.attendance_status FROM attendance_sheet asheet 
        INNER JOIN student ON asheet.student_id = student.id
        INNER JOIN course ON asheet.course_id = course.id
        INNER JOIN teacher ON asheet.teacher_id = teacher.id
        ORDER BY asheet.id DESC''')
        data = mycursor.fetchall()
    except:
        data=[]
    # dbconn.commit()
    return render_template('list.html', attSheet=data,date=cur_date,r_num="")
@app.route('/today')
def today():
    camera.release()
    now = datetime.datetime.now()

    cur_date = now.strftime('%Y-%m-%d')
    # cur_date = '2023-06-03'

    mycursor.execute('''SELECT asheet.id, student.name, student.roll_no, course.name, teacher.name, asheet.date, asheet.lec_num, asheet.attendance_status FROM attendance_sheet asheet 
    INNER JOIN student ON asheet.student_id = student.id
    INNER JOIN course ON asheet.course_id = course.id
    INNER JOIN teacher ON asheet.teacher_id = teacher.id
    WHERE asheet.date = %s
    ORDER BY asheet.lec_num DESC''',(str(cur_date),))
    data = mycursor.fetchall()
    # dbconn.commit()
    return render_template('list.html', attSheet=data,date=cur_date,r_num="")

@app.route('/search', methods=['GET', 'POST'])
def search():
    camera.release()
    if request.method == "POST":
        
        roll_num = request.form['rollnum']
        if request.form['select_date']=='':
            print("now date")
            now = datetime.datetime.now()
            cur_date = now.strftime('%Y-%m-%d')
        # c   ur_date = '2023-06-02'
        else:
            cur_date = request.form['select_date']
        
        print(roll_num.upper())
        # print(cur_date)
        mycursor.execute('''SELECT asheet.id, student.name, student.roll_no, course.name, teacher.name, asheet.date, asheet.lec_num, asheet.attendance_status FROM attendance_sheet asheet 
        INNER JOIN student ON asheet.student_id = student.id
        INNER JOIN course ON asheet.course_id = course.id
        INNER JOIN teacher ON asheet.teacher_id = teacher.id
        WHERE asheet.date = %s AND student.roll_no=%s
        ORDER BY asheet.lec_num DESC''',(str(cur_date),roll_num.upper()))
        data = mycursor.fetchall()
        # dbconn.commit()
        return render_template('list.html', attSheet=data,date=cur_date,r_num=roll_num)


@app.route('/video' )
def video():
    return Response(generate_frames(),mimetype='multipart/x-mixed-replace; boundary=frame')
@app.route('/start_webcam')
def webcam():
    print("----------Web Cam--------")

    # camera=cv.VideoCapture(0)
    now = datetime.datetime.now()

    cur_date=now.strftime('%d %b %Y')
    cur_day = now.strftime("%A")
    return render_template('webcam.html' ,date=cur_date, day= cur_day)


@app.route('/train')
def train():
    return render_template('loading.html')

@app.route('/progress')
def progress():
    def generate():
        # Execute your long-running task here
        file = open(r'EncodeData.py', 'r').read()
        exec(file)
        
        # Generate progress updates
        for progress in range(0, 101, 10):
            time.sleep(1)

            yield f"data:{progress}\n\n"
            # time.sleep(1.5)

        # Redirect to index page after completion
        yield "data:redirect\n\n"

    return Response(generate(), mimetype='text/event-stream')


if __name__=="__main__":
    app.run(debug=True)
