#!/usr/bin/env python

import pika
<<<<<<< HEAD


credentials = pika.PlainCredentials('KepWeb', '490password')# Put in your rabbitMQ user/pass here

=======
from datetime import datetime
from pika import DeliveryMode
from pika.exchange_type import ExchangeType

now = datetime.now()

credentials = pika.PlainCredentials#('', '') Put in your rabbitMQ user/pass here
>>>>>>> 5cde3fb5320dac24f54c3a614adce0c00cf4a1a9
parameters = pika.ConnectionParameters('10.147.20.15', 5672, 'testHost', credentials)
connection = pika.BlockingConnection(parameters)

channel=connection.channel()
channel.exchange_declare(exchange='logs', exchange_type='fanout',
 passive=False, durable=True, auto_delete=False)
 
queue = channel.queue_declare(queue='logging')

queue_name = queue.method.queue

channel.queue_bind(exchange="logs", queue=queue_name)

def callback(ch, method, properties, body):
<<<<<<< HEAD
	
	print(f" [x] {body}") 

=======
	print(f" [x] {body} at {now}") 
>>>>>>> 5cde3fb5320dac24f54c3a614adce0c00cf4a1a9
 
channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
channel.start_consuming()


