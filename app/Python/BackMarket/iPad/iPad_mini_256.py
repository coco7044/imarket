
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options
import sys

options = Options()
options.add_argument('--headless')

browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
iPad_mini_256 = 'https://www.backmarket.co.jp/ja-jp/l/ipad-mini/965321cb-9f40-4feb-8ef9-cf52e0d0c590#storage=256000%20256%20GB'


browser.get(iPad_mini_256)
urlElements = browser.find_elements_by_class_name('focus:outline-none' and 'group')

# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。


for url in urlElements:
    if url.get_attribute('href')  is None :
        continue
    if len(url.get_attribute('href')) > 0:
        print(url.get_attribute('href'))
    else:
        print('Error')
        browser.quit()
        sys.exit()
browser.quit()