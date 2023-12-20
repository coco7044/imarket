# -*- coding: utf-8 -*-

from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument('--headless')

browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
iphone13_124 = 'https://www.backmarket.co.jp/ja-jp/l/iphone-13/b4064157-7fec-4b29-9dc6-6f55dbdca6c0#storage=128000%20128%20GB'

# browser = webdriver.Chrome('C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe')



browser.get(iphone13_124)
urlElements = browser.find_elements_by_xpath('//div[@class="productCard"]/a')

# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。


for url in urlElements:
    print(url.get_attribute('href'))


browser.quit()