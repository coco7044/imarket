
# from selenium import webdriver
# from selenium.webdriver.chrome.service import Service
# from time import sleep
# from selenium.webdriver.chrome.options import Options

# options = Options()
# options.add_argument('--headless')

# browser_path = 'C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe'
# service = Service(executable_path = browser_path)
# browser = webdriver.Chrome(service=service,options=options)
# url = 'https://www.backmarket.co.jp/ja-jp/l/iphone-13shirizu/dbd56110-abb1-4f2d-b3e7-705e500e1201#model=000%20iPhone%2013'
# # browser = webdriver.Chrome('C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe')



# browser.get(url)
# e1 = browser.find_elements_by_xpath('//div[@class="productCard"]/a')

# for s in e1:
#     print(s.get_attribute('href'))

# browser.quit()



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
iphone12_124 = 'https://www.backmarket.co.jp/ja-jp/l/iphone-12shirizu/7b2e102d-e84d-478f-adaa-a42fd39731ae#backbox_grade=10%20A%E3%82%B0%E3%83%AC%E3%83%BC%E3%83%89&model=001%20iPhone%2012&storage=128000%20128%20GB'
iphone12_256 = 'https://www.backmarket.co.jp/ja-jp/l/iphone-12shirizu/7b2e102d-e84d-478f-adaa-a42fd39731ae#backbox_grade=10%20A%E3%82%B0%E3%83%AC%E3%83%BC%E3%83%89&model=001%20iPhone%2012&storage=256000%20256%20GB'

# browser = webdriver.Chrome('C:/xampp/htdocs/laravel/imarket/app/Browser/chromedriver.exe')



browser.get(iphone12_64)
urlElements = browser.find_elements_by_xpath('//div[@class="productCard"]/a')
itemCount = browser.find_element_by_class_name("text-primary.body-2-light.bg-neutral.px-3.py-4.rounded-sm.inline-flex.items-center.justify-center")

target = ' '
idx = itemCount.text.find(target)
count = itemCount.text[:idx] # 文字列[開始インデックス:終了インデックス]でその範囲の文字列を取得できる。


for url in urlElements:
    print(url.get_attribute('href'))

print(count)


browser.quit()