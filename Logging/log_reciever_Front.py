#!/usr/bin/env python

import pika
from datetime import datetime
from pika import DeliveryMode
from pika.exchange_type import ExchangeType

now = datetime.now()

credentials = pika.PlainCredentials#('', '') Put in your rabbitMQ user/pass here
parameters = pika.ConnectionParameters('10.147.20.57', 5672, 'testHost', credentials)
connection = pika.BlockingConnection(parameters)

channel=connection.channel()
channel.exchange_declare(exchange='logs', exchange_type='fanout',
 passive=False, durable=True, auto_delete=False)
 
queue = channel.queue_declare(queue='loggingFront', durable=True)
queue_name = queue.method.queue

channel.queue_bind(exchange="logs", queue=queue_name)

def callback(ch, method, properties, body):
	print(f" [x] {body} at {now}") 
 
channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
channel.start_consuming()


