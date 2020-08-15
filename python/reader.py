#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Sat Aug 15 20:14:57 2020

@author: admin
"""


# import the following libraries 
# will convert the image to text string 
import pytesseract	 

# adds image processing capabilities 
from PIL import Image	 


import mysql.connector

pytesseract.pytesseract.tesseract_cmd = r'/usr/local/Cellar/tesseract/4.1.1/bin/tesseract'

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="root",
  database="voody"
)

mycursor = mydb.cursor()

mycursor.execute("SELECT * FROM receipts")

myresult = mycursor.fetchall()

for x in myresult:
  img = Image.open('../'+x[2])
  result = pytesseract.image_to_string(img)
  #cursor = mysql.cursor()
  #cursor.execute("INSERT INTO receipts VALUES")
  print(result) 
# opening an image from the source path 
#img = Image.open('text1.png')	 

# describes image format in the output 
#print(img)						 
# converts the image to result and saves it into result variable 
#result = pytesseract.image_to_string(img) 
# write text in a text file and save it to source path 
"""
with open('abc.txt',mode ='w') as file:	 
	
				file.write(result) 
				print(result) 
				
"""

