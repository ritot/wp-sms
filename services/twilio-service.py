from wp-sms import app
from twilio.rest import Client

class TwilioService:
    client = None

    def __init__(self):
        account_sid = app.config['ACb160c2953a172cd78e5f80f766098761']
        auth_token = app.config['07e200769c8abf0ba0dead6061ea1bb6']
        self.client = Client(account_sid, auth_token)

    def send_message(self, message):
        agent_phone_number = app.config['AGENT_PHONE_NUMBER']
        twilio_phone_number = app.config['TWILIO_PHONE_NUMBER']
        self.client.messages.create(to=agent_phone_number,
                                    from_=twilio_phone_number,
                                    body=message)
