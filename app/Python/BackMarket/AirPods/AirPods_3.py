
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
AirPods_3 = 'https://www.backmarket.co.jp/ja-jp/l/airpods-3/023424e1-a042-4272-a572-17a92633236a'


browser.get(AirPods_3)
urlElements = browser.find_elements_by_xpath('//div[@class="productCard"]/a')

# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。


for url in urlElements:
    if len(url.get_attribute('href')) > 0:
        print(url.get_attribute('href'))
    else:
        print('Error')
        browser.quit()
        sys.exit()
browser.quit()
sys.exit()