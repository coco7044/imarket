
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
iphone13_256 = 'https://www.backmarket.co.jp/ja-jp/l/iphone-13/b4064157-7fec-4b29-9dc6-6f55dbdca6c0#storage=256000%20256%20GB'


browser.get(iphone13_256)
urlElements = browser.find_elements_by_xpath('//div[@class="productCard"]/a')

for url in urlElements:
    if len(url.get_attribute('href')) > 0:
        print(url.get_attribute('href'))
    else:
        print('Error')
        browser.quit()
        sys.exit()
browser.quit()


#今回のスクレイピングは一ページのみにする
# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。

#今回のスクレイピングは一ページのみにする
# print(count)
# count = int(count)

# if count >= 31:
#     quotient = count//30
#     remainder = count%30
#     if remainder != 0:
#         page = quotient + 1

# print (page)
