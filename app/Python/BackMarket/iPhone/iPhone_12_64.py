
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from time import sleep
from selenium.webdriver.chrome.options import Options

options = Options()
options.add_argument('--headless')

browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
service = Service(executable_path = browser_path)
browser = webdriver.Chrome(service=service,options=options)
iphone12_64 = 'https://www.backmarket.co.jp/ja-jp/l/iphone-12shirizu/7b2e102d-e84d-478f-adaa-a42fd39731ae#backbox_grade=10%20A%E3%82%B0%E3%83%AC%E3%83%BC%E3%83%89&model=001%20iPhone%2012&storage=64000%2064%20GB'


browser.get(iphone12_64)
urlElements = browser.find_elements_by_xpath('//div[@class="productCard"]/a')
itemCount = browser.find_element_by_class_name("text-primary.body-2-light.bg-neutral.px-3.py-4.rounded-sm.inline-flex.items-center.justify-center")

# target = ' '
# idx = itemCount.text.find(target)
# count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。


for url in urlElements:
    print(url.get_attribute('href'))

browser.quit()