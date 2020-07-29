from __future__ import unicode_literals

import os
from django.apps import AppConfig
from django.conf import settings
from tensorflow.keras.models import model_from_json

class CoreConfig(AppConfig):
    # create path to models
    name  = "core"

    path = os.path.join(settings.MODELS, "model_3.h5")
    path1 = os.path.join(settings.MODELS, 'model_3.json')

    json_file = open(path1, 'r')
    loaded_model_json = json_file.read()
    json_file.close()
    loaded_model = model_from_json(loaded_model_json)
    loaded_model.load_weights(path)