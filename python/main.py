
import telebot
import requests
import time
from telebot import types # для указание типов
capt = int(0)
admins = ['502503074','430730885', '303954747', '5231823450']
bot = telebot.TeleBot('5843832373:AAGwo9nL0Y3FRHgHTwqZTH_9mB9dBqVsoAg')
@bot.message_handler(commands=['start'])
def start(message):
    for admin in admins:
        if int(admin) == int(message.from_user.id):
            markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
            btn1 = types.KeyboardButton("Сменить IP")
            btn2 = types.KeyboardButton("Взять прокси")
            markup.add(btn1,btn2)
            bot.send_message(message.chat.id, text="Инициализирован".format(message.from_user), reply_markup=markup)
@bot.message_handler(content_types=['text'])
def func(message):
    global capt
    for admin in admins:
        if int(admin) == int(message.from_user.id):
            if(message.text == "Сменить IP"):
                user = message.from_user.username
                bot.send_message(message.chat.id, text="Отправлена комманда на смену IP")
                response = requests.get("https://i.fxdx.in/api-rt/changeip/4Y4EvPposg/x5968NP9XSR82")
                res = response.json()
                if (res.get('ok')):
                    bot.send_message(message.chat.id, text=user + ' Поменял IP')
                if (res.get('message')):
                    bot.send_message(message.chat.id, text='Подождите пару секунд')
                # if (res['ok'] == '1'):
                #     bot.send_message(message.chat.id, text=user + ' Поменял IP')
                # if (res != ['ok']):
                #     bot.send_message(message.chat.id, text="Подождите несколько секунд")
            if(message.text == "Взять прокси"):
                user = message.from_user.username
                #
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                btn1 = types.KeyboardButton("Сменить IP")
                btn2 = types.KeyboardButton("Я закончил")
                markup.add(btn1,btn2)
                #
                to_pin = bot.send_message(message.chat.id, '🟥 ' + user + ' Взял прокси', reply_markup=markup).message_id
                bot.pin_chat_message(chat_id = message.chat.id, message_id = to_pin)
            if(message.text == "Я закончил"):
                user = message.from_user.username
                #
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                btn1 = types.KeyboardButton("Сменить IP")
                btn2 = types.KeyboardButton("Взять прокси")
                markup.add(btn1,btn2)
                #
                to_pin = bot.send_message(message.chat.id, '🟩 ' + user + ' Закончил использовать прокси', reply_markup=markup).message_id
                bot.pin_chat_message(chat_id = message.chat.id, message_id = to_pin)
            if(message.text == "/unpin"):
                user = message.from_user.username
                to_pin = bot.send_message(message.chat.id, 'Пиздец опять забыли нажать кнопочку...').message_id
                bot.unpin_chat_message(chat_id = message.chat.id, message_id = to_pin)
                markup = types.ReplyKeyboardMarkup(resize_keyboard=True)
                btn1 = types.KeyboardButton("Сменить IP")
                btn2 = types.KeyboardButton("Взять прокси")
                markup.add(btn1,btn2)
                to_pin = bot.send_message(message.chat.id, '🟩 Свободно бляха муха', reply_markup=markup).message_id
                bot.pin_chat_message(chat_id = message.chat.id, message_id = to_pin)
bot.polling(none_stop=True)