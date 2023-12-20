#!/usr/bin/env python

import pika
<<<<<<< HEAD
from pika import DeliveryMode
from pika.exchange_type import ExchangeType

credentials = pika.PlainCredentials('KepWeb', '490password')# Put in your rabbitMQ user/pass here
=======
from datetime import datetime
from pika import DeliveryMode
from pika.exchange_type import ExchangeType

now = datetime.now()

credentials = pika.PlainCredentials#('', '') Put in your rabbitMQ user/pass here
>>>>>>> 8ad3bb780f247f0284cfa360eaba6937d2a28b97
parameters = pika.ConnectionParameters('10.147.20.15', 5672, 'testHost', credentials)
connection = pika.BlockingConnection(parameters)

channel=connection.channel()
channel.exchange_declare(exchange='logs', exchange_type='fanout',
 passive=False, durable=True, auto_delete=False)
 
<<<<<<< HEAD
queue = channel.queue_declare(queue='')
=======
queue = channel.queue_declare(queue='logging')
>>>>>>> 8ad3bb780f247f0284cfa360eaba6937d2a28b97
queue_name = queue.method.queue

channel.queue_bind(exchange="logs", queue=queue_name)

def callback(ch, method, properties, body):
<<<<<<< HEAD
	print(f" [x] {body}") 
=======
	print(f" [x] {body} at {now}") 
>>>>>>> 8ad3bb780f247f0284cfa360eaba6937d2a28b97
 
channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
channel.start_consuming()


