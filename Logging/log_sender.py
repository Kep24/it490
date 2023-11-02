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
 
queue = channel.queue_declare(queue='logging')
channel.queue_bind(exchange="logs", queue=queue.method.queue)

message ="Testing logging system"
channel.basic_publish(exchange='logs', routing_key='', body=message)
print(f" [x] {message}")
connection.close()
