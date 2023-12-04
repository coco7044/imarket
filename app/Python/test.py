# coding: utf-8

import os
import csv

# from selenium import webdriver
# from time import sleep
# from selenium.webdriver.chrome.options import Options

# options = Options()
# options.add_argument('--headless')
# # print('hello')

# browser = webdriver.Chrome('./app/Browser/chromedriver',options=options)
# browser

# url = 'https://scraping-for-beginner.herokuapp.com/login_page'
# url2 = 'https://www.backmarket.co.jp/ja-jp/l/iphone-12shirizu/7b2e102d-e84d-478f-adaa-a42fd39731ae#backbox_grade=10%20A%E3%82%B0%E3%83%AC%E3%83%BC%E3%83%89&model=001%20iPhone%2012&storage=64000%2064%20GB'
# url3 = 'https://www.backmarket.co.jp/ja-jp/l/iphone-12shirizu/7b2e102d-e84d-478f-adaa-a42fd39731ae#backbox_grade=10%20A%E3%82%B0%E3%83%AC%E3%83%BC%E3%83%89&model=001%20iPhone%2012'
# url4 = 'https://www.backmarket.co.jp/ja-jp/l/iphone-12shirizu/7b2e102d-e84d-478f-adaa-a42fd39731ae#backbox_grade=10%20A%E3%82%B0%E3%83%AC%E3%83%BC%E3%83%89&model=001%20iPhone%2012&storage=256000%20256%20GB'

# browser.get(url2)

# elem = browser.find_element_by_class_name('productCard')
# elem_href = elem.find_element_by_tag_name('a').get_attribute('href')
# print(elem_href)


# element_username = browser.find_element_by_id('username')
# element_pass = browser.find_element_by_id('password')

# element_username.send_keys('imanishi')
# element_pass.send_keys('kohei')

# element_login_btn = browser.find_element_by_id('login-btn')
# element_login_btn.click()

# browser.quit()


print('Pythonテスト')
cwd = os.getcwd()+'\search\search.csv'
print (cwd)

text = ['Pythonテスト',cwd]
texts = [text,text,text]

with open(cwd, 'w',newline="",encoding='utf_8_sig') as f:
    writer = csv.writer(f)
    writer.writerows(texts)