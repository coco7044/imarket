
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument('--headless')

browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
iphone14_256 = 'https://www.backmarket.co.jp/ja-jp/l/iphone-14/2385e855-293b-400d-90c3-6708e883eeac#storage=256000%20256%20GB'


browser.get(iphone14_256)
urlElements = browser.find_elements_by_xpath('//div[@class="productCard"]/a')

for url in urlElements:
    print(url.get_attribute('href'))


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

browser.quit()