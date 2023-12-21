
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options
import sys

options = Options()
options.add_argument('--headless')
options.add_argument('--user-agent=' + 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.61 Safari/537.36')



browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
AppleWatch_7_45 = 'https://ec.geo-online.co.jp/shop/goods/search.aspx?search=x&keyword=Series7+45mm&submit1=%91%97%90M'


browser.get(AppleWatch_7_45)
browser.implicitly_wait(10)
urlElements = browser.find_elements_by_xpath('//ul[@class="itemList"]/li/a')
# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。



for url in range(10):
    if len(urlElements[url].get_attribute('href')) > 0:
        print(urlElements[url].get_attribute('href'))
    else:
        print('Error')
        browser.quit()
        sys.exit()
browser.quit()
sys.exit()

