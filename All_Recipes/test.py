from sql import *
import json



#Get JSON File
#jfile = open("jsondata.txt", 'r')
#print(jfile.read())

with open('testjson.txt') as json_data:
	#print(json_data)
	d= json.load(json_data)
	print(d)

#Insert JSON data into recipes 