#!/usr/bin/env python

import pika
from pika import DeliveryMode
from pika.exchange_type import ExchangeType

credentials = pika.PlainCredentials#('', '') Put in your rabbitMQ user/pass here
parameters = pika.ConnectionParameters('10.147.20.15', 5672, 'testHost', credentials)
connection = pika.BlockingConnection(parameters)

channel=connection.channel()
channel.exchange_declare(exchange='logs', exchange_type='fanout',
 passive=False, durable=True, auto_delete=False)
 
queue = channel.queue_declare(queue='loggingSQL', Durable=True)
queue_name = queue.method.queue

channel.queue_bind(exchange="logs", queue=queue_name)

def callback(ch, method, properties, body):
	print(f" [x] {body}") 
 
channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
channel.start_consuming()


