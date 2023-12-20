
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument('--headless')

browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
iPad_Pro_512 = 'https://www.backmarket.co.jp/ja-jp/l/ipad-pro/737ea7fc-6956-4ae3-9ca6-fe14ff8bcf14#storage=512000%20512%20GB'


browser.get(iPad_Pro_512)
urlElements = browser.find_elements_by_class_name('focus:outline-none' and 'group')

# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。


for url in urlElements:
    if url.get_attribute('href')  is None:
        continue
    print(url.get_attribute('href'))

browser.quit()