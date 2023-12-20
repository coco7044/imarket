
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument('--headless')

browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
AirPods_Pro = 'https://www.backmarket.co.jp/ja-jp/l/airpods-pro/cf0b4470-1be4-4262-bc91-ba4c75973f67'


browser.get(AirPods_Pro)
urlElements = browser.find_elements_by_xpath('//div[@class="productCard"]/a')

# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。


for url in urlElements:
    print(url.get_attribute('href'))

browser.quit()