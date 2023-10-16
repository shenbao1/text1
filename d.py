#!C:\Program Files\Python310\python.exe
import json
import cgi
from dbConfig import conn, cur
print("Content-Type: text/html; charset=utf-8\n")

form = cgi.FieldStorage()
try:
	id=int(form.getvalue('id'))
except:
	print(1)
	exit()
sql="select id,jobName, jobUrgent, jobContent from todo where id=%s;";
cur.execute(sql,(id,))
row={}

try:
	id,jobNm,jobUg,jobCt=cur.fetchone()
	#print(id,jobNm,jobUg,jobCt)

	row['id'] = id
	row['jobName'] = jobNm
	row['jobUrgent'] = jobUg
	row['jobContent'] = jobCt
	print(json.dumps(row))
except:
	#not found
	print("{}")



