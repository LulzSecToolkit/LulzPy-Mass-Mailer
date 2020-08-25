import requests
import sys

if len(sys.argv) != 3:
    print(f'usage: {sys.argv[0]} <email.txt> <message.html>')
    sys.exit()

email=sys.argv[1]
htmlfile=sys.argv[2]

with open(email,"r") as f:
    email=f.readlines()
    email=[n.rsplit()[0] for n in email]
    f.close()
with open(htmlfile,"r") as f:
    msg=f.read()
    f.close()

data={"sub":"Testing Emial","email":"","from":"no-reply@localhost","message":msg,"submit":"Submit"}
url="https://localhost/mailer.php"
proxies = {
    'http': 'socks5://127.0.0.1:9050',
    'https': 'socks5://127.0.0.1:9050'
}
for send in email:
    data["email"]=send
    r=requests.post(url,data=data,proxies=proxies)
    if r.status_code == 200:
        print(f'{send} Success')
