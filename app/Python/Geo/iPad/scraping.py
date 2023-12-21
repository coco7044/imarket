
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options
import csv
import pandas as pd


csv_data = []
with open('c:/xampp/htdocs/laravel/imarket/app/Python/Geo/url.csv', 'r') as file:
    reader = csv.reader(file)
    for row in reader:
        csv_data.append(row)

options = Options()
options.add_argument('--headless')
options.add_argument('--user-agent=' + 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36')

browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
result = []

for url in csv_data:
    iPadURL = url[0]    
    browser.get(iPadURL)
    browser.implicitly_wait(10)

    if len(browser.find_elements_by_id('spec_goods')) > 0:
        title = browser.find_element_by_id('spec_goods').text
        price = int(browser.find_element_by_xpath('//span[@class="goods_detail_price_"]/b').text.replace(',',''))
        color = title[title.rfind(' ')+1:]
    else:
        continue
    
    result.append([title,price,color])
    
fileName = 'c:/xampp/htdocs/laravel/imarket/public/geoResult.csv'

with open(fileName, 'w', newline='', encoding='utf-8') as f:
    writer = csv.writer(f)
    for row in result:
        writer.writerow(row)

browser.quit()