#!/usr/bin/env python

import pika
from datetime import datetime
<<<<<<< HEAD
#from pika import DeliveryMode
#from pika.exchange_type import ExchangeType

now = datetime.now()

credentials = pika.PlainCredentials('Yessiedata', 'NJIT') #Put in your rabbitMQ user/pass here
parameters = pika.ConnectionParameters('10.147.20.57', 5672, 'testHost', credentials)
=======
from pika import DeliveryMode
from pika.exchange_type import ExchangeType

now = datetime.now()

credentials = pika.PlainCredentials#('', '') Put in your rabbitMQ user/pass here
parameters = pika.ConnectionParameters('10.147.20.15', 5672, 'testHost', credentials)
>>>>>>> 5cde3fb5320dac24f54c3a614adce0c00cf4a1a9
connection = pika.BlockingConnection(parameters)

channel=connection.channel()
channel.exchange_declare(exchange='logs', exchange_type='fanout',
 passive=False, durable=True, auto_delete=False)
 
<<<<<<< HEAD
queue = channel.queue_declare(queue='loggingSQL', durable=True)
=======
queue = channel.queue_declare(queue='loggingSQL', Durable=True)
>>>>>>> 5cde3fb5320dac24f54c3a614adce0c00cf4a1a9
queue_name = queue.method.queue

channel.queue_bind(exchange="logs", queue=queue_name)

def callback(ch, method, properties, body):
	print(f" [x] {body} at {now}") 
 
channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
channel.start_consuming()


