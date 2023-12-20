
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument('--headless')

browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
AppleWatch_7_41 = 'https://www.backmarket.co.jp/ja-jp/l/apple-watch-7/ff0c9f6d-63d9-4757-b309-fa734fc6e2b0#case_size=41'


browser.get(AppleWatch_7_41)
urlElements = browser.find_elements_by_class_name('focus:outline-none' and 'group')

# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。


for url in urlElements:
    if url.get_attribute('href')  is None:
        continue
    print(url.get_attribute('href'))

browser.quit()