import os
import request
import keyword

pc_number=' 1'

r = request.get('Webhost link')
t = r.json()
old_time_application= t['time'];
new_time= t['time'];

old_draft=t['draft'];

old_time_shutdown=t['time'];

while True:
    req = request.get('webhost link')
    t = req.json()
    new_time = t['time']
    new_draft = t['draft']
    new_phrase = t ['phrase']

    if new_phrase==" word" and new_draft=='' :
        if new_time!=old_time_application:
            print("Launching application Word")
            os.startfile('C:\ProgramData\Microsoft\Windows\Start Menu\Programs\Word.lnk')
            old_time_application=new_time

    elif new_draft and new_phrase=='':
        if new_draft!=old_draft:
            print("Draft Trigger")
            keyboard.write(new_draft,delay=0.1)
            old_draft=new_draft

    elif new_draft ==' shutdown':
        if new_time!= old_time_shutdown:
            if new_phrase== pc_number:
                print("Shutdown trigger")
                os.system("shutdown /s /t 1")
                old_time_shutdown=new_time



