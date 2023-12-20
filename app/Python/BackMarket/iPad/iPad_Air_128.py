
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument('--headless')

browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
iPad_Air_128 = 'https://www.backmarket.co.jp/ja-jp/l/ipad-air/05b9a3b9-77bf-4d71-aeeb-3247ef9ffd47#storage=128000%20128%20GB'


browser.get(iPad_Air_128)
urlElements = browser.find_elements_by_class_name('focus:outline-none' and 'group')

# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。


for url in urlElements:
    if url.get_attribute('href')  is None:
        continue
    print(url.get_attribute('href'))

browser.quit()