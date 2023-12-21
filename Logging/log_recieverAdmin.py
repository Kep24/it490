#!/usr/bin/env python
import pika
<<<<<<< HEAD


credentials = pika.PlainCredentials('RedAdmin', '490Pass') #Put in your rabbitMQ user/pass here
parameters = pika.ConnectionParameters('10.147.20.57', 5672, 'testHost', credentials)

=======
from datetime import datetime
from pika import DeliveryMode
from pika.exchange_type import ExchangeType

now = datetime.now()

credentials = pika.PlainCredentials('admin', '490Pass') #Put in your rabbitMQ user/pass here
parameters = pika.ConnectionParameters('10.147.20.15', 5672, 'testHost', credentials)
>>>>>>> 5cde3fb5320dac24f54c3a614adce0c00cf4a1a9
connection = pika.BlockingConnection(parameters)

channel=connection.channel()
channel.exchange_declare(exchange='logs', exchange_type='fanout',
 passive=False, durable=True, auto_delete=False)
 
queue = channel.queue_declare(queue='logging', durable=True)
queue_name = queue.method.queue

channel.queue_bind(exchange="logs", queue=queue_name)

def callback(ch, method, properties, body):
	print(f" [x] {body}") 
 
channel.basic_consume(queue=queue_name, on_message_callback=callback, auto_ack=True)
channel.start_consuming()
